<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizzes = Quiz::latest()->get();

        return view('quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        return view('quizzes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        Quiz::create($request->all());

        return redirect()->route('quizzes.index')
            ->with('success', 'Quiz created successfully.');
    }

    public function show(Quiz $quiz)
    {
        return view('quizzes.show', compact('quiz'));
    }

    public function edit(Quiz $quiz)
    {
        return view('quizzes.edit', compact('quiz'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $quiz->update($request->all());

        return redirect()->route('quizzes.index')
            ->with('success', 'Quiz updated successfully.');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();

        return redirect()->route('quizzes.index')
            ->with('success', 'Quiz deleted successfully.');
    }

    public function solve(Quiz $quiz)
    {
        $questions = $quiz->questions;
        return view('quizzes.solve', compact('quiz', 'questions'));
    }

    public function submit(Request $request, Quiz $quiz)
    {
        $questions = $quiz->questions; // Retrieve questions associated with the quiz
        $totalScore = 0;
        $userAnswers = [];

        // Loop through each question
        foreach ($questions as $question) {
            $questionId = $question->id;
            $submittedAnswer = $request->input($questionId); // Get the user's selected answer for the question

            // Check if the submitted answer matches the correct solution
            if ($submittedAnswer == $question->solution) {
                $totalScore++; // Increment score for correct answer
            }

            // Store user's answer for each question
            $userAnswers[$questionId] = [
                'question' => $question->question,
                'submitted_answer' => $submittedAnswer,
                'correct_answer' => $question->solution,
            ];
        }
        $score = round(($totalScore / $quiz->questions->count()) * 100, 2);

        // Redirect to the result view with quiz data
        return $this->result($quiz, count($questions), $userAnswers, $score);
    }


    public function result(Quiz $quiz, $totalQuestions, $userAnswers, $score)
    {
        return view('quizzes.result', compact('quiz', 'totalQuestions', 'userAnswers', 'score'));
    }
}
