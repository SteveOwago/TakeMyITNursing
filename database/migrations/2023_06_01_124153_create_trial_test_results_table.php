<?php

use App\Models\TestTrial;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrialTestResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trial_test_results', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(TestTrial::class, 'test_trial_id')->nullable()->constrained();
            $table->string('visitor_email')->nullable();
            $table->ipAddress('visitor_ip_address')->nullable();
            $table->string('visitor_score')->nullable();
            $table->string('visitor_test_duration')->nullable();
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
        Schema::dropIfExists('trial_test_results');
    }
}
