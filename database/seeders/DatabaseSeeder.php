<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Batch;
use App\Models\Alumni;
use App\Models\Career;
use App\Models\Gender;
use App\Models\Application;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserTypeSeeder::class);
        // User::factory(10)->create();

        Gender::insert([
            [
                'gender' => 'Male'
            ],
            [
                'gender' => 'Female'
            ]
        ]);

        $batches = [];

        for ($year = 2010; $year <= 2024; $year++) {
            $batches[] = ['batch' => $year];
        }

        Batch::insert($batches);

        User::factory()->create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin',
            'type_id' => 1
        ]);

        User::factory()->create([
            'username' => 'teacher',
            'email' => 'teacher@gmail.com',
            'password' => Hash::make('teacher'),
            'type_id' => 2
        ]);
        
        User::factory()->create([
            'username' => 'student',
            'email' => 'student@gmail.com',
            'password' => Hash::make('student'),
            'type_id' => 3
        ]);

        User::factory()->create([
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user'),
            'type_id' => 4
        ]);

        User::factory(10)->create();

        Career::create([
            'company' => 'Jomokerto Light Company',
            'location' => 'Jomokerto',
            'job_title' => 'Javanese-Coolie',
            'description' => 'This is a Javanese Coolie company',
            'user_id' => 1
        ]);

        Alumni::factory(20)->create();

        Career::factory(5)->create();

        Application::factory(10)->create();
    }
}
