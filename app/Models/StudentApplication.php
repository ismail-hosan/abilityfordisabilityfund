<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentApplication extends Model
{
    use HasFactory;

    public function studentDetails()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function trainingDetails()
    {
        return $this->belongsTo(Training::class, 'training', 'id');
    }
}
