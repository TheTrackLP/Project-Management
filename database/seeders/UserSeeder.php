<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //admin
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make(111),
                'phone_number' => '123',
                'address' => 'Address',
                'roles' => '1',
                'designation_id' => '1',
                'status' => '1',
            ],
        ]);
        for ($i=0; $i < 10; $i++) { 
            User::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'password' => Hash::make(111),
                'phone_number' => fake()->phoneNumber(),
                'address' => fake()->address(),
                'roles' => '4',
                'designation_id' => "1",
                'status' => "1",
            ]);
        }
        for ($i=0; $i < 5; $i++) { 
            User::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'password' => Hash::make(111),
                'phone_number' => fake()->phoneNumber(),
                'address' => fake()->address(),
                'roles' => '3',
                'designation_id' => "2",
                'status' => "1",
            ]);
        }
    }
}