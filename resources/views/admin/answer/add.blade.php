@extends('layouts.admin')

@section('content')

    <form action={{route('answer.store')}} method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Answer</label>
            <input type="text" class="form-control" name="title" placeholder="Input title of answer"><br>
            @error('title')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

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

        <div class="form-check">
            <input class="form-check-input bg-dark bg-opacity-50" type="checkbox" value="1" name="is_true" style="accent-color: #212529">
            <label class="form-check-label" for="is_true">
                True answer
            </label>
        </div>
        <br>
        <button type="submit" class="btn btn col-auto bg-dark text-white">Add</button>
    </form>

@endsection