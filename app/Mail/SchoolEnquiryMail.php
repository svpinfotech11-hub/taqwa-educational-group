<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SchoolEnquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $school;
    public $enquiry;

    public function __construct($school, $enquiry)
    {
        $this->school = $school;
        $this->enquiry = $enquiry;
    }

    public function build()
    {
        return $this->subject('New Enquiry for ' . $this->school->name)
                    ->view('emails.school_enquiry');
    }
}
