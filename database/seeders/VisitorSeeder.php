<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Visitor;
use Carbon\Carbon;

class VisitorSeeder extends Seeder
{
    public function run(): void
    {
        // Create sample visitor data for the last 7 days
        $pages = ['/', '/projects', '/about', '/contact', '/skills', '/experiences'];
        $countries = ['Egypt', 'USA', 'UK', 'Germany', 'France', 'Local', 'Unknown'];
        $userAgents = [
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36',
            'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36',
            'Mozilla/5.0 (iPhone; CPU iPhone OS 14_7_1 like Mac OS X)',
            'Mozilla/5.0 (Android 11; Mobile; rv:91.0) Gecko/91.0'
        ];

        for ($day = 6; $day >= 0; $day--) {
            $date = Carbon::now()->subDays($day);
            $visitsForDay = rand(5, 25);

            for ($i = 0; $i < $visitsForDay; $i++) {
                Visitor::create([
                    'ip_address' => rand(1, 255) . '.' . rand(1, 255) . '.' . rand(1, 255) . '.' . rand(1, 255),
                    'page_visited' => $pages[array_rand($pages)],
                    'user_agent' => $userAgents[array_rand($userAgents)],
                    'country' => $countries[array_rand($countries)],
                    'referer' => rand(0, 1) ? 'https://google.com' : null,
                    'created_at' => $date->addMinutes(rand(0, 1439)), // Random time within the day
                    'updated_at' => $date,
                ]);
            }
        }
    }
}
