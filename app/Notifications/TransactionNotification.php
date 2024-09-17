<?php

namespace App\Notifications;

use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TransactionNotification extends Notification
{
    use Queueable;

    protected $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('A new transaction has been created.')
            ->action('View Transaction', url('/transactions'))
            ->line('Thank you so much!');
    }

    public function toArray($notifiable)
    {
        return [
            'transaction_id' => $this->transaction->id,
            'amount' => $this->transaction->amount,
            'cashier_id' => $this->transaction->cashier_id,
            'description' => $this->transaction->description,
            'transaction_date' => $this->transaction->transaction_date,
        ];
    }
}
