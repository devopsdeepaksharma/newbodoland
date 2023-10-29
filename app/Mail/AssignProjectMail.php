<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class AssignProjectMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $project;

    /**
     * Create a new message instance.
     */
    public function __construct(Project $project , User $user)
    {
        $this->user = $user;
        $this->project = $project;
    }
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.assignProject')
        ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
        ->subject('Project Assignment');
    }
}
