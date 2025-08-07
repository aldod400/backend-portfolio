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
                'title_ar' => '4P App - تطوير الباك إند',
                'title_en' => '4P App (Backend Development)',
                'description_ar' => 'تطوير النظام الخلفي باستخدام Laravel و PHP لمنصات الهاتف المحمول والويب. تم تنفيذ هيكل قاعدة بيانات MySQL وتحسين الاستعلامات لتحسين الأداء. إنشاء APIs متكاملة للتعامل مع: مصادقة وتخويل المستخدمين، تكامل مزودي الخدمة (المستشفيات، الصالات الرياضية، المؤسسات التعليمية)، إدارة العروض والخصومات، ونظام الأخبار والتحديثات. تم تنفيذ آليات أمان شاملة لحماية البيانات. النظام الخلفي يدعم تطبيقات iOS و Android المتاحة على App Store و Google Play.',
                'description_en' => 'Developed the backend system using Laravel and PHP for both mobile and web platforms. Implemented MySQL database architecture and optimized queries for better performance. Created comprehensive RESTful APIs to handle: User authentication and authorization, Service provider integrations (hospitals, gyms, educational institutions), Deal and discount management, News and updates system. Implemented secure data handling and protection mechanisms. The backend supports both iOS and Android mobile apps, available on App Store and Google Play.',
                'website_link' => 'https://4papp.com/',
                'google_play_link' => 'https://play.google.com/store/apps/details?id=com.marketopia.fourP',
                'app_store_link' => 'https://apps.apple.com/eg/app/4p/id6743159334',
                'github_link' => null,
                'experience_id' => 1,
                'skills' => [1, 9, 17, 26, 28, 30] // PHP, Laravel, MySQL, RESTful API, Git, Composer
            ],
            [
                'title_ar' => 'التجارة الإلكترونية',
                'title_en' => 'Ecommerce',
                'description_ar' => 'تطوير منصة تجارة إلكترونية شاملة مع نظام إدارة التوصيل المتكامل باستخدام إطار عمل Laravel ولوحة إدارة Filament. تنفيذ REST API كامل مع مصادقة JWT للتطبيقات المحمولة والويب، مع دعم وظائف متعددة اللغات (العربية/الإنجليزية). بناء لوحة تحكم إدارية حديثة مع التحليلات، إدارة المنتجات، معالجة الطلبات، إدارة المستخدمين، ونظام نقاط البيع المدمج. دمج Google Maps API لحساب رسوم التوصيل، Firebase للإشعارات الفورية، وبوابة دفع Paymob. تطبيق نمط Repository، طبقة الخدمة، ونمط الاستراتيجية للحصول على هيكل نظيف وفصل منطق الأعمال. تصميم ميزات شاملة تشمل سلة التسوق، قائمة الأمنيات، نظام الكوبونات، إدارة العناوين المتعددة، وتتبع الطلبات في الوقت الفعلي.',
                'description_en' => 'Developed a comprehensive e-commerce platform with integrated delivery management system using Laravel framework and Filament admin panel. Implemented complete RESTful API with JWT authentication for mobile and web applications, supporting multi-language functionality (Arabic/English). Built modern admin dashboard with analytics, product management, order processing, user management, and built-in POS system. Integrated Google Maps API for delivery fee calculation, Firebase for push notifications, and Paymob payment gateway. Applied Repository Pattern, Service Layer, and Strategy Pattern for clean architecture and business logic separation. Designed comprehensive features including shopping cart, wishlist, coupon system, multi-address management, and real-time order tracking.',
                'website_link' => 'https://narmertex.com/',
                'google_play_link' => null,
                'app_store_link' => null,
                'github_link' => 'https://github.com/aldod400/Ecommerce-With-Delivery',
                'experience_id' => null,
                'skills' => [1, 9, 15, 17, 26, 28, 29, 30, 34, 35, 36, 37, 38, 39] // PHP, Laravel, Filament, MySQL, RESTful API, Git, GitHub, Composer, JWT Authentication, Firebase, Google Maps API, Paymob, Repository Pattern, Service Layer
            ],
            [
                'title_ar' => 'نظام إدارة علاقات العملاء (CRM)',
                'title_en' => 'CRM System',
                'description_ar' => 'بناء نظام شامل لإدارة علاقات العملاء باستخدام إطار عمل Laravel ولوحة إدارة Filament. تنفيذ إدارة العملاء الكاملة مع تتبع الحالة، إدارة المستندات، وتاريخ الاتصالات. تطوير إدارة دورة حياة المشروع مع تعيين الفريق، والتحكم في الوصول القائم على الأدوار باستخدام Spatie Permissions. إنشاء نظام إدارة المهام مع مستويات الأولوية، والمواعيد النهائية، وتكامل التقويم باستخدام Filament FullCalendar. بناء نظام إنتاج الفواتير وتتبع المدفوعات مع قدرات التقارير المالية. دمج الإشعارات الفورية، وتسجيل الأنشطة باستخدام Spatie Activity Log، ودعم متعدد اللغات (الإنجليزية/العربية).',
                'description_en' => 'Built a comprehensive Customer Relationship Management system using Laravel framework and Filament admin panel. Implemented complete client management with status tracking, document management, and communication history. Developed project lifecycle management with team assignment, role-based access control using Spatie Permissions. Created task management system with priority levels, deadlines, and calendar integration using Filament FullCalendar. Built invoice generation and payment tracking system with financial reporting capabilities. Integrated real-time notifications, activity logging with Spatie Activity Log, and multi-language support (English/Arabic).',
                'website_link' => null,
                'google_play_link' => null,
                'app_store_link' => null,
                'github_link' => 'https://github.com/aldod400/CRM',
                'experience_id' => null,
                'skills' => [1, 9, 15, 17, 26, 28, 29, 30, 40, 41, 42] // PHP, Laravel, Filament, MySQL, RESTful API, Git, GitHub, Composer, Spatie Permissions, Filament FullCalendar, Spatie Activity Log
            ],
            [
                'title_ar' => 'منصة جدولة المحتوى',
                'title_en' => 'Content Scheduler',
                'description_ar' => 'تطوير منصة جدولة المحتوى باستخدام إطار عمل Laravel مع Blade UI ومصادقة Laravel Sanctum. تنفيذ نظام إدارة المنشورات الشامل مع الجدولة، ودعم المنصات المتعددة، وميزات عد الأحرف. بناء لوحة تحكم التحليلات مع إحصائيات المنشورات، ومقاييس أداء المنصة، وعرض التقويم للمحتوى المجدول. تطبيق مبادئ الهيكل النظيف باستخدام نمط Repository، وطبقة الخدمة، ومبادئ SOLID. دمج تحديد المعدل (10 منشورات/يوم)، وتسجيل الأنشطة، و RESTful API مع التحقق المناسب باستخدام Form Requests. إنشاء نظام إدارة المستخدمين مع ضوابط الوصول للمنصة وتتبع التقدم في الوقت الفعلي.',
                'description_en' => 'Developed a content scheduling platform using Laravel framework with Blade UI and Laravel Sanctum authentication. Implemented comprehensive post management system with scheduling, multi-platform support, and character counting features. Built analytics dashboard with post statistics, platform performance metrics, and calendar view for scheduled content. Applied clean architecture principles using Repository Pattern, Service Layer, and SOLID principles. Integrated rate limiting (10 posts/day), activity logging, and RESTful API with proper validation using Form Requests. Created user management system with platform access controls and real-time progress tracking.',
                'website_link' => null,
                'google_play_link' => null,
                'app_store_link' => null,
                'github_link' => 'https://github.com/aldod400/Content-Scheduler',
                'experience_id' => null,
                'skills' => [1, 9, 17, 26, 28, 29, 30, 38, 39, 43, 44, 45, 46] // PHP, Laravel, MySQL, RESTful API, Git, GitHub, Composer, Repository Pattern, Service Layer, Laravel Sanctum, Blade UI, SOLID Principles, Form Requests
            ],
            [
                'title_ar' => 'لغة البرمجة PhantomScript',
                'title_en' => 'PhantomScript-Language',
                'description_ar' => 'تطوير لغة برمجة مخصصة باستخدام PHP الأصلي ومبادئ البرمجة الكائنية. تنفيذ ميزات اللغة الأساسية بما في ذلك المتغيرات والوظائف وهياكل التحكم. إنشاء محلل لكسي ومحلل نحوي لمعالجة وتنفيذ كود PhantomScript.',
                'description_en' => 'Developed a custom programming language using Native PHP and OOP principles. Implemented core language features including variables, functions, and control structures. Created a lexer and parser to process and execute PhantomScript code.',
                'website_link' => null,
                'google_play_link' => null,
                'app_store_link' => null,
                'github_link' => 'http://bit.ly/4cmWlWa',
                'experience_id' => null,
                'skills' => [1, 21, 28, 29, 30] // PHP, OOP, Git, GitHub, Composer
            ],
            [
                'title_ar' => 'TeamsMaker - مشروع التخرج',
                'title_en' => 'TeamsMaker (Graduation Project)',
                'description_ar' => 'تطوير نظام إدارة الفرق باستخدام .NET API ونهج Code First. تنفيذ تصميم ERD لهيكل قاعدة بيانات فعال. إنشاء واجهة أمامية متجاوبة باستخدام JavaScript و CSS و HTML و Bootstrap. استخدام LINQ للاستعلام عن البيانات ومعالجتها بكفاءة.',
                'description_en' => 'Developed a team management system using .NET API and Code First approach. Implemented ERD Design for efficient database structure. Created responsive frontend using JavaScript, CSS, HTML, and Bootstrap. Utilized LINQ for efficient data querying and manipulation.',
                'website_link' => null,
                'google_play_link' => null,
                'app_store_link' => null,
                'github_link' => 'http://bit.ly/3L0Vq1g',
                'experience_id' => null,
                'skills' => [4, 8, 6, 7, 10, 14, 20, 28, 29, 47, 48, 49] // C#, JavaScript, HTML, CSS, .NET, Bootstrap, SQL Server, Git, GitHub, Code First, ERD Design, LINQ
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
