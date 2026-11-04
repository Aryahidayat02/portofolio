<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;

class HomeController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $skills = Skill::all()->groupBy('category');
        $featuredProjects = Project::where('is_featured', true)->latest()->take(3)->get();

        return view('home', compact('profile', 'skills', 'featuredProjects'));
    }
}