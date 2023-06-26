<?php

use App\Models\Test;
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
        Schema::create('detail_tests', function (Blueprint $table) {
            $table->id();
            $table->string('registration');
            $table->foreignIdFor(Test::class)->nullable()->constrained();
            $table->foreignId('participant_id')->nullable()->constrained('users');
            $table->string('pay_url');
            $table->boolean('is_payed')->default(false);
            $table->date('date_validation')->nullable();
            $table->string('skor')->nullable();
            $table->string('sertif_url')->nullable();
            $table->boolean('is_passed')->default(false);
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
        Schema::dropIfExists('detail_tests');
    }
};
