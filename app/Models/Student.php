<?php

namespace App\Models;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    public function classe(){
        return $this->belongsToMany(Classe::class,'studclass','student_id','classe_id','id','id');
    }
    public function subject(){
        return $this->belongsToMany(Subject::class,Studsubject::class,'student_id','subject_id');
    }
}
