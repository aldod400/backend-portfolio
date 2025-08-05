<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    private function getConfig()
    {
        $config = Config::first();

        // إذا لم توجد بيانات في configs، ننشئ default config
        if (!$config) {
            $config = new Config([
                'name_ar' => 'أحمد محمد',
                'name_en' => 'Ahmed Mohamed',
                'job_title_ar' => 'مطور ويب',
                'job_title_en' => 'Web Developer',
                'summary_ar' => 'مطور ويب محترف مع خبرة في تطوير التطبيقات الحديثة',
                'summary_en' => 'Professional web developer with experience in modern application development',
                'about_me_ar' => 'مرحباً، أنا مطور ويب محترف أحب إنشاء تطبيقات ويب مبتكرة وحلول تقنية متقدمة.',
                'about_me_en' => 'Hello, I am a professional web developer who loves creating innovative web applications and advanced technical solutions.',
                'email' => 'developer@example.com',
                'phone' => '+1234567890',
                'address' => 'مدينة، دولة',
                'site_name' => 'Portfolio',
                'site_description' => 'My Professional Portfolio',
                'copyright' => '© ' . date('Y') . ' All rights reserved.',
            ]);
        }

        return $config;
    }

    public function changeLanguage($locale)
    {
        if (in_array($locale, ['ar', 'en'])) {
            session()->put('locale', $locale);
            app()->setLocale($locale);
        }

        return redirect()->back();
    }

    public function index()
    {
        $config = $this->getConfig();
        $experiences = Experience::orderBy('start_date', 'desc')->get();
        $projects = Project::with(['skills', 'images', 'experience'])->get();
        $skills = Skill::with('projects')->get();

        return view('portfolio.index', compact('config', 'experiences', 'projects', 'skills'));
    }

    public function projects()
    {
        $config = $this->getConfig();
        $projects = Project::with(['skills', 'images', 'experience'])->get();

        return view('portfolio.projects', compact('config', 'projects'));
    }

    public function project($id)
    {
        $config = $this->getConfig();
        $project = Project::with(['skills', 'images', 'experience'])->findOrFail($id);

        return view('portfolio.project-detail', compact('config', 'project'));
    }

    public function experiences()
    {
        $config = $this->getConfig();
        $experiences = Experience::orderBy('start_date', 'desc')->get();

        return view('portfolio.experiences', compact('config', 'experiences'));
    }

    public function skills()
    {
        $config = $this->getConfig();
        $skills = Skill::with('projects')->get();

        return view('portfolio.skills', compact('config', 'skills'));
    }

    public function about()
    {
        $config = $this->getConfig();

        return view('portfolio.about', compact('config'));
    }

    public function contact()
    {
        $config = $this->getConfig();

        return view('portfolio.contact', compact('config'));
    }
}
