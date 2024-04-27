<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;

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

    public function show($id)
    {
        $user = Auth::user();
        $quiz = Quiz::findOrFail($id);

        $answers = $user->answers()
            ->where('quiz_id', $quiz->id) // Filter by quiz ID
            ->with('question') // Eager load the related question
            ->get();

        return view('user.answers-questions', compact('quiz', 'answers'));
    }
}
