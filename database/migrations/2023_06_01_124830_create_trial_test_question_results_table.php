<?php

use App\Models\TrialTestResult;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Test;
use App\Models\Question;

class CreateTrialTestQuestionResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trial_test_question_results', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Question::class, 'question_id')->nullable()->constrained();
            $table->foreignIdFor(Test::class, 'test_id')->nullable()->constrained();
            $table->string('trial_test_id')->nullable();
            $table->string('visitor_email')->nullable();
            $table->enum('trial_answer',['correct','wrong'])->nullable();
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
        Schema::dropIfExists('trial_test_question_results');
    }
}
