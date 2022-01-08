<?php

namespace App\Listeners;

use App\Events\PostPublished;
use App\Mail\PostPublished as PostPublishedMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendPostNotification implements ShouldQueue
{
    use Queueable, InteractsWithQueue, SerializesModels;

    public function handle(PostPublished $event)
    {
        $post = $event->post;

        foreach ($post->website->subscribers as $subscriber) {
            Mail::to($subscriber)->send(new PostPublishedMail($post));
        }
    }
}
