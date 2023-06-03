<?php

namespace App\Services;


use App\Models\Question;
use App\Models\TrialTestQuestionResult;

/**
 * Class TestTrialService.
 */
class TestTrialService
{
    public function getTestQuestion($trialTest, $test)
    {
        $questionIDs = TrialTestQuestionResult::select('question_id')->where('trial_test_id', $trialTest->id)->cursor();
       // $questions = Question::whereIn('id', $questionIDs)->get();
        $testTrialQuestions = TrialTestQuestionResult::with(['question'])->where('trial_test_id', $trialTest->id)->cursor();

        return ['test' => $test, 'testTrialQuestions' => $testTrialQuestions];
    }
}
