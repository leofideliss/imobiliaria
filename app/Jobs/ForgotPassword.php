<?php

namespace App\Jobs;

use App\Mail\ForgotPasswordMail;
use App\Models\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ForgotPassword implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $tries=3;
    private $customer;
    private $token;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Customer $customer ,$token)
    {
        $this->customer = $customer;
        $this->token = $token;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send(new ForgotPasswordMail($this->customer,  $this->token));
    }
}
