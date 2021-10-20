<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Mail\Orederinvoice;
use App\Models\User;
use App\Notifications\OrderCreatedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendInvoice
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
     * @param  object  $event
     * @return void
     */
    public function handle(OrderCreated $event)
    {

        $order = $event->order;
        //Mail::to($order->billing_email)->send(new Orederinvoice($order));

        /* If You need send notification for more thar one people */
        $users = User::whereIn('type', ['admin', 'super-admin'])->get();
        Notification::send($users, new OrderCreatedNotification($order));



        // $user->notify(new OrderCreatedNotification($order));

        //Notification::route('mail', 'info@example.com')->notify(new OrderCreatedNotification($order));
    }
}
