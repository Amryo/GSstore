<?php

namespace App\Notifications;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;
use Illuminate\Notifications\Notification;

class OrderCreatedNotification extends Notification
{
    use Queueable;
    protected $order;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        //mail , database ,nexmo (Sms) ,broadcast , slack ,[Custom Channel]  
        $via = ['database', 'mail', 'nexmo'];
        /*if ($notifiable->notify_sms) {
            $via = ['nexmo'];
        }
        if ($notifiable->notify_mail) {
            $via = ['mail'];
        }*/
        return $via;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Order #:number', ['number' => $this->order->number])
            ->from('invoices@localhost', 'GSG billing')
            ->greeting('Welcome :name , IN GSGSTORE ^_^', ['name' => $notifiable->name])
            ->line('New Order Has been Created (Order #:number)', ['number' => $this->order->number])
            ->action('View Order', url('/'))
            ->line('Thank you for using our Shop ^_^');
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([

            'title' => __('New Order #:number', ['number' => $this->order->number]),
            'body' =>
            __('New Order Has been Created (Order #:number).', ['number' => $this->order->number]),
            'icon' => '',
            'url' => url('/'),
            'time' => Carbon::now()->diffForHumans(),

        ]);
    }



    public function toDatabase($notifiable)
    {
        return [
            'title' => __('New Order #:number', ['number' => $this->order->number]),
            'body' =>
            __('New Order Has been Created (Order #:number).', ['number' => $this->order->number]),
            'icon' => '',
            'url' => url('/'),

        ];
    }
    public function toNexmo($notifiable)
    {
        return (new NexmoMessage())->content('Thank you for use our Shop ^_^');
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
