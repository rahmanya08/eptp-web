<?php

use App\Models\User;
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
        Schema::create('identities', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained();
            $table->string('name');
            $table->string('img_url');
            $table->date('birth_date');
            $table->enum('gender',['Male','Female']);
            $table->enum('identity_type',['KTP','KTM']);
            $table->string('identity_num')->unique();
            $table->string('phone')->unique();
            $table->string('address');
            $table->enum('category',['Public', 'Employee', 'Student']);
            $table->string('major');
            $table->string('program');
            $table->string('semester');
            $table->enum('jabatan',['leader','staff']);
            $table->boolean('status_identitas');
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
        Schema::dropIfExists('identities');
    }
};
