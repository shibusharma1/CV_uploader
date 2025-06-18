<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonalDetail extends Model
{
     use HasFactory;

    protected $fillable = [
        'father_name', 'permanent_address', 'temporary_address', 'marital_status',
        'religion', 'nationality', 'gender', 'languages_known', 'hobbies', 'career_objective',
        'education', 'skills', 'work_experience', 'certifications', 'projects',
        'references', 'image', 'cv_file', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
