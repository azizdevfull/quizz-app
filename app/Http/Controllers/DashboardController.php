<?php

namespace App\Http\Controllers;


class DashboardController extends Controller
{
    public function index()
    {
        // Retrieve authenticated user's answers with related quiz and question information
        $user = auth()->user();

        $answersByQuiz = $user->answers()
            ->with('quiz', 'question')
            ->get()
            ->groupBy('quiz_id'); // Group answers by quiz_id
        return view('user.answers', compact('answersByQuiz', 'user'));
    }
}
