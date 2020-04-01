<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('sender_name')->nullable();
            $table->string('email_from')->nullable();
            $table->text('email_to')->nullable();
            $table->string('reply_mail')->nullable();
            $table->text('message')->nullable();
            $table->string('subject')->nullable();
            $table->text('introduction')->nullable();
            $table->text('thanks_text')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
