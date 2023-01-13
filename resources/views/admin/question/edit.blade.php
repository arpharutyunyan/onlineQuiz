@extends('layouts.admin')

@section('content')
    <div class="wrapper" style="width: 600px; margin: 0 auto;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the question record.</p>
                    <form action={{route('question.update', $question->id)}} method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Id</label>
                            <input type="text" name="id" class="form-control" value={{$question->id}} disabled>
                        </div>

                        <div class="form-group">
                            <label>Old title</label>
                            <input type="text" class="form-control" value={{$question->title}} disabled>
                        </div>

                        <div class="form-group">
                            <label>New title</label>
                            <input type="text" name="title" class="form-control">
                            @error('title')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Old subject</label>
                            <input type="text" class="form-control" value={{$question->subject->name}} disabled>
                        </div>

                        <div class="form-group">
                            <label>New subject</label>
                            <div class="form-group">
                                <label for="subject_id">Choose subject</label>
                                <select name="subject_id">
                                    <option selected disabled>Choose subject</option>
                                    @foreach($subjects as $subject)
                                        <option value={{$subject->id}}>{{$subject->name}}</option>
                                    @endforeach
                                </select>
                                @error('subject_id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <input type="submit" class="btn col-auto bg-dark text-white" value="Submit">
                        <a href={{route('question.index')}} class="btn" style="border-color: black">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection