<?php

namespace App\Services;

use App\Models\Question;
use App\Models\QuestionTestResult;

/**
 * Class TestService.
 */
class TestService
{
    public function getResult($studentResult,$test){
        $questionIDs = QuestionTestResult::select('question_id')->where('student_result_id',$studentResult->id)->cursor();
        $questions = Question::whereIn('id',$questionIDs)->get();
        return ['questions'=>$questions,'test'=>$test];
    }
}
