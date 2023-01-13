@extends('layouts.admin')

@section('content')

    <form action={{route('subject.store')}} method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name of subject</label>
            <input type="text" class="form-control" name="name" placeholder="Input name"><br>
            @error('name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn col-auto bg-dark text-white">Add</button>
    </form>

@endsection