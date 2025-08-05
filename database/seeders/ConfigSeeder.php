<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    public function run(): void
    {
        Config::create([
            'name_ar' => 'عبد الرحمن الغونيمي',
            'name_en' => 'Abdelrahman Elghonemy',
            'job_title_ar' => 'مطور ويب متكامل ومهندس برمجيات',
            'job_title_en' => 'Full Stack Developer & Software Engineer',
            'summary_ar' => 'مطور ويب متكامل ومهندس برمجيات محترف مع خبرة واسعة في تطوير التطبيقات الويب والبرمجيات باستخدام Laravel، PHP، Python، C#، و JavaScript. متخصص في إنشاء حلول تقنية متقدمة وأنظمة إدارة محتوى مبتكرة.',
            'summary_en' => 'Professional Full Stack Developer & Software Engineer with extensive experience in web application and software development using Laravel, PHP, Python, C#, and JavaScript. Specialized in creating advanced technical solutions and innovative content management systems.',
            'about_me_ar' => 'مرحباً، أنا عبد الرحمن الغونيمي، مطور ويب متكامل ومهندس برمجيات محترف. أعمل في مجال تطوير الويب والبرمجيات منذ سنوات، وأتخصص في تطوير تطبيقات الويب المتقدمة باستخدام Laravel وPHP، بالإضافة إلى تطوير البرمجيات بـ Python وC#. لدي خبرة في إنشاء أنظمة التجارة الإلكترونية، منصات إدارة المحتوى، والتطبيقات المتقدمة. أحب التحديات التقنية وأسعى دائماً لتعلم أحدث التقنيات وتطبيق أفضل الممارسات في البرمجة.',
            'about_me_en' => 'Hello, I am Abdelrahman Elghonemy, a professional Full Stack Developer & Software Engineer. I have been working in web and software development for years, specializing in advanced web application development using Laravel and PHP, as well as software development with Python and C#. I have experience in creating e-commerce systems, content management platforms, and advanced applications. I love technical challenges and always strive to learn the latest technologies and apply best practices in programming.',
            'phone' => '+201234567890',
            'email' => 'abdelrahman.elghonemy@example.com',
            'address' => 'القاهرة، مصر',
            'site_name' => 'Abdelrahman Elghonemy Portfolio',
            'site_description' => 'Portfolio احترافي لمطور ويب متكامل ومهندس برمجيات متخصص في Laravel، PHP، Python، و C#',
            'site_keywords' => 'full stack developer, software engineer, laravel, php, python, c#, javascript, web development, e-commerce, cms, portfolio',
            'copyright' => '© ' . date('Y') . ' Abdelrahman Elghonemy. All rights reserved.',
            'facebook' => 'https://facebook.com/abdelrahman.elghonemy',
            'twitter' => 'https://twitter.com/abdelrahman_elg',
            'instagram' => 'https://instagram.com/abdelrahman.elghonemy',
            'linkedin' => 'https://www.linkedin.com/in/abdelrahman-elghonemy-074867242/',
            'github' => 'https://github.com/aldod400/',
            'whatsapp' => 'https://wa.me/201234567890',
        ]);
    }
}
