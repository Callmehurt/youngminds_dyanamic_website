<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavbarMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navbar_menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('menu_name');
            $table->integer('parent_id')->default(0);
            $table->integer('menu_type_id')->unsigned();
            $table->string('site_url')->nullable();
            $table->string('slug')->nullable();
            $table->string('module_url')->nullable();
            $table->integer('display_order');
            $table->enum('status',[1,0])->default(1);
            $table->foreign('menu_type_id')->references('id')->on('navbar_menu_types')->onDelete('cascade');
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
        Schema::dropIfExists('navbar_menus');
    }
}
