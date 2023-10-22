<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ClassesController extends Controller
{
    public function form(){
        return view('ADMIN.addclasses');

    }
        public function insert(Request $request){

            $validator=validator::make($request->all(),[
                'name'=>'required|max:255',
                'status'=>'required' ,
                'created_by'=>'required',
            ]);

            if($validator->fails()){
                return $validator->errors();
            };
            $class=new Classe();
            $class['name']=$request['name'];
            $class['status']=$request['status'];
            $class['created_by']=Auth::user()->name;
            $class->save();
            return redirect()->back()->with('success','classes added successfully');

        }
        public function list(){
              $class=Classe::list();
              return view('ADMIN.listclasses',compact('class'));
        }
        public function edit($id){
        $class=Classe::find($id);
        return view('ADMIN.classedit',compact('class'));

        }
        public function update(Request $request,$id){
            $class=Classe::find($id);
            $class->update($request->all());
            $class->save();
            return redirect()->back()->with('success','classes added successfully');


        }
        public function delete($id){
        Classe::destroy($id);
            return redirect()->back();
        }

}
