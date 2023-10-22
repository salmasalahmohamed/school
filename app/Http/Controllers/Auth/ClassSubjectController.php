<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\classSubject;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClassSubjectController extends Controller
{
    public function index(){
        $class=Classe::list();
        $subject=Subject::list();
        return view('ADMIN.addclasssub',compact(['class','subject']));
    }
    public function insert(Request$request){
        $validator=validator::make($request->all(),[
            'class_id'=>'required|max:255',
            'subject_id'=>'required' ,
        ]);

        if($validator->fails()){
            return $validator->errors();
        };
//        $classub= new classSubject();
//        $classub['class_id']=$request['class_id'];
//        $classub['subject_id']=$request['subject_id'];
//        $classub['status']=$request['status'];
//        $classub->save();
//        return redirect()->back();
        $sub=Subject::find($request['subject_id']);
        if(!$sub)
            return abort('404');
       // $sub->classe()->attach($request['class_id']);//duplicate
        $sub->classe()->sync($request['class_id']);//update and delete older
       // $sub->classe()->syncWithoutDetaching($request['class_id']);//update and with older

        return 'success';

    }
    public function list(){
        $sub=Subject::with('classe')->get();
        foreach ($sub as $subj=>$class)
            return $class['classe'][2]['name'];

    }
}
