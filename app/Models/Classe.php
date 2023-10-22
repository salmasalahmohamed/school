<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Classe extends Model
{
    use HasFactory;
    protected $table='classes';
    protected $fillable = [
        'name',
        'status',
        'created_by',
    ];
  static public function list(){
    $class=self::with('subject')->get();

    if(Request::get('name')){
        $class=$class->where('name','=',Request::get('name'));
    }
    return $class;
}
    public function  subject(){
      return $this->belongsToMany(subject::class,classSubject::class,'class_id','subject_id','id','id');
    }

}
