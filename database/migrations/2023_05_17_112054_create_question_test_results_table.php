<?php

use App\Models\Question;
use App\Models\StudentResult;
use App\Models\Test;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionTestResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_test_results', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Question::class, 'question_id')->nullable()->constrained();
            $table->foreignIdFor(Test::class, 'test_id')->nullable()->constrained();
            $table->foreignIdFor(StudentResult::class, 'student_result_id')->nullable()->constrained();
            $table->foreignIdFor(User::class, 'user_id')->nullable()->constrained();
            $table->enum('answer',['correct','wrong'])->nullable();
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
        Schema::dropIfExists('question_test_results');
    }
}
