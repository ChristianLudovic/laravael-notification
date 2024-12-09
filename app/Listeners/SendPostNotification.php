<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Notifications\NewPostNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPostNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostCreated $event): void
    {
        // Récupérer le post de l'événement
        $post = $event->post;

        // Envoyer la notification directement au post (si Post utilise Notifiable)
        $post->notify(new NewPostNotification($post));
    }
}
