<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            // Programming Languages
            ['name_ar' => 'PHP', 'name_en' => 'PHP'],
            ['name_ar' => 'C++', 'name_en' => 'C++'],
            ['name_ar' => 'Python', 'name_en' => 'Python'],
            ['name_ar' => 'C#', 'name_en' => 'C#'],
            ['name_ar' => 'SQL', 'name_en' => 'SQL'],
            ['name_ar' => 'HTML', 'name_en' => 'HTML'],
            ['name_ar' => 'CSS', 'name_en' => 'CSS'],
            ['name_ar' => 'JavaScript', 'name_en' => 'JavaScript'],

            // Frameworks & Libraries
            ['name_ar' => 'Laravel', 'name_en' => 'Laravel'],
            ['name_ar' => '.NET', 'name_en' => '.NET'],
            ['name_ar' => 'Django', 'name_en' => 'Django'],
            ['name_ar' => 'Flask', 'name_en' => 'Flask'],
            ['name_ar' => 'jQuery', 'name_en' => 'jQuery'],
            ['name_ar' => 'Bootstrap', 'name_en' => 'Bootstrap'],
            ['name_ar' => 'Filament', 'name_en' => 'Filament'],

            // Databases & Database Tools
            ['name_ar' => 'PHP My Admin', 'name_en' => 'PHP My Admin'],
            ['name_ar' => 'MySQL', 'name_en' => 'MySQL'],
            ['name_ar' => 'PostgreSQL', 'name_en' => 'PostgreSQL'],
            ['name_ar' => 'Workbench', 'name_en' => 'Workbench'],
            ['name_ar' => 'SQL Server', 'name_en' => 'SQL Server'],

            // Programming Concepts
            ['name_ar' => 'OOP', 'name_en' => 'OOP'],
            ['name_ar' => 'Data Structure', 'name_en' => 'Data Structure'],
            ['name_ar' => 'Algorithms', 'name_en' => 'Algorithms'],
            ['name_ar' => 'Design Patterns', 'name_en' => 'Design Patterns'],
            ['name_ar' => 'MVC', 'name_en' => 'MVC'],
            ['name_ar' => 'RESTful API', 'name_en' => 'RESTful API'],
            ['name_ar' => 'SQL Injection', 'name_en' => 'SQL Injection'],

            // Development Tools
            ['name_ar' => 'Git', 'name_en' => 'Git'],
            ['name_ar' => 'GitHub', 'name_en' => 'GitHub'],
            ['name_ar' => 'Xdebug', 'name_en' => 'Xdebug'],
            ['name_ar' => 'Composer', 'name_en' => 'Composer'],
            ['name_ar' => 'pip', 'name_en' => 'pip'],
            ['name_ar' => 'Visual Studio', 'name_en' => 'Visual Studio'],
            ['name_ar' => 'Visual Studio Code', 'name_en' => 'Visual Studio Code'],

            // Additional Skills (from projects)
            ['name_ar' => 'JWT Authentication', 'name_en' => 'JWT Authentication'],
            ['name_ar' => 'Firebase', 'name_en' => 'Firebase'],
            ['name_ar' => 'Google Maps API', 'name_en' => 'Google Maps API'],
            ['name_ar' => 'Paymob', 'name_en' => 'Paymob'],
            ['name_ar' => 'Repository Pattern', 'name_en' => 'Repository Pattern'],
            ['name_ar' => 'Service Layer', 'name_en' => 'Service Layer'],
            ['name_ar' => 'Strategy Pattern', 'name_en' => 'Strategy Pattern'],
            ['name_ar' => 'Spatie Permissions', 'name_en' => 'Spatie Permissions'],
            ['name_ar' => 'Filament FullCalendar', 'name_en' => 'Filament FullCalendar'],
            ['name_ar' => 'Spatie Activity Log', 'name_en' => 'Spatie Activity Log'],
            ['name_ar' => 'Laravel Sanctum', 'name_en' => 'Laravel Sanctum'],
            ['name_ar' => 'Blade UI', 'name_en' => 'Blade UI'],
            ['name_ar' => 'SOLID Principles', 'name_en' => 'SOLID Principles'],
            ['name_ar' => 'Form Requests', 'name_en' => 'Form Requests'],
            ['name_ar' => 'Code First', 'name_en' => 'Code First'],
            ['name_ar' => 'ERD Design', 'name_en' => 'ERD Design'],
            ['name_ar' => 'LINQ', 'name_en' => 'LINQ'],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
