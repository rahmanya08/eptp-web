<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('img-url');
            $table->date('birth_date');
            $table->enum('gender',['male','female']);
            $table->enum('identity_type',['KTP','KTM']);
            $table->string('identity_num')->unique();
            $table->string('phone_num')->unique();
            $table->string('email')->unique();
            $table->string('address');
            $table->string('role');
            $table->string('major');
            $table->string('study_program');
            $table->string('semester');
            $table->boolean('is_accepted')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
