@extends('layouts.admin')

@section('content')
    <div class="wrapper" style="width: 600px; margin: 0 auto;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the subject record.</p>
                    <form action={{route('teacher.update', $teacher->id)}} method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Id</label>
                            <input type="text" name="id" class="form-control" value={{$teacher->id}} disabled>
                        </div>

                        <div class="form-group">
                            <label>Old name</label>
                            <input type="text" class="form-control" value={{$teacher->name}} disabled>
                        </div>

                        <div class="form-group">
                            <label>New name</label>
                            <input type="text" name="name" class="form-control" >{{--by default take the old name, cant be empty--}}
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Old email</label>
                            <input type="text" class="form-control" value={{$teacher->email}} disabled>
                        </div>

                        <div class="form-group">
                            <label>New email</label>
                            <input type="text" name="email" class="form-control" value="">

                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Old subject</label>
                            <input type="text" class="form-control" value={{$subject_name}} disabled>
                        </div>

                        <div class="form-group">
                            <label>New subject</label>
                            <div class="form-group">
                                <label for="subject_id">Choose subject</label>
                                <select name="subject_id">
                                    <option selected disabled>Choose subject</option>
                                    @foreach($subjects as $sub)
                                        <option value={{$sub->id}}>{{$sub->name}}</option>
                                    @endforeach
                                </select>
                                @error('subject_id')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <img src="/{{$teacher->image_url}}" alt="teacher image" class="img-thumbnail">
                        </div>

                        <div>
                            <label for="image_url"> Choose image: </label><br>
                            <input type="file" name="image_url"><br><br>
                        </div>

                        <input type="submit" class="btn col-auto bg-dark text-white" value="Submit">
                        <a href={{route('teacher.index')}} class="btn" style="border-color: black">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection