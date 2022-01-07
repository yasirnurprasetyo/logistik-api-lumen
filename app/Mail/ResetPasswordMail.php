<?php

namespace App\Mail;

use App\Models\User as ModelsUser;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends App\Mail\Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var Order
     */
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
  
    //JADI SECARA DEFAULT KITA MEMINTA DATA USER
    public function __construct(ModelsUser $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //KEMUDIAN EMAILNYA ME-LOAD VIEW RESET_PASSWORD DAN PASSING DATA USER
        return $this->view('emails.reset_password')->with(['user' => $this->user]);
    }
}