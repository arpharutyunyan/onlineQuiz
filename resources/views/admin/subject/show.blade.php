@extends('layouts.admin')

@section('content')

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">View Record</h1>
                    <div class="form-group">
                        <label>Id</label>
                        <p><b><?php echo $rows->id; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <p><b><?php echo $rows->name; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Created At</label>
                        <p><b><?php echo $rows->created_at; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Updated At</label>
                        <p><b><?php echo $rows->updated_at; ?></b></p>
                    </div>
                    <p><a href={{route('admin.subject')}} class="btn col-auto bg-dark text-white">Back</a></p>
                </div>
            </div>
        </div>
    </div>

@endsection