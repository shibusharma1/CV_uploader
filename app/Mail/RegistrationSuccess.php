<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;



class RegistrationSuccess extends Mailable
{
    use Queueable, SerializesModels;

   public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('Welcome to Our Platform!')
                    ->markdown('emails.registration-success');
    }

    // Reusable method to send after verification
    public static function sendAfterVerification(User $user)
    {
        \Mail::to($user->email)->send(new self($user));
    }
}
