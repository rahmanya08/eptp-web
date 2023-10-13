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
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->nullable()->constrained('users');
            $table->date('date_test');
            $table->time('time_test');
            $table->string('quota',10)->nullable();
            $table->enum('type_test',['TOEFL','EPTP']);
            $table->boolean('status_test')->default(false);
            $table->boolean('report')->default(false);
            $table->date('date_report')->nullable();
            $table->foreignId('report_validator')->nullable()->constrained('users');
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
        Schema::dropIfExists('tests');
    }
};
