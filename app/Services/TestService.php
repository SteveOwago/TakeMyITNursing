<?php

namespace App\Services;

use App\Models\Question;
use App\Models\QuestionTestResult;
use App\Models\StudentResult;

/**
 * Class TestService.
 */
class TestService
{
    public function getResult($studentResult)
    {
       // dd($studentResult);
        $testQuestions = QuestionTestResult::with(['question'])->where('test_id', $studentResult->test->id)->where('user_id', auth()->user()->id)->where('student_result_id',$studentResult->id)->cursor();
        $testResult = StudentResult::where('user_id', $studentResult->user->id)->where('test_id', $studentResult->test->id)->latest()->value('score');
        return [
            'testQuestions' => $testQuestions,
            'test' => $studentResult->test,
            'test_result' => $testResult
        ];
    }
}
