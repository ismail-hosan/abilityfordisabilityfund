<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_method',
        'amount',
        'tx_id',
        'tx_image',
        'note',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'member_id', 'id');
    }
}
