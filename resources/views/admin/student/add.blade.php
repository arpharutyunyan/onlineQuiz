@extends('layouts.admin')

@section('content')

    <form action={{route('student.store')}} method="POST" >
        @csrf
        <div class="form-group">
            <label for="name">Name of student</label>
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

        <button type="submit" class="btn btn col-auto bg-dark text-white">Add</button>
    </form>

@endsection