<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            ['name_ar' => 'Laravel', 'name_en' => 'Laravel'],
            ['name_ar' => 'PHP', 'name_en' => 'PHP'],
            ['name_ar' => 'React.js', 'name_en' => 'React.js'],
            ['name_ar' => 'Vue.js', 'name_en' => 'Vue.js'],
            ['name_ar' => 'JavaScript', 'name_en' => 'JavaScript'],
            ['name_ar' => 'TypeScript', 'name_en' => 'TypeScript'],
            ['name_ar' => 'MySQL', 'name_en' => 'MySQL'],
            ['name_ar' => 'HTML5', 'name_en' => 'HTML5'],
            ['name_ar' => 'CSS3', 'name_en' => 'CSS3'],
            ['name_ar' => 'Tailwind CSS', 'name_en' => 'Tailwind CSS'],
            ['name_ar' => 'Bootstrap', 'name_en' => 'Bootstrap'],
            ['name_ar' => 'Git', 'name_en' => 'Git'],
            ['name_ar' => 'Docker', 'name_en' => 'Docker'],
            ['name_ar' => 'AWS', 'name_en' => 'AWS'],
            ['name_ar' => 'Node.js', 'name_en' => 'Node.js'],
            ['name_ar' => 'Redis', 'name_en' => 'Redis'],
            ['name_ar' => 'REST APIs', 'name_en' => 'REST APIs'],
            ['name_ar' => 'GraphQL', 'name_en' => 'GraphQL'],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
