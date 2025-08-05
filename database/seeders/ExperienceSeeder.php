<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        $experiences = [
            [
                'title_ar' => 'مطور ويب أول',
                'title_en' => 'Senior Web Developer',
                'company_name_ar' => 'شركة التقنية المتطورة',
                'company_name_en' => 'Advanced Tech Company',
                'description_ar' => 'قيادة فريق من المطورين في تطوير تطبيقات ويب متقدمة باستخدام Laravel و React. تطوير أنظمة إدارة المحتوى وتطبيقات التجارة الإلكترونية.',
                'description_en' => 'Leading a team of developers in creating advanced web applications using Laravel and React. Developing content management systems and e-commerce applications.',
                'location' => 'القاهرة، مصر',
                'start_date' => '2022-01-01',
                'end_date' => null,
            ],
            [
                'title_ar' => 'مطور ويب متوسط',
                'title_en' => 'Mid-Level Web Developer',
                'company_name_ar' => 'استوديو الإبداع الرقمي',
                'company_name_en' => 'Digital Creative Studio',
                'description_ar' => 'تطوير مواقع ويب تفاعلية وتطبيقات ويب باستخدام Laravel و Vue.js. العمل مع فرق متعددة التخصصات لتقديم حلول متكاملة.',
                'description_en' => 'Developing interactive websites and web applications using Laravel and Vue.js. Working with cross-functional teams to deliver integrated solutions.',
                'location' => 'الجيزة، مصر',
                'start_date' => '2020-06-01',
                'end_date' => '2021-12-31',
            ],
            [
                'title_ar' => 'مطور ويب مبتدئ',
                'title_en' => 'Junior Web Developer',
                'company_name_ar' => 'شركة الحلول التقنية',
                'company_name_en' => 'Tech Solutions Company',
                'description_ar' => 'البداية في مجال تطوير الويب باستخدام PHP و MySQL. تعلم أساسيات Laravel وتطوير مواقع ويب بسيطة.',
                'description_en' => 'Starting in web development using PHP and MySQL. Learning Laravel fundamentals and developing simple websites.',
                'location' => 'القاهرة، مصر',
                'start_date' => '2019-03-01',
                'end_date' => '2020-05-31',
            ],
        ];

        foreach ($experiences as $experience) {
            Experience::create($experience);
        }
    }
}
