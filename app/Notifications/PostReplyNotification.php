<?php

namespace Opencycle\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;
use Opencycle\Http\Requests\Posts\ReplyPostRequest;
use Opencycle\Post;

class PostReplyNotification extends Notification
{
    use Queueable;

    /**
     * The Post.
     *
     * @var Post
     */
    private $post;

    /**
     * The message.
     *
     * @var string
     */
    private $message;

    /**
     * Create a new notification instance.
     *
     * @param Post $post
     * @param string $message
     */
    public function __construct(Post $post, string $message)
    {
        $this->post = $post;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $user = Auth::user();
        $post = $this->post;
        $message = $this->message;

        return (new MailMessage)
            ->replyTo($notifiable->email)
            ->markdown('mail.post.reply', compact('user', 'message', 'post'));
    }
}
