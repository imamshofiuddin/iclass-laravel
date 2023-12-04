<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassParticipant extends Model
{
    use HasFactory;

    protected $table = 'class_participant';
    protected $fillable = [
        'classroom_id',
        'student',
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
