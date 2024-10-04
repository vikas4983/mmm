<?php



namespace App\Mail;

use App\Models\EmailSetting;
use App\Models\EmailTemplate;
use App\Models\Logo;
use App\Models\Menu;
use App\Models\UserOTP;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Session;
use App\Traits\MemberOtpTrait;
use Illuminate\Support\Facades\Blade;

class UserEmail extends Mailable
{
    use Queueable, SerializesModels;
    use MemberOtpTrait;

    protected $user;
    protected $emailTemplate;
   

    /**
     * Create a new message instance.
     */
    public function __construct($user, $emailTemplate)
    {

        $this->emailTemplate = $emailTemplate;
        $this->user = $user;
        

    }

    /**
     * Get the message envelope.
     */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Email',
    //     );
    // }

    /**
     * Get the message content definition.
     */
    public function build()
    {

        $userId = $this->user->id;
        $otp = $this->generateOTP($userId);
      
        $footers = Menu::where('status', 1)->where('section', 0)->get();
        $logos = Logo::where('status', 1)->get();

        $subject = str_replace(
            ['{{ name }}', '{{ otp }}'],
            [$this->user->name, $otp],
            $this->emailTemplate->subject
        );

        $body = str_replace(
            ['{{ name }}', '{{ otp }}'],
            [$this->user->name, $otp],
            $this->emailTemplate->body
        );
        // $footerContent = '<ul>';
        // foreach ($footers as $footer) {
        //     $footerContent .= '<li><a href="' . $footer->url . '">' . $footer->name . '</a></li>';
        // }
        // $footerContent .= '</ul>';
        // $body .= $footerContent;

        // Render the body with Blade
        $renderedBody = Blade::render($body, [
            'user' => $this->user,
            'otp' => $otp,
            'footers' => $footers,
            'logos' => $logos
        ]);
        return $this->subject($subject)
            ->html($renderedBody);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
