<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberShow extends Model
{
    use HasFactory;

    protected $table = "member_show";

    public function usershow()
    {
        return $this->belongsTo(User::class, 'member_id', 'id');
    }
}
