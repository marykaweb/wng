<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id'); // id
            $table->string('title', 255); // заголовок новости
            $table->string('slug')->uniquie();
            $table->longText('description'); // описание
            $table->integer('created_by')->nullable(); // кем создана
            $table->tinyInteger('is_published')->nullable(); // опубликована
            $table->timestamps(); // дата создания и дата обновления записи
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
