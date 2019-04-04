<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotifierContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifier_content', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_identifier_id')->unsigned();
            $table->string('type')->nullable(); //Email, SMS, Push, Notification
            $table->text('content')->nullable();
            $table->text('message')->nullable();
            $table->text('subject')->nullable();
            
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
        Schema::dropIfExists('notifier_content');
    }
}
