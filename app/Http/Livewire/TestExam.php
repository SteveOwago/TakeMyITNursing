<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Question;
use App\Models\QuestionTestResult;
use App\Models\StudentResult;
use App\Models\Test;

class TestExam extends Component
{

    public $currentStep = 1;
    public $questions = [];
    public $answers = [];
    public $studentTestID;
    public $testID;

    public function mount($id)
    {
        // // Retrieve questions from the database
         $test = Test::findOrFail($id);

       // Session Test to on page Refresh
        if (session()->has('student_test_id')) {
            $studentTestID = session('student_test_id');
        } else {
            // Create a new StudentResult
            $studentTestID = StudentResult::create([
                'test_id' => $test->id ?? null,
                'user_id' => auth()->user()->id ?? null,
            ])->id;

            // Store the StudentResult ID in the session
            session(['student_test_id' => $studentTestID]);
        }

        // Assign the StudentResult ID to the component property
        $this->studentTestID = $studentTestID;

        // Retrieve the questions for the test
        $this->questions = Question::where('test_id', $test->id)
            ->inRandomOrder()
            ->take($test->max_number_of_questions)
            ->get();

        $this->testID = $id;
    }

    public function render()
    {
        return view('livewire.test-exam');
    }

    public function submit($questions, $studentTestID)
    {

        $testsQuestionsResults = [];
        foreach ($questions as $question) {
            $choice = 'wrong';
            foreach ($this->answers as $key => $answer) {
                if ($key == $question['id']) {
                    $choice = str_replace('choice_', '', $answer);
                }
            }
            $testStudent =  QuestionTestResult::create([
                'question_id' => $question['id'] ?? null,
                'test_id' => $question['test_id'] ?? null,
                'user_id' => auth()->user()->id ?? null,
                'student_result_id' => $studentTestID,
                'answer' => $choice == $question['answer'] ? 'correct' : 'wrong',
                'student_choice' => $choice
            ]);
            $testsQuestionsResults[] = $testStudent;
        }
        $numberQuestions = count($questions);
        $score = 0;


        foreach ($testsQuestionsResults as $result) {
            if ($result['answer'] == 'correct') {
                $score += 1;
            }
            continue;
        }



        //Save test scores
        $studentTestResult = StudentResult::findOrFail($studentTestID);
        $studentTestResult->update([
            'score' => $score . ' out of ' . $numberQuestions . ' => ' . number_format((($score / $numberQuestions) * 100), 2) . '%',
        ]);

        // You can access the submitted answers using $this->answers array
        $this->answers = [];
        $this->currentStep = $numberQuestions + 1;
        //Destroy Session After Submitting
        session()->forget('student_test_id');
    }

    public function updated($propertyName)
    {
        $this->emit('currentStepUpdated', $this->currentStep);
    }
}
