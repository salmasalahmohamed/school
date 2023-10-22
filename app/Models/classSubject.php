<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classSubject extends Model
{
    use HasFactory;
    protected $table='classsubjects';
    protected $fillable = [
        'class_id',
        'subject_id',
    ];
    protected $hidden=['pivot'];
}
