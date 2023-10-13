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
            $table->foreignIdFor(User::class)->nullable()->constrained();
            $table->string('image')->default(null);
            $table->enum('gender',['Male','Female']);
            $table->date('birth_date');
            $table->enum('identity_type',['KTP','KTM'])->nullable();
            $table->string('identity_num',20)->unique();
            $table->enum('category',['Student','Employee','Public'])->nullable();
            $table->string('major',50)->nullable();
            $table->string('study_program',50)->nullable();
            $table->string('semester',15)->nullable();
            $table->string('phone',15)->unique();
            $table->string('address');
            $table->enum('position',['Head Staff','Staff'])->nullable();
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
