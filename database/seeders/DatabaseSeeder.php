<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Student;
use App\Models\Guardian;
use App\Models\Classroom;
use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)->create();
        Guardian::factory(10)->create();
        Subject::factory(5)->hasTeacher(1)->create();
        Classroom::factory(9)->hasStudents(5)->create();
        
        
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
