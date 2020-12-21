<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('office_type_id')->unsigned();
            $table->foreign('office_type_id')->references('id')->on('office_types');

            $table->integer('parent_id')->default(0);

            $table->integer('district_id')->unsigned();
            $table->foreign('district_id')->references('id')->on('districts');

            $table->string('office_code');
            $table->string('office_name');
            $table->string('office_path');
            $table->enum('office_status',['active','inactive']);
            $table->softDeletes();
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
        Schema::dropIfExists('offices');
    }
}
