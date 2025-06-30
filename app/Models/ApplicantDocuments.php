4<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicantDocuments extends Model
{
    protected $fillable = [
        'see_gradesheet', 'community_school_document', 'citizenship_birth_certificate',
        'disability_id_card', 'dalit_janjati_recommendation', 'bipanna_recommendation',
        'physical_disability_certificate', 'movement_related_certificate', 'passport_size_photo',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
