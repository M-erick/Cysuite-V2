<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class IssueReminder extends Mailable
{
    use Queueable, SerializesModels;

    public $issue;

    public function __construct($issue)
    {
        $this->issue = $issue;
    }

    public function build()
    {
        return $this->view('emails.issue_reminder')
                    ->with([
                        'issue' => $this->issue,
                    ]);
    }
}
