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
                'title_ar' => 'مطور ويب متكامل ومهندس برمجيات أول',
                'title_en' => 'Senior Full Stack Developer & Software Engineer',
                'company_name_ar' => 'مطور مستقل',
                'company_name_en' => 'Freelance Developer',
                'description_ar' => 'تطوير مشاريع برمجية متنوعة ومتقدمة تشمل منصات التجارة الإلكترونية، أنظمة إدارة المحتوى، تطبيقات سطح المكتب، ولغات البرمجة المخصصة. استخدام تقنيات متعددة مثل Laravel، PHP، Python، C#، وJavaScript لتقديم حلول شاملة ومبتكرة للعملاء.',
                'description_en' => 'Developing diverse and advanced software projects including e-commerce platforms, content management systems, desktop applications, and custom programming languages. Using multiple technologies such as Laravel, PHP, Python, C#, and JavaScript to deliver comprehensive and innovative solutions for clients.',
                'location' => 'القاهرة، مصر',
                'start_date' => '2022-01-01',
                'end_date' => null,
            ],
            [
                'title_ar' => 'مطور ويب متقدم',
                'title_en' => 'Advanced Web Developer',
                'company_name_ar' => 'شركة مارکتوبيا تيم',
                'company_name_en' => 'MarketopiaTeam',
                'description_ar' => 'تطوير منصات ويب متقدمة وأنظمة إدارة تعليمية باستخدام Laravel وFilament. تطوير نظام 4P للإدارة التعليمية وتنفيذ مشاريع تجارة إلكترونية متطورة مع دعم متعدد اللغات وأنظمة دفع متقدمة.',
                'description_en' => 'Developing advanced web platforms and educational management systems using Laravel and Filament. Creating the 4P educational management system and implementing sophisticated e-commerce projects with multi-language support and advanced payment systems.',
                'location' => 'القاهرة، مصر',
                'start_date' => '2021-01-01',
                'end_date' => '2021-12-31',
            ],
            [
                'title_ar' => 'مطور ويب متوسط',
                'title_en' => 'Mid-Level Web Developer',
                'company_name_ar' => 'شركة التقنيات المتقدمة',
                'company_name_en' => 'Advanced Technologies Company',
                'description_ar' => 'تطوير تطبيقات ويب تفاعلية باستخدام Laravel وPHP. العمل على مشاريع منصات التواصل الاجتماعي وأنظمة جدولة المحتوى. تطوير مهارات في Python Flask وبناء تطبيقات مدونات ويب.',
                'description_en' => 'Developing interactive web applications using Laravel and PHP. Working on social media platform projects and content scheduling systems. Developing skills in Python Flask and building web blog applications.',
                'location' => 'الجيزة، مصر',
                'start_date' => '2020-01-01',
                'end_date' => '2020-12-31',
            ],
            [
                'title_ar' => 'مطور برمجيات مبتدئ',
                'title_en' => 'Junior Software Developer',
                'company_name_ar' => 'شركة الحلول البرمجية',
                'company_name_en' => 'Software Solutions Company',
                'description_ar' => 'البداية في مجال تطوير البرمجيات باستخدام PHP وMySQL. تعلم أساسيات Laravel وتطوير تطبيقات سطح المكتب بـ C#. العمل على مشاريع صغيرة وتطوير لغة برمجة PhantomScript.',
                'description_en' => 'Starting in software development using PHP and MySQL. Learning Laravel fundamentals and developing desktop applications with C#. Working on small projects and developing the PhantomScript programming language.',
                'location' => 'القاهرة، مصر',
                'start_date' => '2019-01-01',
                'end_date' => '2019-12-31',
            ],
        ];

        foreach ($experiences as $experience) {
            Experience::create($experience);
        }
    }
}
