<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;
use App\Models\Service;

class MailService extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $service;

    protected $user;

    public function __construct($service, User $user)
    {
        $this->service = $service;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Thông tin đăng kí chương trình giảm giá')
            ->view('admin._component.email')
            ->with([
                'service' => $this->service,
                'user' => $this->user
            ]);
    }
}
