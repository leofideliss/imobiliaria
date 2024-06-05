<?php

namespace App\Mail;

use App\Models\Customer;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;
    private $customer;
    private $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Customer $customer , $token)
    {
        $this->customer = $customer;
        $this->token = $token;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        try {
            $this->subject('Redefinição de senha');
            $this->to($this->customer->email, $this->customer->name);
            return $this->view('user.mail.forgotPassword',['name'=>$this->customer->name , 'token'=> $this->token, 'email'=>$this->customer->email]);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    
    }
}
