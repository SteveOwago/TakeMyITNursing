<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TrialTestReportEmail extends Mailable
{
    public $email;
    public $filename;
    public $pdfData;

    /**
     * Create a new message instance.
     *
     * @param  string  $email
     * @param  string  $filename
     * @param  string  $pdfData
     * @return void
     */
    public function __construct($email, $filename, $pdfData)
    {
        $this->email = $email;
        $this->filename = $filename;
        $this->pdfData = $pdfData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Trial Test Report')
            ->attachData($this->pdfData, $this->filename, ['mime' => 'application/pdf'])
            ->view('emails.trial_test_report');
    }
}
