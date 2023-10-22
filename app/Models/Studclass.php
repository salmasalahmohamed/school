<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studclass extends Model
{
    use HasFactory;
    protected $table='studclass';
    protected $fillable = [
        'classe_id',
        'student_id',
    ];
    protected $hidden=['pivot'];

}
