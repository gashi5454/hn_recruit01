<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendAppliesMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build($offers)
    {
        return $this->view('emails.user_applies')
                ->from('knca0913@gmail.com','invibes')
                ->subject('ご応募完了のお知らせ')
                ->with(['offers' => $offers]);
    }
}
