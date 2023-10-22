<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\adminrequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdmindashbordController extends Controller
{
    public function index(){
        return view('ADMIN.dashboard');
    }
    public function admin(){
        $data['header_title']='admin add';
        return view('ADMIN.admin',$data);
    }
    public function insert(Request $request){
        $validator=validator::make($request->all(),[
            'name'=>'required|max:255',
            'email'=>'required' ,
            'password'=>'required',
        ]);

        if($validator->fails()){
            return $validator->errors();
        };

          $user=new User();
          $user['name']=$request['name'];
          $user['email']=$request['email'];
          $user['password']=Hash::make($request['password']);
         $user->save();
         return redirect()->back()->with('success','admin added successfully');

    }
    public function show(){
          $admin=User::all();
          if(!empty(\Illuminate\Support\Facades\Request::get('email'))){
              $admin=$admin->where('email','=',\Illuminate\Support\Facades\Request::get('email'));
          }
       // $admin = DB::table('users')->simplePaginate(15);
          return view('ADMIN.showadmin',compact('admin'));

    }
    public function delete($id){
//        $admin=User::find($id);
//        $admin->delete();
        User::destroy($id);
        return redirect()->back();

    }
}
