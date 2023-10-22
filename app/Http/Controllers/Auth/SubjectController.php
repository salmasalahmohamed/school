<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\classSubject;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    public function index(){
        return view('ADMIN.addsubject');
    }
    public function insert(Request $request){
//        dd($request);
        $validator=validator::make($request->all(),[
            'name'=>'required|max:255',
            'type'=>'required' ,
            'status'=>'required',
            'is_deleted'=>'required',
        ]);

        if($validator->fails()){
            return $validator->errors();
        };
        $subject=new Subject();
        $subject['name']=$request['name'];
        $subject['type']=$request['type'];
        $subject['status']=$request['status'];
        $subject['is_deleted']=$request['is_deleted'];
        $subject->save();
        return redirect()->back()->with('success','subjects added successfully');

    }
    public function list(){
 //$subject=Subject::list();
  return$subject=Subject::with('class')->get();


    }
}
