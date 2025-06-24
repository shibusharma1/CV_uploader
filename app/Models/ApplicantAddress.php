<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicantAddress extends Model
{
    protected $fillable = [
        'permanent_province', 'permanent_district', 'permanent_municipality', 'permanent_ward',
        'temporary_province', 'temporary_district', 'temporary_municipality', 'temporary_ward',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
