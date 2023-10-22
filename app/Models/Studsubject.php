<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studsubject extends Model
{
    use HasFactory;
    protected $table='studsubject';
    protected $hidden=['pivot'];
    protected $fillable = [
        'subject_id',
        'student_id',
    ];

}
