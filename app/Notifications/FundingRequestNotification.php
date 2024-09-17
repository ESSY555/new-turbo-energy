<?php

namespace App\Notifications;

use App\Models\FundingRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FundingRequestNotification extends Notification
{
    use Queueable;

    protected $fundingRequest;

    public function __construct(FundingRequest $fundingRequest)
    {
        $this->fundingRequest = $fundingRequest;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('A new funding request has been submitted.')
            ->action('View Funding Request', url('/funding_requests'))
            ->line('Thank you!');
    }

    public function toArray($notifiable)
    {
        return [
            'funding_request_id' => $this->fundingRequest->id,
            'amount' => $this->fundingRequest->amount,
            'location' => $this->fundingRequest->location,
            'reason' => $this->fundingRequest->reason,
            'user_id' => $this->fundingRequest->user_id,
        ];
    }
}
