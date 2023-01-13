@extends('layouts.admin')

@section('content')

    <form action={{route('question.store')}} method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Question</label>
            <input type="text" class="form-control" name="title" placeholder="Input title of question"><br>
            @error('title')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

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

        <button type="submit" class="btn btn col-auto bg-dark text-white">Add</button>
    </form>

@endsection