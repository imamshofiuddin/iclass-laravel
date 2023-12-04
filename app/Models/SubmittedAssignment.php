<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmittedAssignment extends Model
{
    use HasFactory;

    protected $table = 'submitted_assignment';
    protected $fillable = [
        'assignment_id',
        'notes',
        'attachment',
        'student',
    ];

    public function student()
    {
        return $this->belongsTo(User::class);
    }
}
