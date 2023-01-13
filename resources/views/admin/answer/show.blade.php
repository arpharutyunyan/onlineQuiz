@extends('layouts.admin')

@section('content')

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">View Record</h1>
                    <div class="form-group">
                        <label>Id</label>
                        <p><b><?php echo $answer->id; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <p><b><?php echo $answer->title; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Question id</label>
                        <p><b><?php echo $answer->question_id; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Question title</label>
                        <p><b><?php echo $answer->question->title; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>The true answer</label>
                        <p><b><?php echo ($answer->is_true ? 'yes' : 'no'); ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Created At</label>
                        <p><b><?php echo $answer->created_at; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Updated At</label>
                        <p><b><?php echo $answer->updated_at; ?></b></p>
                    </div>
                    <p><a href={{route('answer.index')}} class="btn col-auto bg-dark text-white">Back</a></p>
                </div>
            </div>
        </div>
    </div>

@endsection