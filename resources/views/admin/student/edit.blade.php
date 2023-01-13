@extends('layouts.admin')

@section('content')
    <div class="wrapper" style="width: 600px; margin: 0 auto;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the subject record.</p>
                    <form action={{route('student.update', $student)}} method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Id</label>
                            <input type="text" name="id" class="form-control" value={{$student->id}} disabled>
                        </div>

                        <div class="form-group">
                            <label>Old name</label>
                            <input type="text" class="form-control" value={{$student->name}} disabled>
                        </div>

                        <div class="form-group">
                            <label>New name</label>
                            <input type="text" name="name" class="form-control">
                            @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Old email</label>
                            <input type="text" class="form-control" value={{$student->email}} disabled>
                        </div>

                        <div class="form-group">
                            <label>New email</label>
                            <input type="text" name="email" class="form-control">
                            @error('email')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <input type="submit" class="btn col-auto bg-dark text-white" value="Submit">
                        <a href={{route('student.index')}} class="btn" style="border-color: black">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection