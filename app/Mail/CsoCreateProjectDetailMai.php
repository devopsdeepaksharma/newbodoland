<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CsoCreateProjectDetailMai extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $project;
    public $status;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user, Project $project, $status)
    {
        $this->user = $user;
        $this->project = $project;
        $this->status = $status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.csocreateprojectdetail')
        ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
        ->subject('Project Details Submitted');
    }
}
