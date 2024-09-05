<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerTerm extends Model
{
    use HasFactory;

    protected $fillable = [
        'volunteer_id',
        'activity_volunteer',
        'higher_education',
        'relevant_training',
        'first_ref_name',
        'first_ref_position',
        'first_ref_organization',
        'first_ref_email',
        'first_ref_telephone',
        'second_ref_name',
        'second_ref_position',
        'second_ref_organization',
        'second_ref_email',
        'second_ref_telephone',
        'reference',
        'elaborate',
        'position',
        'extra_details',
        'experience_year',
        'employer_name',
        'job_title',
        'employer_address',
        'job_info',
        'reason_for_leaving',
        'professional_capacity',
        'professional_capacity_details',
        'institute_name',
        'institute_address',
        'certificates',
        'attended_from',
        'attended_to',
        'registered_country',
        'country',
        'qualification',
        'professional_body',
        'type_of_registration',
        'curriculam_activities',
        'volunteering_at_ardrid',
        'status',
    ];

    public function volunteer(){
        return $this->belongsTo(Volunteer::class);
    }
}
