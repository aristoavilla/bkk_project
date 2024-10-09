<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserType::insert([
        [
            'type' => 'Admin',
        ],[
            'type' => 'Teacher'
        ],[
            'type' => 'Student'
        ],[
            'type' => 'User'
        ]
    ]);
    }
}
