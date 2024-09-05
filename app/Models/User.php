<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function memberCategory()
    {
        return $this->belongsTo(memberCategory::class, 'membercategory_id', 'id');
    }

    public function references()
    {
        return $this->hasMany(User::class, 'reference', 'id');
    }

    public function referenceby()
    {
        return $this->belongsTo(User::class, 'reference', 'id');
    }

    public function payments(){
        return $this->hasMany(Payment::class, 'member_id', 'id');
    }

    public function paymentsum($query)
    {
        return Payment::where('member_id', $query)->where('accept_status', 1)->sum('amount');
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
