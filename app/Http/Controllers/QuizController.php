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
        $quizzes = Quiz::all();

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
        $answers = $request->except('_token');
        $correctCount = 0;
        $questions = $quiz->questions; // Retrieve questions for the quiz

        foreach ($answers as $questionId => $answer) {
            $question = Question::findOrFail($questionId);

            if ($question->solution == $answer) {
                $correctCount++;
            }
        }

        $score = round(($correctCount / $quiz->questions->count()) * 100, 2);

        return view('quizzes.result', compact('quiz', 'score', 'questions', 'answers'));
    }
}
