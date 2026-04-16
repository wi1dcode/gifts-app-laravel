<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GiftCreated extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        protected string $giftName,
        protected string $giftPrice,
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nouveau cadeau ajouté',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.gifts.created',
            with: [
                'giftName' => $this->giftName,
                'giftPrice' => $this->giftPrice,
            ],
        );
    }

    public function attachments(): array
    {
        return [
            Attachment::fromPath(public_path('image.png')),
        ];
    }
}