<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $table = 'assignment';
    protected $fillable = [
        'classroom_id',
        'title',
        'description',
        'attachment',
    ];
}
