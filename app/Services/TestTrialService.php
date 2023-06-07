<?php

namespace App\Services;


use App\Models\Question;
use App\Models\TrialTestQuestionResult;
use App\Models\TrialTestResult;

/**
 * Class TestTrialService.
 */
class TestTrialService
{
    public function getTestQuestion($trialTest, $test,$email)
    {
        $questionIDs = TrialTestQuestionResult::select('question_id')->where('trial_test_id', $trialTest->id)->cursor();
       // $questions = Question::whereIn('id', $questionIDs)->get();
        $testTrialQuestions = TrialTestQuestionResult::with(['question'])->where('trial_test_id', $trialTest->id)->cursor();
        $testResult = TrialTestResult::where('visitor_email', $email)->latest()->value('visitor_score');

        return [
            'test' => $test,
            'testTrialQuestions' => $testTrialQuestions,
            'test_result' => $testResult
        ];
    }
}
