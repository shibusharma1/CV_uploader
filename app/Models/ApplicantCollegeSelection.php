<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicantCollegeSelection extends Model
{
    protected $fillable = [
        'user_id',
        'priority',
        'college_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function college()
    {
        return $this->belongsTo(CollegeList::class, 'college_id');
    }
}
