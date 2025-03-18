<?php
namespace App\Http\Controllers;t

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    <?php

namespace App\Http\Controllers;
use App\Models\Course;

class CourseController extends Controller
{
    public function index() {
        $courses = Course::all();
        return view("course.index", compact("courses"));
    }
}
};
