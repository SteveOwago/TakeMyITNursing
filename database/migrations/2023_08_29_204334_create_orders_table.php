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
            $table->foreignIdFor(OrderType::class,'order_type_id')->nullable()->constrained();
            $table->foreignIdFor(OrderLevel::class,'order_level_id')->nullable()->constrained();
            $table->foreignIdFor(OrderSubject::class,'order_subject_id')->nullable()->constrained();
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
