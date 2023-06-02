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
            $table->string('image');
            $table->enum('gender',['Male','Female']);
            $table->date('birth_date');
            $table->enum('identity_type',['KTP','KTM'])->nullable();
            $table->string('identity_num')->unique();
            $table->enum('category',['Student', 'Employee', 'Public'])->nullable();
            $table->string('major')->nullable();
            $table->string('study_program')->nullable();
            $table->string('semester')->nullable();
            $table->string('phone')->unique();
            $table->string('address');
            $table->enum('position',['Head Staff','Staff'])->nullable();
            $table->boolean('status_identitas')->default(true);
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
