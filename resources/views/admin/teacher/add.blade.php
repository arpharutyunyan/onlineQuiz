@extends('layouts.admin')

@section('content')

    <form action={{route('teacher.store')}} method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name of teacher</label>
            <input type="text" class="form-control" name="name" placeholder="Input name"><br>
            @error('name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" placeholder="Input email"><br>
            @error('email')
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

        <div >
            <label for="image_url"> Choose image: </label><br>
            <input type="file" name="image_url"><br><br>
        </div>

        <button type="submit" class="btn btn col-auto bg-dark text-white">Add</button>
    </form>

@endsection