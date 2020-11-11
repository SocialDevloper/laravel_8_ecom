<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class OrderPlace implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $allCart = null;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($allCart)
    {
        $this->allCart = $allCart;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $to_name = "Mitesh Kadivar";
        $to_email = "miteshk123@yopmail.com";
        $data = array("name" => $to_name);
          
        Mail::send('OrderPlaceEmail', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
        ->subject('Order Place Mail - Laravel 8 App');
        $message->from('socialdevp786@gmail.com','Order Mail');
        });
    }
}
