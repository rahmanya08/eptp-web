<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Identity; 
use App\Models\Payment;
use App\Models\Schedule;
use App\Models\Result;




class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        // Identity::factory(8)->create();
        // Payment::factory(5)->create();
        // Schedule::factory(5)->create();
        // Result::factory(3)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //     'name' => 'Ian Somerhalder',
        //     'img-url' => 'ian.jpg',
        //     'birth_date' => '1993-12-08',
        //     'gender' => 'Male',
        //     'identity_type' => 'KTP',
        //     'identity_num' => '456789876543',
        //     'phone_num' => '098765432',
        //     'email' => 'ian08@gmail.com',
        //     'address' => 'California',
        //     'password' => bcrypt ('12345'),
        //     'role' => 'Staff',
        //     'major' => 'null',
        //     'study_program' => 'null',
        //     'semester' => 'null',
        //     'is_accepted' => '1'
        // ]);

        // Test::create([
        //     'type' => 'TOEFL',
        //     'test_date' => '2023-02-02',
        // ]); 

        // Payment::create([
        //     'register_date' => '2023-02-02',
        //     'payment_doc' => 'bill.jpg',
        //     'is_verified' => '1'

        // ]);

        Identity::create([
        'user_id'=>3,
        'image'=>'djhjdjw',
        'gender'=>'Male',
        'birth_date'=>now(),
        'identity_type'=>'KTP',
        'identity_num'=>'787877798799797',
        'category'=>'Student',
        'phone'=>'9298293892',
        'address'=>'clacap',
        'position'=>'staff',
        ]);


    }
}
