@extends('layouts.admin')

@section('content')
    <div class="wrapper" style="width: 600px; margin: 0 auto;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the subject record.</p>
                    <form action={{route('answer.update', $answer)}} method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Id</label>
                            <input type="text" name="id" class="form-control" value={{$answer->id}} disabled>
                        </div>

                        <div class="form-group">
                            <label>Old title</label>
                            <input type="text" class="form-control" value="{{$answer->title}}" disabled>
                        </div>

                        <div class="form-group">
                            <label>New title</label>
                            <input type="text" name="title" class="form-control">
                            @error('title')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Old question</label>
                            <input type="text" class="form-control" value="{{$answer->question->id}}. {{$answer->question->title}}" disabled>
                        </div>

                        <div class="form-group">
                            <label>New question</label>
                            <div class="form-group">
                                <label for="question_id">Choose question</label>
                                <select name="question_id">
                                    <option selected disabled>Choose question</option>
                                    @foreach($questions as $question)
                                        <option value={{$question->id}}>{{$question->id}}.  {{$question->title}}</option>
                                    @endforeach
                                </select>
                                @error('question_id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input bg-dark bg-opacity-50" type="checkbox" value="1" name="is_true" style="accent-color: #212529"
                                {{$answer->is_true ? 'checked' : ''}}> {{-- if checked show box with check mark--}}

                            <label class="form-check-label" for="is_true">
                                True answer
                            </label>
                        </div>
                        <br>
                        <input type="submit" class="btn col-auto bg-dark text-white" value="Submit">
                        <a href={{route('answer.index')}} class="btn" style="border-color: black">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection