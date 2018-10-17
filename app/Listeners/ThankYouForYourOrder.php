<?php

namespace App\Listeners;

use App\Events\OrderHasBeenPlaced;
use App\Mail\OrderPlaced;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class ThankYouForYourOrder
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderHasBeenPlaced  $event
     * @return void
     */
    public function handle(OrderHasBeenPlaced $event)
    {
        Mail::to($event->order->customer)
            ->send(new OrderPlaced($event->order));
    }
}
