<?php

namespace Database\Seeders;

use App\Models\ContactMessage;
use Illuminate\Database\Seeder;

class ContactMessageSeeder extends Seeder
{
    public function run(): void
    {
        $messages = [
            [
                'name' => 'أحمد محمد',
                'email' => 'ahmed@example.com',
                'subject' => 'استفسار حول مشروع تطوير موقع إلكتروني',
                'message' => 'السلام عليكم، أرغب في الحصول على عرض سعر لتطوير موقع إلكتروني لشركتي. الموقع سيكون للتجارة الإلكترونية ونحتاج إلى نظام إدارة محتوى قوي.',
                'is_read' => false,
                'created_at' => now()->subDays(1),
            ],
            [
                'name' => 'فاطمة علي',
                'email' => 'fatima@example.com',
                'subject' => 'التعاون في مشروع تطبيق جوال',
                'message' => 'مرحباً، شاهدت أعمالك وأعجبت بها كثيراً. لدي فكرة لتطبيق جوال مبتكر وأود مناقشة إمكانية التعاون معك في تطويره.',
                'is_read' => true,
                'read_at' => now()->subHours(2),
                'created_at' => now()->subDays(2),
            ],
            [
                'name' => 'محمد خالد',
                'email' => 'mohammed@example.com',
                'subject' => 'طلب استشارة تقنية',
                'message' => 'أحتاج إلى استشارة تقنية حول أفضل التقنيات لتطوير نظام إدارة المخزون. ما هي التقنيات التي تنصح بها؟',
                'is_read' => false,
                'created_at' => now()->subHours(5),
            ],
            [
                'name' => 'سارة أحمد',
                'email' => 'sara@example.com',
                'subject' => 'عرض عمل',
                'message' => 'مرحباً، نحن في شركة تقنية ناشئة ونبحث عن مطور مواقع ماهر للانضمام إلى فريقنا. هل تهتم بمعرفة المزيد عن الفرصة؟',
                'is_read' => true,
                'read_at' => now()->subDays(1),
                'created_at' => now()->subDays(3),
            ],
            [
                'name' => 'عبدالله حسن',
                'email' => 'abdullah@example.com',
                'subject' => 'تحديث موقع موجود',
                'message' => 'لدي موقع إلكتروني قديم ويحتاج إلى تحديث شامل وتحسين في الأداء والتصميم. هل يمكنك مساعدتي في ذلك؟',
                'is_read' => false,
                'created_at' => now()->subMinutes(30),
            ],
        ];

        foreach ($messages as $message) {
            ContactMessage::create($message);
        }
    }
}
