<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewPostNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $post;

    public function __construct($post)
    {
        $this->post = $post;
    }

    public function via(object $notifiable): array
    {
        return ['database']; // Canal pour enregistrer dans la base de données
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'title' => 'Nouveau post créé',
            'author' => $this->post->author,
            'content' => $this->post->content,
            'read' => $this->post->created_at
        ];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
