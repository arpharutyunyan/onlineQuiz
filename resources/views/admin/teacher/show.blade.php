@extends('layouts.admin')

@section('content')

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">View Record</h1>
                    <div class="form-group">
                        <label>Id</label>
                        <p><b><?php echo $data->id; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <p><b><?php echo $data->name; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <p><b><?php echo $data->email; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Subject id</label>
                        <p><b><?php echo $data->subject_id; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Created At</label>
                        <p><b><?php echo $data->created_at; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Updated At</label>
                        <p><b><?php echo $data->updated_at; ?></b></p>
                    </div>
                    <p><a href={{route('teacher.index')}} class="btn col-auto bg-dark text-white">Back</a></p>
                </div>
            </div>
        </div>
    </div>

@endsection