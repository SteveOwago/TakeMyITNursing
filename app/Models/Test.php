<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function subjectCategory(){
        return $this->belongsTo(SubjectCategory::class,'subject_category_id');
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }
}
