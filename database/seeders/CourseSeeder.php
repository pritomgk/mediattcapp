<?php

namespace Database\Seeders;

use App\Models\course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        course::create([
            'title' => 'CSE',
            'tagline' => 'Computer Science & Engineering.',
            'teacher_name' => 'Harun Sir',
            'description' => 'CSE is a demandable subject now.',
            'price' => '4500',
            'content' => 'course_6.jpg',
        ]);
        course::create([
            'title' => 'ICT',
            'tagline' => 'Computer Science & Engineering.',
            'teacher_name' => 'Harun Sir',
            'description' => 'CSE is a demandable subject now.',
            'price' => '5000',
            'content' => 'course_1.jpg',
        ]);
        course::create([
            'title' => 'Technology',
            'tagline' => 'Computer Science & Engineering.',
            'teacher_name' => 'Harun Sir',
            'description' => 'CSE is a demandable subject now.',
            'price' => '5500',
            'content' => 'course_3.jpg',
        ]);
    }
}


