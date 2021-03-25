<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Jizhruof;
class CreateJizhruofsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jizhruofs', function (Blueprint $table) {
            $table->id();
            #$table->string('rsrp')->comment('信号质量');
            $table->string('splon')->comment('经度');
            $table->string('splat')->comment('纬度');
            $table->string('name')->comment('商铺名称');
            $table->string('quyu')->comment('区域');
            $table->string('wangge')->comment('所属网格');
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
        Schema::dropIfExists('jizhruofs');
    }
}
