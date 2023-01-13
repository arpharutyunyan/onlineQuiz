<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Validator;

class SubjectController extends Controller
{
    public function index(){

        $subjects = Subject::paginate(10);
        return view('admin.subject.index', compact('subjects'));
    }


     // Show the form for creating a new resource.

    public function create()
    {
        return view('admin.subject.add');
    }


     //Store a newly created resource in storage.

    public function store(Request $request)
    {

        \Illuminate\Support\Facades\Validator::make($request->all(), ['name' => 'required|string'])->validate();

        $curl = curl_init('http://onlinequiz.loc/api/subject_store');

//        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "post");
//        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode(['name'=>$request->name]));
//        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
//                'Content-Type: application/json')
//        );

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER=>true,
            CURLOPT_CUSTOMREQUEST=>"POST",
            CURLOPT_HTTPHEADER=>['content-type: application/json'],
            CURLOPT_POSTFIELDS=>json_encode(['name'=>$request->name])
        ));

        $parsedData = curl_exec($curl);
        curl_close($curl);
//        $subject->name = $request['name'];
//        $subject->save();
        return redirect()->route('admin.subject');

//        return response()->json(['data'=>$parsedData]);
    }

    //Display the specified resource.

    public function show($id)
    {
        $row = Subject::findorfail($id);
//        print_r($row['name']);
        return view('admin.subject.show', ['rows' => $row]);

    }

    // Show the form for editing the specified resource.

    public function edit($id)
    {
        $row = Subject::findorfail($id);
        return view('admin.subject.edit', ['rows' => $row]);
    }

    //Update the specified resource in storage.

    public function update(Request $request, $id)
    {
        \Illuminate\Support\Facades\Validator::make($request->all(), ['name' => 'required|string'])->validate();
        Subject::where('id', $id)->update(['name' => $request->name]);

        return redirect()->route('admin.subject');
    }

    //Remove the specified resource from storage.

    public function destroy($id)
    {
        Subject::where('id', $id)->delete();
        return redirect()->route('admin.subject');
    }

    public function subjectTeachers($id){

        $teachers = Teacher::where('subject_id', $id)->get();

//        return response(json_encode(['teachers'=>$teachers]));
//        return response(['teachers'=>$teachers]);
       return response()->json(['teachers'=>$teachers]);
    }

    public function add(Request $request)
    {
        $subject = new Subject;
        $subject->name = $request['name'];
        $subject->save();
        return response()->json(['name'=>$subject->name]);
    }
}
