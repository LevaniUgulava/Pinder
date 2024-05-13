<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class LikeNotification extends Notification
{
    use Queueable;
    public $id;
    public $url;

    /**
     * Create a new notification instance.
     */
    public function __construct($id, $url)
    {
        $this->id = $id;
        $this->url = $url;

    }
    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */

    public function toArray(object $notifiable): array
    {

        return [
            'like_notification_data' => 'Some data for the notification',
            'notifiable_id' => $this->id,
            'url' => $this->url,
        ];
    }
}
