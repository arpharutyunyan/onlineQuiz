@extends('layouts.admin')

@section('content')

    <div class="container">

        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Questions <b>List</b></h2></div>
                    <div class="col-sm-4">
                        <a href={{route('question.create')}}>
                            <span class="btn btn add-new col-auto bg-dark text-white">Add New</span>
                        </a>
                    </div>
                </div>
            </div>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Subject name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($questions as $question)
                    <tr>
                        <td>{{$question->id}}</td>
                        <td>{{$question->title}}</td>
                        <td>{{$question->subject->name}}</td>
                        <td>{{$question->created_at}}</td>
                        <td>{{$question->updated_at}}</td>
                        <td>
                            @php
                                $id = $question->id; // for route in deleteConfModal
                                $name = 'question';
                            @endphp
                            <a href={{route('question.show', $question)}} class="btn" title="View" data-toggle="tooltip"><i class="fa fa-eye fa-2x" style="color: #323539"></i></a>
                            <a href={{route('question.edit', $question)}} class="btn" title="Edit" data-toggle="tooltip"><i class="material-icons" style="color: #323539">&#xE254;</i></a>
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalDelete{{$id, $name}}" title="Delete">
                                <i class="material-icons" style="color: #323539">&#xE872;</i>
                            </button>
                            @include('admin.deleteConfModal')
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="pagination justify-content-end">
                {{ $questions->links() }}
            </div>
        </div>
    </div>
@endsection


