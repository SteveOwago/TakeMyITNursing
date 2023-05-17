<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionTestResult extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function test(){
        return $this->belongsTo(Test::class,'test_id');
    }

    public function question(){
        return $this->belongsTo(Question::class,'question_id');
    }

    public function studentResult(){
        return $this->belongsTo(StudentResult::class,'student_result_id');
    }

}
