<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{

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
        $config = Config::first();
        $experiences = Experience::orderBy('start_date', 'desc')->get();
        $projects = Project::with(['skills', 'images', 'experience'])->get();
        $skills = Skill::with('projects')->get();

        return view('portfolio.index', compact('config', 'experiences', 'projects', 'skills'));
    }

    public function projects()
    {
        $config = Config::first();
        $projects = Project::with(['skills', 'images', 'experience'])->get();

        return view('portfolio.projects', compact('config', 'projects'));
    }

    public function project($id)
    {
        $config = Config::first();
        $project = Project::with(['skills', 'images', 'experience'])->findOrFail($id);

        return view('portfolio.project-detail', compact('config', 'project'));
    }

    public function experiences()
    {
        $config = Config::first();
        $experiences = Experience::orderBy('start_date', 'desc')->get();

        return view('portfolio.experiences', compact('config', 'experiences'));
    }

    public function skills()
    {
        $config = Config::first();
        $skills = Skill::with('projects')->get();

        return view('portfolio.skills', compact('config', 'skills'));
    }

    public function about()
    {
        $config = Config::first();

        return view('portfolio.about', compact('config'));
    }

    public function contact()
    {
        $config = Config::first();

        return view('portfolio.contact', compact('config'));
    }
}
