<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class NotificationMenu extends Component
{

    public $notifications;

    public $unread;
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct(Notification $notification)
    {
        $user = User::where('id', Auth::id())->first();
        $this->notifications = $user->notifications()->limit(5)->get();
        $this->unread = $user->unreadNotifications()->count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.notification-menu');
    }
}
