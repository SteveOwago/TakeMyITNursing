<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrialTestQuestionResult extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'trial_test_question_results';

    public function question(){
        return $this->belongsTo(Question::class, 'question_id');
    }
}
