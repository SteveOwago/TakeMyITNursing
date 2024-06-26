<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'choices' => 'array',
    ];

    public function topic(){
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    public function test(){
        return $this->belongsTo(Test::class,'test_id');
    }
}
