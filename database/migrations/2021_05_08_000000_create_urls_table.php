<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrlsTable extends Migration
{
    public function up()
    {
        Schema::create('urls', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamp('updated_at');
            $table->timestamp('created_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('urls');
    }
}
