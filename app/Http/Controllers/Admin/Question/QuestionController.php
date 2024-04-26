<?php

namespace App\Http\Controllers\Admin\Question;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Quiz $quiz)
    {
        $questions = $quiz->questions()->latest()->get();

        return view('admin.questions.index', compact('quiz', 'questions'));
    }

    public function create(Quiz $quiz)
    {
        return view('admin.questions.create', compact('quiz'));
    }

    public function store(Request $request, Quiz $quiz)
    {
        $request->validate([
            'question' => 'required',
            'answer1' => 'required',
            'answer2' => 'required',
            'answer3' => 'required',
            'answer4' => 'required',
            'solution' => 'required|numeric|between:1,4',
        ]);

        $quiz->questions()->create($request->all());

        return redirect()->route('admin.quizzes.questions.index', $quiz->id)
            ->with('success', 'Question created successfully.');
    }

    public function show(Quiz $quiz, Question $question)
    {
        return view('admin.questions.show', compact('quiz', 'question'));
    }

    public function edit(Quiz $quiz, Question $question)
    {
        return view('admin.questions.edit', compact('quiz', 'question'));
    }

    public function update(Request $request, Quiz $quiz, Question $question)
    {
        $request->validate([
            'question' => 'required',
            'answer1' => 'required',
            'answer2' => 'required',
            'answer3' => 'required',
            'answer4' => 'required',
            'solution' => 'required|numeric|between:1,4',
        ]);

        $question->update($request->all());

        return redirect()->route('admin.quizzes.questions.index', $quiz->id)
            ->with('success', 'Question updated successfully.');
    }

    public function destroy(Quiz $quiz, Question $question)
    {
        $question->delete();

        return redirect()->route('admin.quizzes.questions.index', $quiz->id)
            ->with('success', 'Question deleted successfully.');
    }
}
