<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $quizzes_counnt = Quiz::count();
        return view('admin.admin', compact('quizzes_counnt'));
    }
}
