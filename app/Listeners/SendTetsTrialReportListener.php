<?php

namespace App\Listeners;

use App\Events\SendTestTrialReport;
use App\Models\Test;
use App\Models\TestTrial;
use App\Models\TrialTestQuestionResult;
use App\Models\TrialTestResult;
use Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
use App\Mail\TrialTestReportEmail;
use Illuminate\Support\Facades\Mail;

class SendTetsTrialReportListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SendTestTrialReport  $event
     * @return void
     */
    public function handle(SendTestTrialReport $event)
    {
        // Access the event details
        $details = $event->details;

        // Perform actions with the details
        $trialTestId = $details['trial_test_id']; //Used to get the test trial then fetch the main test
        $email = $details['email'];

        if ($email) {
            //Generate Report in pdf format and attach to email and send.
            $testTrialResult = TrialTestResult::findOrFail($trialTestId);
            // $testTrial = TestTrial::findOrFail($testTrialResult->trial_test_id);
            $test = $testTrialResult->test;

            $report = new \App\Services\TestTrialService();
            $data = $report->getTestQuestion($testTrialResult, $test);
            // Generate the PDF content

            $pdf = Pdf::loadView('reports.pdf.trial_test_result', $data);
            // Generate a unique filename for the PDF
            $filename = $email . '-' . $test->name . '-' . now()->format('Y-m-d H:i') . '.pdf';
            // Build the email with the attached PDF

            // Send the email

            Mail::to($details['email'])
                ->send(new TrialTestReportEmail($email, $filename, $pdf->output()));
            return true;
        }
    }
}
