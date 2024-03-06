<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        // dd(student::get());
        return view('students.index', [
            "Students" => Student::get(),
        ]);
    }
}
