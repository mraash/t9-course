<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $groups = Group::factory(10)->create();
        $courses = Course::factory(10)->create();
        $students = Student::factory(200)->create();

        $students->each(function (Student $student) use ($groups, $courses) {
            $studentCourses = [];

            $courseKeys = array_rand($courses->toArray(), fake()->numberBetween(1, 3));
            $courseKeys = is_array($courseKeys) ? $courseKeys : [$courseKeys];

            foreach ($courseKeys as $index) {
                array_push($studentCourses, $courses->get($index));
            }

            $studentGroup = fake()->randomElement($groups);

            $student->group()->associate($studentGroup)->save();
            $student->courses()->saveMany($studentCourses);
        });
    }
}
