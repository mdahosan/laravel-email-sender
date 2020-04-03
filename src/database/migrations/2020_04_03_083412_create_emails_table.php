<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->id();
            $table->string('sender_name')->nullable();
            $table->string('email_from')->nullable();
            $table->text('email_to')->nullable();
            $table->string('reply_mail')->nullable();
            $table->text('message')->nullable();
            $table->string('subject')->nullable();
            $table->text('introduction')->nullable();
            $table->text('thanks_text')->nullable();
            $table->integer('total_emails')->nullable();
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
        Schema::dropIfExists('emails');
    }
}
