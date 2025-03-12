<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasTeams;
use Illuminate\Support\Str;

use function Termwind\parse;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasTeams;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'image',
        'matrimony_id',
        'uuid',
        'name',
        'email',
        'password',
        'gender',
        'mobile',
        'profile_for',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }


    public function getStatusAttribute($value)
    {
        return $value == 1 ? 'Self' : 'Inactive';
    }
    public function getProfileForAttribute($value)
    {
        return $value == 1 ? 'Self' : ($value == 2 ? 'Son' : ($value == 3 ? 'Daughter' : ($value == 4 ? 'Sister' : ($value == 5 ? 'Brother' : ($value == 6 ? 'Relative/Friend' : 'NA')))));
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
    public function getCreatedAtAttribute($value)
    {
        return carbon::parse($value)->format('d M Y, h:i A');
    }
    public function getUpdatedAtAttribute($value)
    {
        return carbon::parse($value)->format('d M Y, h:i A');
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function basicDetails()
    {
        return $this->hasOne(BasicDetail::class);
    }
    public function horoscopeDetails()
    {
        return $this->hasOne(HoroscopeDetail::class);
    }
    public function carrierDetails()
    {
        return $this->hasOne(CarrierDetail::class);
    }
    public function familyDetails()
    {
        return $this->hasOne(FamilyDetail::class);
    }
    public function userFamilyDetails()
    {
        return $this->hasOne(FamilyDetail::class);
    }

    public function lifestyleDetails()
    {
        return $this->hasOne(LifeStyle::class);
    }
    public function likeDetails()
    {
        return $this->hasOne(LikeDetail::class);
    }

    public function contactDetails()
    {
        return $this->hasOne(ContactDetail::class);
    }
    public function invitationDetails()
    {
        return $this->hasMany(Invitation::class);
    }
    public function senderInvitation()
    {
        return $this->hasMany(Invitation::class, 'sender_id', 'id'); // User is sender
    }

    public function receiverInvitation()
    {
        return $this->hasMany(Invitation::class, 'receiver_id', 'id'); // User is receiver
    }


    public function blockedUser()
    {
        return $this->hasMany(UserBlock::class, 'blocker_id');
    }

    public function blockedByUsers()
    {
        return $this->hasMany(UserBlock::class, 'blocked_id');
    }

    public function viewUser()
    {
        return $this->hasMany(ViewContact::class, 'view_id');
    }

    public function viewByUsers()
    {
        return $this->hasMany(ViewContact::class, 'viewed_id');
    }

    public function viewProfileByMe()
    {
        return $this->hasMany(ViewProfile::class, 'viewer_id');
    }
    public function viewProfileByOther()
    {
        return $this->hasMany(ViewProfile::class, 'viewed_user_id');
    }

    public function senderMessage()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }
   
   
    public function receiverMessage()
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }
    
    
    
    public function getImageUrlAttribute()
    {

        return Storage::url($this->image);
    }
    public function images()
    {
        return $this->hasMany(Image::class, 'user_id', 'id');
    }

    public function approvals()
    {
        return $this->hasMany(Approval::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'user_id', 'id');
    }
    public function plans()
    {
        return $this->hasMany(Plan::class);
    }
    public function successStories()
    {
        return $this->hasMany(SuccessStory::class);
    }
    public function profileId()
    {
        return $this->hasMany(ProfileId::class);
    }
    public function spotelights()
    {
        return $this->hasMany(SpoteLight::class, 'user_id');
    }
    public function razorpays()
    {
        return $this->hasMany(RazorPay::class, 'user_id');
    }

    public function getPaidUsersAttribute()
    {
        $payments = Payment::with('user.spotelights', 'plan')
            ->orderBy('created_at', 'desc')
            ->get();

        $paidUsers = [];
        $userIds = [];
        foreach ($payments as $payment) {
            $paidPaymentDate = Carbon::parse($payment->expiry_date);
            $currentDate = Carbon::now('Asia/Kolkata');
            if ($paidPaymentDate >= $currentDate) {
                if (!in_array($payment->user_id, $userIds)) {
                    $paidUsers[] = $payment;
                    $userIds[] = $payment->user_id;
                }
            } else {
                $payment->update([
                    'contact' => null,
                    'is_paid' => 0
                ]);
            }
        }

        return $paidUsers;
    }

    public function age()
    {
        $user = Auth::user();
        if (!$user || !$user->basicDetails || !$user->basicDetails->dob) {
            return null;
        }
        $today = Carbon::now();
        $dob = Carbon::parse($user->basicDetails->dob);

        return "{$dob->age} Years";
    }
}
