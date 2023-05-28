<?php

use App\Models\Test;
use App\Models\Topic;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('question')->nullable();
            $table->text('answer')->nullable();
            $table->json('choices')->nullable();
            $table->text('short_answer')->nullable();
            $table->text('full_answer')->nullable();
            $table->text('answer_resource')->nullable();
            $table->string('question_image_path')->nullable();
            $table->foreignIdFor(Test::class,'test_id')->nullable()->constrained();
            $table->foreignIdFor(Topic::class,'topic_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
