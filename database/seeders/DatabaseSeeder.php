<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Hash;
use App\Models\Categories;
use App\Models\Designation;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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
        for ($i=0; $i < 5; $i++) { 
            User::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'password' => Hash::make(111),
                'phone_number' => fake()->phoneNumber(),
                'address' => fake()->address(),
                'roles' => '4',
                'category_id' => "1",
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
                'roles' => '4',
                'category_id' => "2",
                'designation_id' => "2",
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
                'roles' => '4',
                'category_id' => "3",
                'designation_id' => "3",
                'status' => "1",
            ]);
        }
        Categories::insert([
            [
                'cat_name' => "Web Development",
                'cat_notes' => 'Web Devs' 
            ],
            [
                'cat_name' => "Mobile Development",
                'cat_notes' => 'Mobile Devs' 
            ],
            [
                'cat_name' => "Game Development",
                'cat_notes' => 'Game Devs' 
            ],

        ]);
        Designation::insert([
            [
                'desg_name' => "Web Developer",
                'category_id' => "1",
                'desg_notes' => 'For Web Development',
            ],
            [
                'desg_name' => "Mobile Developer",
                'category_id' => "2",
                'desg_notes' => 'For Mobile Development',
            ],
            [
                'desg_name' => "Game Developer",
                'category_id' => "3",
                'desg_notes' => 'For Game Development',
            ],
        ]);
    }
}