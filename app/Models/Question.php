<?php

namespace App\Models;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['question', 'answer1', 'answer2', 'answer3', 'answer4', 'solution'];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
