<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title_ar' => 'نظام إدارة المحتوى',
                'title_en' => 'Content Management System',
                'description_ar' => 'نظام إدارة محتوى متطور مبني بـ Laravel و Vue.js يدعم المحتوى متعدد اللغات والصلاحيات المتقدمة',
                'description_en' => 'Advanced content management system built with Laravel and Vue.js supporting multi-language content and advanced permissions',
                'website_link' => 'https://demo-cms.example.com',
                'github_link' => 'https://github.com/user/cms-project',
                'skills' => [1, 2, 4, 5, 7, 10, 12] // Laravel, PHP, Vue.js, JavaScript, MySQL, Tailwind, Git
            ],
            [
                'title_ar' => 'تطبيق التجارة الإلكترونية',
                'title_en' => 'E-commerce Application',
                'description_ar' => 'متجر إلكتروني شامل مع نظام دفع، إدارة المخزون، ولوحة تحكم للبائعين مبني بـ Laravel و React',
                'description_en' => 'Complete e-commerce store with payment system, inventory management, and vendor dashboard built with Laravel and React',
                'website_link' => 'https://shop.example.com',
                'github_link' => 'https://github.com/user/ecommerce',
                'skills' => [1, 2, 3, 5, 7, 10, 12, 17] // Laravel, PHP, React, JavaScript, MySQL, Tailwind, Git, REST APIs
            ],
            [
                'title_ar' => 'لوحة تحكم تحليلات',
                'title_en' => 'Analytics Dashboard',
                'description_ar' => 'لوحة تحكم متقدمة لعرض التحليلات والإحصائيات مع الرسوم البيانية التفاعلية',
                'description_en' => 'Advanced analytics dashboard with interactive charts and real-time data visualization',
                'website_link' => 'https://analytics.example.com',
                'github_link' => 'https://github.com/user/analytics',
                'skills' => [3, 5, 6, 15, 17, 18] // React, JavaScript, TypeScript, Node.js, REST APIs, GraphQL
            ],
        ];

        foreach ($projects as $projectData) {
            $skills = $projectData['skills'];
            unset($projectData['skills']);

            $project = Project::create($projectData);
            $project->skills()->attach($skills);
        }
    }
}
