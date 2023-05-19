<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentResult extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function test(){
        return $this->belongsTo(Test::class,'test_id');
    }

    public function questions(){
        return $this->hasMany(Question::class,);
    }
}
