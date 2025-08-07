<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    public function run(): void
    {
        Config::create([
            'name_ar' => 'عبد الرحمن الغنيمي',
            'name_en' => 'Abdelrahman Elghonemy',
            'job_title_ar' => 'مطور باك إند',
            'job_title_en' => 'Backend Developer',
            'summary_ar' => 'مطور باك إند محترف مع أكثر من سنتين من الخبرة في بناء تطبيقات الويب المتينة وواجهات برمجة التطبيقات. أتخصص في إطار عمل Laravel ولدي معرفة واسعة بممارسات تطوير الباك إند الحديثة. نجحت في تسليم مشاريع متعددة متكاملة مع التركيز على الهيكلة القابلة للتوسع ومبادئ الكود النظيف.',
            'summary_en' => 'I am a highly skilled backend developer with over 2 years of experience in building robust web applications and APIs. I specialize in Laravel framework and have extensive knowledge of modern backend development practices. I have successfully delivered multiple full-stack projects with focus on scalable architecture and clean code principles.',
            'about_me_ar' => 'مرحباً، أنا عبد الرحمن الغنيمي، مطور باك إند محترف مع أكثر من سنتين من الخبرة في بناء تطبيقات الويب المتينة وواجهات برمجة التطبيقات. أتخصص في إطار عمل Laravel ولدي معرفة واسعة بممارسات تطوير الباك إند الحديثة. خريج كلية الحاسبات والمعلومات جامعة كفر الشيخ بتقدير جيد، وحاصل على عدة شهادات معتمدة في تطوير الويب وحل المشكلات البرمجية.',
            'about_me_en' => 'Hello, I am Abdelrahman Elghonemy, a professional backend developer with over 2 years of experience in building robust web applications and APIs. I specialize in Laravel framework and have extensive knowledge of modern backend development practices. Graduate of Faculty of Computers and Information, Kafrelsheikh University with Good grade, and holder of several certified credentials in web development and problem solving.',
            'phone' => '+201114773472',
            'email' => 'aldodelghonemy400@gmail.com',
            'address' => 'الإسكندرية، مصر',
            'site_name' => 'Abdelrahman Elghonemy Portfolio',
            'site_description' => 'Portfolio احترافي لمطور باك إند متخصص في Laravel، PHP، وبناء واجهات برمجة التطبيقات المتينة',
            'site_keywords' => 'backend developer, laravel, php, mysql, api development, web development, alexandria egypt, portfolio',
            'copyright_en' => '© ' . date('Y') . ' Abdelrahman Elghonemy. All rights reserved.',
            'copyright_ar' => '© ' . date('Y') . ' عبد الرحمن الغنيمي. جميع الحقوق محفوظة.',
            'facebook' => null,
            'twitter' => null,
            'instagram' => null,
            'linkedin' => 'https://www.linkedin.com/in/abdelrahman-elghonemy-074867242/',
            'github' => 'https://github.com/aldod400/',
            'whatsapp' => 'https://wa.me/201114773472',
            'cv' => 'cv/abdelrahman_elghonemy_cv.pdf', // You can upload your CV to storage/app/public/cv/
        ]);
    }
}
