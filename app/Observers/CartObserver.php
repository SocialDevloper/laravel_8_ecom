<?php

namespace App\Observers;

use App\Models\Cart;
use Illuminate\Support\Facades\Mail;

class CartObserver
{
    /**
     * Handle the cart "created" event.
     *
     * @param  \App\Models\Cart  $cart
     * @return void
     */
    public function created(Cart $cart)
    {
        $to_name = $cart->user->name;
        $to_email = $cart->user->email;
        $data = array("name" => $to_name, "body" => "Product Name = ". $cart->product->name);
          
        Mail::send('addCartEmail', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
        ->subject('Add Product to Cart Mail - Laravel 8 App');
        $message->from('socialdevp786@gmail.com','Product Details Mail');
        });
    }

    /**
     * Handle the cart "updated" event.
     *
     * @param  \App\Models\Cart  $cart
     * @return void
     */
    public function updated(Cart $cart)
    {
        //
    }

    /**
     * Handle the cart "deleted" event.
     *
     * @param  \App\Models\Cart  $cart
     * @return void
     */
    public function deleted(Cart $cart)
    {
        $to_name = $cart->user->name;
        $to_email = $cart->user->email;
        $data = array("name" => $to_name, "body" => "Remove Product Name = ". $cart->product->name);
          
        Mail::send('removeCartEmail', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
        ->subject('Remove Product From Cart Mail - Laravel 8 App');
        $message->from('socialdevp786@gmail.com','Remove Product From Cart');
        });
    }

    /**
     * Handle the cart "restored" event.
     *
     * @param  \App\Models\Cart  $cart
     * @return void
     */
    public function restored(Cart $cart)
    {
        //
    }

    /**
     * Handle the cart "force deleted" event.
     *
     * @param  \App\Models\Cart  $cart
     * @return void
     */
    public function forceDeleted(Cart $cart)
    {
        //
    }
}
