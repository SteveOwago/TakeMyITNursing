<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tests(){
        return $this->hasMany(Test::class, 'subject_category_id');
    }
}
