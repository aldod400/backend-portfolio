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
                'title_ar' => 'نارمر - منصة التجارة الإلكترونية مع نظام إدارة التوصيل',
                'title_en' => 'Narmer - E-commerce Platform with Delivery Management System',
                'description_ar' => 'منصة تجارة إلكترونية شاملة ومتطورة مبنية بـ Laravel 12.x وFilament 3.x تتضمن نظام إدارة التوصيل المتكامل. تشمل المنصة نظام نقاط البيع (POS)، إدارة المخزون، نظام دفع متقدم مع تكامل Paymob، دعم متعدد اللغات (عربي/إنجليزي) مع تخطيط RTL، واجهة إدارية حديثة بـ Filament، تكامل خرائط Google للمسافات ورسوم التوصيل، نظام إشعارات Firebase، APIs شاملة للتطبيقات المحمولة، نظام كوبونات مرن، وإدارة شاملة للمستخدمين والطلبات والمنتجات.',
                'description_en' => 'Comprehensive e-commerce platform built with Laravel 12.x and Filament 3.x featuring integrated delivery management system. Includes Point of Sale (POS) system, inventory management, advanced payment system with Paymob integration, multi-language support (Arabic/English) with RTL layout, modern Filament admin interface, Google Maps integration for distance and delivery fees, Firebase push notifications, comprehensive APIs for mobile applications, flexible coupon system, and complete management for users, orders, and products.',
                'website_link' => null,
                'github_link' => 'https://github.com/aldod400/narmer',
                'skills' => [1, 2, 8, 9, 10, 15, 16, 19, 22, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 41, 42, 44, 45, 46, 47] // Laravel, PHP, Filament, Livewire, Bootstrap, Tailwind CSS, jQuery, MySQL, GitHub, Vite, Composer, NPM, Webpack, REST APIs, JSON, AJAX, E-commerce Development, Payment Integration, Multi-language Support, Content Management, Social Media Integration, Analytics Dashboard, User Authentication, Role-based Access Control, Session Management, Data Security
            ],
            [
                'title_ar' => 'منصة جدولة المحتوى للوسائل الاجتماعية',
                'title_en' => 'Content Scheduler - Social Media Platform',
                'description_ar' => 'منصة متقدمة لجدولة ونشر المحتوى على منصات التواصل الاجتماعي مبنية بـ Laravel. تتضمن تحليلات مفصلة، حدود يومية للنشر، دعم منصات متعددة، ونظام إدارة محتوى متطور مع واجهة سهلة الاستخدام.',
                'description_en' => 'Advanced social media content scheduling and publishing platform built with Laravel. Features detailed analytics, daily publishing limits, multi-platform support, and sophisticated content management system with user-friendly interface.',
                'website_link' => null,
                'github_link' => 'https://github.com/aldod400/Content-Scheduler',
                'skills' => [1, 2, 15, 19, 25, 28, 41, 42, 43] // Laravel, PHP, Bootstrap, MySQL, Composer, REST APIs, Social Media Integration, Analytics Dashboard, Scheduled Publishing
            ],
            [
                'title_ar' => '4P - نظام إدارة تعليمي',
                'title_en' => '4P - Educational Management System',
                'description_ar' => 'نظام إدارة تعليمي شامل مبني بـ Laravel يوفر واجهات منفصلة للمديرين ومقدمي الخدمة التعليمية. يتضمن إدارة الفصول الدراسية، نظام اشتراكات، إدارة ملفات شخصية، ونظام مدفوعات متقدم مع دعم متعدد اللغات.',
                'description_en' => 'Comprehensive educational management system built with Laravel providing separate interfaces for administrators and educational service providers. Features classroom management, subscription system, profile management, and advanced payment system with multi-language support.',
                'website_link' => 'https://4papp.com',
                'github_link' => 'https://github.com/aldod400/4P',
                'skills' => [1, 2, 15, 19, 25, 28, 32, 33, 34, 44, 45, 46] // Laravel, PHP, Bootstrap, MySQL, Composer, REST APIs, Payment Integration, Multi-language Support, Content Management, User Authentication, Role-based Access Control, Session Management
            ],
            [
                'title_ar' => 'نظام دفع الأقساط المتميزة',
                'title_en' => 'Pay Your Premium - Desktop Payment System',
                'description_ar' => 'تطبيق سطح مكتب مبني بـ C# لإدارة مدفوعات الأقساط التأمينية. يتضمن إدارة الأجهزة، قاعدة بيانات SQL Server، نظام مصادقة متقدم، وواجهة مستخدم بديهية لمعالجة المدفوعات وتتبع المعاملات.',
                'description_en' => 'Desktop application built with C# for managing insurance premium payments. Features device management, SQL Server database, advanced authentication system, and intuitive user interface for payment processing and transaction tracking.',
                'website_link' => null,
                'github_link' => 'https://github.com/aldod400/pay-your-premium',
                'skills' => [3, 20, 25, 36, 44, 45, 47] // C#, SQL Server, Composer, Desktop Applications, User Authentication, Role-based Access Control, Data Security
            ],
            [
                'title_ar' => 'مدونة Flask النظيفة',
                'title_en' => 'Flask Clean Blog',
                'description_ar' => 'مدونة ويب نظيفة وبسيطة مبنية بـ Python Flask. تتضمن نظام مصادقة مستخدمين، عمليات CRUD كاملة للمقالات، رفع الملفات، تصميم متجاوب، وواجهة إدارة سهلة الاستخدام.',
                'description_en' => 'Clean and simple web blog built with Python Flask. Features user authentication system, full CRUD operations for articles, file uploads, responsive design, and user-friendly admin interface.',
                'website_link' => null,
                'github_link' => 'https://github.com/aldod400/Flask-Clean-Blog',
                'skills' => [4, 11, 5, 6, 7, 21, 25, 44, 34] // Python, Flask, JavaScript, HTML5, CSS3, SQLite, Composer, User Authentication, Content Management
            ],
            [
                'title_ar' => 'لغة البرمجة PhantomScript',
                'title_en' => 'PhantomScript Programming Language',
                'description_ar' => 'لغة برمجة مخصصة مبنية بـ PHP تتضمن محلل لكسي متقدم، محلل نحوي، ومفسر كامل. تدعم المتغيرات، العمليات الحسابية، الحلقات، الشروط، القوائم، والسلاسل النصية مع معالجة أخطاء شاملة.',
                'description_en' => 'Custom programming language built with PHP featuring advanced lexical analyzer, parser, and complete interpreter. Supports variables, arithmetic operations, loops, conditionals, lists, and strings with comprehensive error handling.',
                'website_link' => null,
                'github_link' => 'https://github.com/aldod400/PhantomScript-Language',
                'skills' => [2, 5, 6, 7, 25, 37, 38, 39, 40] // PHP, JavaScript, HTML5, CSS3, Composer, Lexical Analysis, Parser Design, Interpreter Development, Programming Language Design
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
