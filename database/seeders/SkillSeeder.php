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
            ['name_ar' => 'Python', 'name_en' => 'Python'],
            ['name_ar' => 'C#', 'name_en' => 'C#'],
            ['name_ar' => 'JavaScript', 'name_en' => 'JavaScript'],
            ['name_ar' => 'TypeScript', 'name_en' => 'TypeScript'],
            ['name_ar' => 'HTML5', 'name_en' => 'HTML5'],
            ['name_ar' => 'CSS3', 'name_en' => 'CSS3'],

            // Frameworks & Libraries
            ['name_ar' => 'Laravel', 'name_en' => 'Laravel'],
            ['name_ar' => 'Flask', 'name_en' => 'Flask'],
            ['name_ar' => 'Filament', 'name_en' => 'Filament'],
            ['name_ar' => 'Livewire', 'name_en' => 'Livewire'],
            ['name_ar' => 'React.js', 'name_en' => 'React.js'],
            ['name_ar' => 'Vue.js', 'name_en' => 'Vue.js'],
            ['name_ar' => 'Bootstrap', 'name_en' => 'Bootstrap'],
            ['name_ar' => 'Tailwind CSS', 'name_en' => 'Tailwind CSS'],
            ['name_ar' => 'jQuery', 'name_en' => 'jQuery'],

            // Databases
            ['name_ar' => 'MySQL', 'name_en' => 'MySQL'],
            ['name_ar' => 'SQL Server', 'name_en' => 'SQL Server'],
            ['name_ar' => 'SQLite', 'name_en' => 'SQLite'],
            ['name_ar' => 'Redis', 'name_en' => 'Redis'],

            // Development Tools & Technologies
            ['name_ar' => 'Git', 'name_en' => 'Git'],
            ['name_ar' => 'GitHub', 'name_en' => 'GitHub'],
            ['name_ar' => 'Docker', 'name_en' => 'Docker'],
            ['name_ar' => 'Composer', 'name_en' => 'Composer'],
            ['name_ar' => 'NPM', 'name_en' => 'NPM'],
            ['name_ar' => 'Webpack', 'name_en' => 'Webpack'],
            ['name_ar' => 'Vite', 'name_en' => 'Vite'],

            // Web Technologies
            ['name_ar' => 'REST APIs', 'name_en' => 'REST APIs'],
            ['name_ar' => 'JSON', 'name_en' => 'JSON'],
            ['name_ar' => 'AJAX', 'name_en' => 'AJAX'],
            ['name_ar' => 'WebSockets', 'name_en' => 'WebSockets'],

            // E-commerce & CMS
            ['name_ar' => 'E-commerce Development', 'name_en' => 'E-commerce Development'],
            ['name_ar' => 'Payment Integration', 'name_en' => 'Payment Integration'],
            ['name_ar' => 'Multi-language Support', 'name_en' => 'Multi-language Support'],
            ['name_ar' => 'Content Management', 'name_en' => 'Content Management'],

            // Desktop Development
            ['name_ar' => 'Windows Forms', 'name_en' => 'Windows Forms'],
            ['name_ar' => 'Desktop Applications', 'name_en' => 'Desktop Applications'],

            // Language Design & Compilers
            ['name_ar' => 'Lexical Analysis', 'name_en' => 'Lexical Analysis'],
            ['name_ar' => 'Parser Design', 'name_en' => 'Parser Design'],
            ['name_ar' => 'Interpreter Development', 'name_en' => 'Interpreter Development'],
            ['name_ar' => 'Programming Language Design', 'name_en' => 'Programming Language Design'],

            // Social Media & Analytics
            ['name_ar' => 'Social Media Integration', 'name_en' => 'Social Media Integration'],
            ['name_ar' => 'Analytics Dashboard', 'name_en' => 'Analytics Dashboard'],
            ['name_ar' => 'Scheduled Publishing', 'name_en' => 'Scheduled Publishing'],

            // Authentication & Security
            ['name_ar' => 'User Authentication', 'name_en' => 'User Authentication'],
            ['name_ar' => 'Role-based Access Control', 'name_en' => 'Role-based Access Control'],
            ['name_ar' => 'Session Management', 'name_en' => 'Session Management'],
            ['name_ar' => 'Data Security', 'name_en' => 'Data Security'],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
