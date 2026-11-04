<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Contact;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects' => Project::count(),
            'skills' => Skill::count(),
            'contacts' => Contact::count(),
            'unread_contacts' => Contact::where('is_read', false)->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}