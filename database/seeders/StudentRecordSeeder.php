<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Student;

class StudentRecordSeeder extends Seeder
{
    /**
     * Seed the database with sample courses and students.
     */
    public function run(): void
    {
        // Create sample courses
        $webDev = Course::create([
            'name' => 'Web Development',
            'code' => 'CS101',
            'description' => 'Learn HTML, CSS, JavaScript, and modern web frameworks.',
        ]);

        $database = Course::create([
            'name' => 'Database Systems',
            'code' => 'CS201',
            'description' => 'Introduction to relational databases, SQL, and data modeling.',
        ]);

        $mobileDev = Course::create([
            'name' => 'Mobile App Development',
            'code' => 'CS301',
            'description' => 'Build native and cross-platform mobile applications.',
        ]);

        // Create sample students
        Student::create([
            'name' => 'Alice Johnson',
            'email' => 'alice@example.com',
            'phone' => '+250 788 111 111',
            'course_id' => $webDev->id,
        ]);

        Student::create([
            'name' => 'Bob Smith',
            'email' => 'bob@example.com',
            'phone' => '+250 788 222 222',
            'course_id' => $database->id,
        ]);

        Student::create([
            'name' => 'Carol Williams',
            'email' => 'carol@example.com',
            'phone' => '+250 788 333 333',
            'course_id' => $webDev->id,
        ]);

        Student::create([
            'name' => 'David Brown',
            'email' => 'david@example.com',
            'course_id' => $mobileDev->id,
        ]);

        Student::create([
            'name' => 'Emma Davis',
            'email' => 'emma@example.com',
            'phone' => '+250 788 555 555',
            'course_id' => $database->id,
        ]);
    }
}
