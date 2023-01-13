@extends('layouts.admin')

@section('content')

    <div class="container">

        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Subjects <b>List</b></h2></div>
                    <div class="col-sm-4">
                        <a href={{route('subject.create')}}>
                            <span class="btn btn add-new col-auto bg-dark text-white">Add New</span>
                        </a>
                    </div>
                </div>
            </div>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($subjects as $subject)
                    <tr>
                        <td>{{$subject->id}}</td>
                        <td>{{$subject->name}}</td>
                        <td>{{$subject->created_at}}</td>
                        <td>{{$subject->updated_at}}</td>
                        <td>
                            @php
                                $id = $subject->id;
                                $name = 'subject';
                            @endphp
                            <a href={{route('subject.show', $id )}} class="btn" title="View" data-toggle="tooltip"><i class="fa fa-eye fa-2x" style="color: #323539"></i></a>
                            <a href={{route('subject.edit', $id)}} class="btn" title="Edit" data-toggle="tooltip"><i class="material-icons" style="color: #323539">&#xE254;</i></a>
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
                {{ $subjects->links() }}
            </div>
        </div>
    </div>
@endsection


