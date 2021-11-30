<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrderNotification extends Notification
{
    use Queueable;
protected $data;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
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
                    ->greeting('Pesan Order dari :')
                    ->line('Name : '. $this->data['name'])
                    ->line('Email : '. $this->data['email'])
                    ->line('Phone : '. $this->data['phone'])
                    ->line('Tanggal : '. $this->data['date'])
                    ->line('Paket Tour : '. $this->data['tour'])
                    ->line('WNI : '. $this->data['wni'])
                    ->line('WNA : '. $this->data['wna'])
                    ->line('Keterangan : '. $this->data['keterangan'])
                    ->action('Balas Pesan', url('mailto:'.$this->data['email']));
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
