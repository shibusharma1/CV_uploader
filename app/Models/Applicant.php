<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
     protected $fillable = [
        'name_en',
        'name_ne',
        'image',
        'email',
        'phone',
        'password',
        'role',
        'is_active',
        'school_name',
        'scholarship_group',
        'dob_bs',
        'dob_ad',
        'gender',
        'father_name',
        'father_occupation',
        'mother_name',
        'mother_occupation',
        'grandfather_name',
        'grandfather_occupation',
        'family_income_source',
        'family_income_amount',
        'see_school_type',
        'desired_stream',
        'see_symbol_number',
        'see_gpa',
        'see_school_address',
    ];
       public function user()
    {
        return $this->belongsTo(User::class);
    }
}
