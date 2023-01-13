<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
//        $request->validated();

        if (Student::select('id')->where('email', $request->email)->count() === 0) {
            $student = new Student();
        } else {
            $student = Student::where('email', $request->email)->first();
        }
        $student->name = $request->name;
        $student->email = $request->email;
        $student->save();
//        dd($student);
        $quiz = new Quiz();
        $quiz->student_id = $student->id;
        $quiz->subject_id = $request->subject_id;

        $quiz->save();

        $subject_id = $request->subject_id;
        return view('quiz.quizzes', compact('subject_id'));
    }


}