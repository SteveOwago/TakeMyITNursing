<?php

namespace App\Http\Livewire;

use App\Events\SendTestTrialReport;
use Livewire\Component;
use App\Models\Question;
use App\Models\TrialTestResult;
use App\Models\Test;
use App\Models\TestTrial;
use App\Models\TrialTestQuestionResult;

class TestTrialExam extends Component
{
    public $currentStep = 1;
    public $questions = [];
    public $answers = [];
    public $studentTrialTestID;
    public $testID;

    public $test_id;
    public $email;
    public $ip;

    public $submitting = false;

    public function mount($test_id, $email, $ip)
    {
        $this->test_id = $test_id;
        $this->email = $email;
        $this->ip = $ip;
        //Check if User already has a trial Test
        // $userTrialTest = TrialTestResult::where('visitor_ip_address', $this->ip)->whereOr('visitor_email', $this->email)->whereNotNull('visitor_score')->first();
        // if ($userTrialTest) {
        //     if ($userTrialTest->visitor_email == $email || $userTrialTest->visitor_ip_address == $ip) {
        //         $this->currentStep = -1;
        //     }
        // }

        $test = Test::findOrFail($test_id);

        // Session Test to on page Refresh
        if (session()->has('student_trial_test_id')) {
            $studentTrialTestID = session('student_trial_test_id');
        } else {
            // Create a new StudentResult
            $studentTrialTestID = TrialTestResult::create([
                'test_trial_id' => $this->test_id ?? null,
                'visitor_email' => $this->email ?? null,
                'visitor_ip_address' => $ip ?? null
            ])->id;

            // Store the StudentResult ID in the session
            session(['student__trial_test_id' => $studentTrialTestID]);
        }

        // Assign the StudentResult ID to the component property
        $this->studentTrialTestID = $studentTrialTestID;

        // Retrieve the questions for the test
        $this->questions = Question::where('test_id', $test->id)
            ->inRandomOrder()
            ->take(2)
            ->get();

        $this->testID = $test_id;
    }


    public function render()
    {
        return view('livewire.test-trial-exam');
    }

    public function submit($questions, $studentTrialTestID)
    {
        // Check if already submitting
        if ($this->submitting) {
            return;
        }
        // Set submitting flag to true
        $this->submitting = true;
        $testsQuestionsResults = [];
        foreach ($questions as $question) {
            $choice = 'wrong';
            foreach ($this->answers as $key => $answer) {
                if ($key == $question['id']) {
                    $choice = str_replace('choice_', '', $answer);
                }
            }

            $testStudent =  TrialTestQuestionResult::create([
                'question_id' => $question['id'] ?? null,
                'test_id' => $question['test_id'] ?? null,
                'visitor_email' => $email ?? null,
                'trial_test_id' =>  $studentTrialTestID,
                'trial_answer' => $choice == $question['answer'] ? 'correct' : 'wrong',
                'trial_choice' => $choice
            ]);
            $testsQuestionsResults[] = $testStudent;
        }
        $numberQuestions = count($questions);
        $score = 0;


        foreach ($testsQuestionsResults as $result) {
            if ($result['trial_answer'] == 'correct') {
                $score += 1;
            }
            continue;
        }


        //Save test scores
        $studentTestResult = TrialTestResult::findOrFail($studentTrialTestID);
        $studentTestResult->update([
            'visitor_score' => $score . ' out of ' . $numberQuestions . ' => ' . number_format((($score / $numberQuestions) * 100), 2) . '%',
        ]);

        // You can access the submitted answers using $this->answers array
        $this->answers = [];
        $this->currentStep = $numberQuestions + 1;



        //Trigger Send Result Email Report
        info($this->email);
        //check if email is not null
        if ($this->email != null) {
            $details = [
                'trial_test_id' => $studentTrialTestID,
                'email' => $this->email,
            ];

            SendTestTrialReport::dispatch($details);
        }


        //Destroy Session After Submitting
        session()->forget('student_trial_test_id');
        // After completing the submission process, reset the submitting flag
        $this->submitting = false;
    }

    public function updated($propertyName)
    {
        $this->emit('currentStepUpdated', $this->currentStep);
    }
}
