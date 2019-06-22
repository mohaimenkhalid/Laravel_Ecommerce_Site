<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\User;

class VerifyRegistration extends Notification
{
    use Queueable;

    public $user;
    public $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, $token)
    {
        $this->user =$user;
        $this->token =$token;
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
        return (new MailMessage)
                    ->line('Confirm your Email.')
                    ->line('If you want to confirm ')
                    ->action('Click here', route('user.activation', $this->token) )
                    ->line('Thank you for using our Shop!');
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
