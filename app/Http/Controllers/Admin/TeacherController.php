<?php

namespace App\Http\Controllers\Admin;

use App\Exports\TeachersExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;
use App\Mail\Creation;
use App\Models\Subject;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
//        $teachers = Teacher::paginate(5);
//        return view('admin.teacher.index', compact('teachers'));

        $curl = curl_init('http://onlinequiz.loc/api/subject-teachers/9');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $teachers = curl_exec($curl);
        curl_close($curl);
        dd($teachers);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('admin.teacher.add', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TeacherRequest $request)
    {
        $request->validated();
        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->email = $request->email;

        $teacher->subject_id = $request->subject_id;

        if ($request->hasFile('image_url')){
            $file = $request->file('image_url');
//            $fileName = time().'.'.$request->image_url->extension();
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $path = $request->image_url->storeAs('uploads', $fileName, 'public');
            $teacher->image_url = $path;
        }

        $teacher->save();

        Mail::to('arpine.harutyunyana@mail.ru')->send(new Creation($teacher->id, $teacher->name, 'Teacher'));
        return redirect()->route('teacher.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Teacher::findorfail($id);

        return view('admin.teacher.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::findorfail($id); // return map with that row data from db
        $subjects = Subject::all();
        $subject_name = Subject::where('id', $teacher->subject_id)->get('name')[0]->name;
        return view('admin.teacher.edit', compact('subjects', 'teacher', 'subject_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TeacherRequest $request, $id)
    {
        $request->validated();
        $teacher = Teacher::with('subject')->where('id', $id)
            ->update(['name' => $request->name, 'email' => $request->email,
                'subject_id' => $request->subject_id]);

        if ($request->hasFile('image_url')){
            $file = $request->file('image_url');
            $fileName = time().'.'.$request->image_url->extension();
            $path = $request->image_url->storeAs('uploads', $fileName, 'public');
            $teacher->image_url = $path;
        }

        return redirect()->route('teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Teacher::where('id', $id)->delete();
        return redirect()->route('teacher.index');
    }

    public function search_with_date(Request $request){
//        $start = Carbon::parse($request->start)->startOfDay()->format('Y-m-d H:i:s');
//        $end = Carbon::parse($request->end)->endOfDay()->format('Y-m-d H:i:s');
//        $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
//        $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');
//        echo $start."<br>";
//        echo $end."<br>";

//        $teachers = Teacher::whereBetween('created_at', [$start, $end])->get();
        $teachers = Teacher::whereHas('subject', function($query){
            $query->whereBetween('created_at', [Carbon::now()->startOfMonth()->format('Y-m-d H:i:s'),
                Carbon::now()->endOfMonth()->format('Y-m-d H:i:s')]);
        })->paginate(2);

        return view('admin.teacher.index', compact('teachers'));

    }

    public function export()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(new TeachersExport(), 'teachers.xlsx');
    }


}
