<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::latest()->get();
        return view('quizzes.index', compact('quizzes'));
    }
    public function solve(Quiz $quiz)
    {
        $questions = $quiz->questions;
        return view('quizzes.solve', compact('quiz', 'questions'));
    }

    public function submit(Request $request, Quiz $quiz)
    {
        $totalScore = 0;
        $userAnswers = [];

        foreach ($quiz->questions as $question) {
            $questionId = $question->id;
            $submittedAnswer = $request->input($questionId);

            // Check if the submitted answer matches the correct solution
            $isCorrect = ($submittedAnswer == $question->solution);

            // Retrieve or create the answer record for the current question
            $answer = Answer::firstOrNew([
                'quiz_id' => $quiz->id,
                'question_id' => $questionId,
                'user_id' => auth()->id(),
            ]);

            // Update the answer details
            $answer->fill([
                'answer' => $submittedAnswer,
                'is_correct' => $isCorrect,
            ]);

            // Save the answer
            $answer->save();

            // Increment score for correct answers
            if ($isCorrect) {
                $totalScore++;
            }

            // Store user's answer for display in the result view
            $userAnswers[$questionId] = [
                'question' => $question->question,
                'submitted_answer' => $submittedAnswer,
                'correct_answer' => $question->solution,
            ];
        }

        // Calculate score percentage
        $score = ($totalScore / $quiz->questions->count()) * 100;

        // Set the score property on the last saved answer (if available)
        if ($answer) {
            $answer->score = $score;
            $answer->save();
        }

        // Redirect to the result view with quiz data
        return $this->result($quiz, $quiz->questions->count(), $userAnswers, $score);
    }



    public function result(Quiz $quiz, $totalQuestions, $userAnswers, $score)
    {
        return view('quizzes.result', compact('quiz', 'totalQuestions', 'userAnswers', 'score'));
    }
}
