<?php

namespace App\Mail;

use App\Good;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ItemRequested extends Mailable
{
    use Queueable, SerializesModels;

    /** @var Good */
    protected $good;

    public function __construct(Good $good)
    {
        $this->good = $good;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view(
            'emails.claim',
            [
                'owner' => $this->good->user(),
                'taker' => $this->good->claim(),
                'good' => $this->good->description,
            ]
        );
    }
}
