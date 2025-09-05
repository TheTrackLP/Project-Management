<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Hash;

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
            //Employee
            [
                'name' => 'Employee',
                'email' => 'emp@gmail.com',
                'password' => Hash::make(111),
                'phone_number' => '432',
                'address' => 'Address',
                'roles' => '2',
                'designation_id' => '2',
                'status' => '1',
            ],
        ]);
    }
}