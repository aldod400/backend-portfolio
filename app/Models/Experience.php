<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'title_ar',
        'title_en',
        'description_ar',
        'description_en',
        'location',
        'start_date',
        'end_date',
        'company_name_ar',
        'company_name_en',
        'company_logo'
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
