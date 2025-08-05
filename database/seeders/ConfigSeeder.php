<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    public function run(): void
    {
        Config::create([
            'name_ar' => 'أحمد محمد',
            'name_en' => 'Ahmed Mohamed',
            'job_title_ar' => 'مطور ويب متقدم',
            'job_title_en' => 'Senior Web Developer',
            'summary_ar' => 'مطور ويب محترف مع خبرة في Laravel، React، Vue.js وتقنيات الويب الحديثة. أحب إنشاء حلول تقنية مبتكرة وتطبيقات ويب متطورة.',
            'summary_en' => 'Professional web developer with expertise in Laravel, React, Vue.js and modern web technologies. I love creating innovative technical solutions and advanced web applications.',
            'about_me_ar' => 'مرحباً، أنا مطور ويب محترف أعمل في مجال تطوير الويب منذ أكثر من 5 سنوات. أتخصص في تطوير تطبيقات الويب باستخدام Laravel و React و Vue.js. أحب التحديات التقنية وأسعى دائماً لتعلم التقنيات الجديدة وتطبيق أفضل الممارسات في البرمجة.',
            'about_me_en' => 'Hello, I am a professional web developer working in web development for more than 5 years. I specialize in developing web applications using Laravel, React, and Vue.js. I love technical challenges and always strive to learn new technologies and apply best practices in programming.',
            'phone' => '+20123456789',
            'email' => 'ahmed@example.com',
            'address' => 'القاهرة، مصر',
            'site_name' => 'Ahmed Portfolio',
            'site_description' => 'Portfolio احترافي لمطور ويب متخصص في Laravel و React',
            'site_keywords' => 'web developer, laravel, react, vue.js, php, javascript, portfolio',
            'copyright' => '© ' . date('Y') . ' Ahmed Mohamed. All rights reserved.',
            'facebook' => 'https://facebook.com/ahmed',
            'twitter' => 'https://twitter.com/ahmed',
            'instagram' => 'https://instagram.com/ahmed',
            'linkedin' => 'https://linkedin.com/in/ahmed',
            'github' => 'https://github.com/ahmed',
            'whatsapp' => 'https://wa.me/20123456789',
        ]);
    }
}
