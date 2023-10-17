<?php

use App\Models\OrderLevel;
use App\Models\OrderSubject;
use App\Models\OrderType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_type_id', OrderType::class);
            $table->foreignId('order_level_id', OrderLevel::class);
            $table->foreignId('order_subject_id', OrderSubject::class);
            $table->string('order_end_date')->nullable();
            $table->string('attachments')->nullable();
            $table->string('order_pages')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
