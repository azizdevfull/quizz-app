<?php

namespace App\Models;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_id', // ID of the associated quiz
        'question_id', // ID of the associated question
        'user_id', // ID of the user who submitted the answer (if applicable)
        'answer', // User's submitted answer
        'is_correct', // Flag indicating if the answer is correct
        'score', // Score awarded for the answer
    ];

    // Define relationships if needed (e.g., belongsTo Quiz, belongsTo Question, belongsTo User)
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
