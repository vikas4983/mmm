<?php

namespace App\Jobs;

use App\Mail\UserEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UserSendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $emailTemplate;
   

    
    public function __construct($user, $emailTemplate)
    { 

        $this->emailTemplate = $emailTemplate;
        $this->user = $user;
      

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if ($this->user && $this->emailTemplate) {
            try {

                Mail::to($this->user->email)

                    ->send(new UserEmail($this->user, $this->emailTemplate));
            } catch (\Exception $e) {
                Log::error('Email sending failed for user: ' . $this->user->email . ', Error: ' . $e->getMessage());
            }
        } else {
            Log::warning('User or EmailTemplate is missing in the job.');
        }
    }
}
