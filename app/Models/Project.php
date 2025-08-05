<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title_ar',
        'title_en',
        'description_ar',
        'description_en',
        'website_link',
        'google_play_link',
        'app_store_link',
        'github_link',
        'experience_id',
    ];

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }
}
