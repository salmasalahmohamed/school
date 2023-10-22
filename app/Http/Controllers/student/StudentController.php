<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Student;

class StudentController extends Controller
{
public function index(){
    $user=Student::with('classe')->get();
    return  $user;
    return view('student.index');
} }
