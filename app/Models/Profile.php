<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name', 
        'title', 
        'bio', 
        'about_me', 
        'photo', 
        'email', 
        'phone',
        'whatsapp', // <-- Tambahan
        'location', 
        'github', 
        'linkedin', 
        'instagram', 
        'tiktok',   // <-- Tambahan
        'cv_file',
    ];
}