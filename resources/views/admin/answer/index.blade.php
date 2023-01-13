@extends('layouts.admin')

@section('content')

    <div class="container">

        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Answers <b>List</b></h2></div>
                    <div class="col-sm-4">
                        <a href={{route('answer.create')}}>
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
                    <th>Question id</th>
                    <th>Question title</th>
                    <th>Is true</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($answers as $answer)
                    <tr>
                        <td>{{$answer->id}}</td>
                        <td>{{$answer->title}}</td>
                        <td>{{$answer->question->id}}</td>
                        <td>{{$answer->question->title}}</td>
                        <td>{{$answer->is_true}}</td>
                        <td>{{$answer->created_at}}</td>
                        <td>{{$answer->updated_at}}</td>
                        <td>
                            @php
                                $id = $answer->id; // for route in deleteConfModal
                                $name = 'answer';
                            @endphp
                            <a href={{route('answer.show', $answer)}} class="btn" title="View" data-toggle="tooltip"><i class="fa fa-eye fa-2x" style="color: #323539"></i></a>
                            <a href={{route('answer.edit', $answer)}} class="btn" title="Edit" data-toggle="tooltip"><i class="material-icons" style="color: #323539">&#xE254;</i></a>
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
                {{ $answers->links() }}
            </div>
        </div>
    </div>
@endsection


