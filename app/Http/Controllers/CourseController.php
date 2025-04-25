<?php

namespace App\Http\Controllers;
use App\Models\Curso;

class CourseController extends Controller
{
    public function index() {
        $courses = Curso::all();
        return view("course.index", compact("courses"));
    }
}
