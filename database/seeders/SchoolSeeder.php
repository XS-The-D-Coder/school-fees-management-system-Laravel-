<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Student;
use App\Models\Fee;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
    $admin = User::create([
        'name' => 'Admin User',
        'email' => 'admin@school.com',
        'password' => bcrypt('password'),
        'role' => 'admin',
    ]);

    // Student
    $studentUser = User::create([
        'name' => 'John Doe',
        'email' => 'john@student.com',
        'password' => bcrypt('password'),
        'role' => 'student',
    ]);

    $student = Student::create([
        'user_id' => $studentUser->id,
        'admission_number' => 'STD001',
        'grade' => 'Form 2',
    ]);

    Fee::create([
        'student_id' => $student->id,
        'amount' => 25000.00,
        'due_date' => now()->addDays(30),
    ]);
    }
}
