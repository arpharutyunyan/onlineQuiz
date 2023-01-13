<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'question_id',
        'is_true'
    ];

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public static function questions_with_filter(){
        $questions = Question::all();
        $questions_with_filter = [];

        for ($i=0; $i<sizeof($questions); ++$i){
            $count = Answer::where('question_id', $questions[$i]->id)->count();
            if ($count < 4) {
                $questions_with_filter[] = $questions[$i];
            }
        }

        return $questions_with_filter;
    }
}
