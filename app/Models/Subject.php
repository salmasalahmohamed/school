<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
        'type',
        'is_deleted',
    ];
     static public function list(){
         return $subject=Subject::with('class')->get();
     }
     //accessors
     public function getStatusAttribute($val){
         return $val==1?'active':'not active';

     }
     //
    public function setNameAttribute($val){
        return $this->attributes['name']=strtoupper($val);
    }
    public function  class(){
        return $this->belongsToMany(Classe::class,classSubject::class,'subject_id','class_id','id','id');
    }
//    public function classe(){
//         return $this->belongsToMany(Classe::class,'classsubjects','subject_id','class_id');
//    }

}
