<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Volunteer extends Authenticatable
{

    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'family_name',
        'nid_number',
        'status',
        'password',
        'address',
        'telephone',
        'fax',
        'nationality',
        'dob',
        'gender',
        'partner_name',
        'partner_details',
        'disabled_person',
        'disabled_details',
        'contact_person_first_name',
        'contact_person_family_name',
        'contact_person_address',
        'contact_person_email',
        'contact_person_telephone',
        'contact_person_fax',
        'minor_traffice',
        'minor_traffice_details',
        'about_ardrid',
        'extra_details',
        'desired_arrival_date',
        'desired_departure_date',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function volunteerTerm()
    {
        return $this->hasMany(VolunteerTerm::class, 'volunteer_id', 'id');
    }
}
