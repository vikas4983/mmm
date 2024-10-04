<?php

namespace App\Actions\Fortify;

use App\Models\EmailTemplate;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Jobs\SendEmailJob;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;


    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        dd($input);
        $fields = config('formFields.register');
        $rules = [];

        foreach ($fields as $field => $fieldConfig) {
            $rules[$field] = $fieldConfig['rules'];

        }

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        if (isset($input['image'])) {

            $file = $input['image'];
            $fileName = rand(100, 1000) . time() . $file->getClientOriginalName();
            $filePath = public_path('storage/user/images/');
            $file->move($filePath, $fileName);
        } else {
            $fileName = null;
        }

        return tap(
            User::create([
                'image' => $fileName,
                'name' => $input['name'],
                'email' => $input['email'],
                'mobile' => $input['mobile'],
                'gender' => $input['gender'],
                'password' => Hash::make($input['password']), // Correct the Hashing
            ]),

            function (User $user) {
                $this->createTeam($user);

            }

        );

    }

    /**
     * Create a personal team for the user.
     */
    protected function createTeam(User $user): void
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0] . "'s Team",
            'personal_team' => true,
        ]));
    }
}
