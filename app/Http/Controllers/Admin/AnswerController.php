<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnswerRequest;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $answers = Answer::paginate(10);
        return view('admin.answer.index', compact('answers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $questions = Answer::questions_with_filter();

        return view('admin.answer.add', compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AnswerRequest $request)
    {
        $request->validated();
        $answer = new Answer();
        $answer->title = $request->title;
        $answer->question_id = $request->question_id;
        if ($request->is_true) {
            $answer->is_true = 1;
        }

        $answer->save();
        return redirect()->route('answer.index');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Answer $answer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        $questions = Question::all();
        return view('admin.answer.show', compact('answer', 'questions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Answer $answer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        $questions = Question::all();
        return view('admin.answer.edit', compact('answer', 'questions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Answer $answer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AnswerRequest $request, Answer $answer)
    {
        $request->validated();
        $answer->title = $request->title;
        $answer->question_id = $request->question_id;
        if (!$request->is_true) {
            $answer->is_true = 0;
        } else {
            $answer->is_true = $request->is_true;
        }

        $answer->save();
        return redirect()->route('answer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Answer $answer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Answer $answer)
    {
        $answer->delete();

        return redirect()->route('answer.index');
    }

}


