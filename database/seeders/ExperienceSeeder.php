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
                'title_ar' => 'مطور باك إند',
                'title_en' => 'Backend Developer',
                'company_name_ar' => 'ماركيتوبيا',
                'company_name_en' => 'Marketopia',
                'description_ar' => 'تطوير أنظمة الباك إند المتينة باستخدام PHP وإطار عمل Laravel، وتنفيذ واجهات برمجة التطبيقات RESTful للتطبيقات المحمولة والويب. تصميم وتحسين قواعد بيانات MySQL لضمان تخزين واسترجاع البيانات بكفاءة. إنشاء وصيانة واجهات برمجة التطبيقات للتواصل السلس بين أنظمة الواجهة الأمامية والخلفية. تنفيذ أنظمة المصادقة والتخويل الآمنة لحماية بيانات المستخدمين. العمل بشكل وثيق مع مطوري الواجهة الأمامية والمصممين لضمان التكامل السلس والأداء الأمثل.',
                'description_en' => 'Building robust backend systems using PHP and Laravel framework, implementing RESTful APIs for mobile and web applications. Designing and optimizing MySQL databases, ensuring efficient data storage and retrieval. Creating and maintaining APIs for seamless communication between frontend and backend systems. Implementing secure authentication and authorization systems to protect user data. Working closely with frontend developers and designers to ensure smooth integration and optimal performance.',
                'location' => 'الإسكندرية، مصر',
                'start_date' => '2024-10-05',
                'end_date' => null,
            ],
        ];

        foreach ($experiences as $experience) {
            Experience::create($experience);
        }
    }
}
