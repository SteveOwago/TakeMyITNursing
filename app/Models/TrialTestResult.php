<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrialTestResult extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function test(){
        return $this->belongsTo(Test::class,'test_trial_id');
    }
}
