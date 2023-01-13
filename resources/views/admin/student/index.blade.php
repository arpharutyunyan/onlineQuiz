@extends('layouts.admin')

@section('content')

    <div class="container">

        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Students <b>List</b></h2></div>
                    <div class="col-sm-4">
                        <a href={{route('student.create')}}>
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
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{$student->id}}</td>
                        <td>{{$student->name}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->created_at}}</td>
                        <td>{{$student->updated_at}}</td>
                        <td>
                            @php
                                $id = $student->id; // for route in deleteConfModal
                                $name = 'student';
                            @endphp
                            <a href={{route('student.show', $student)}} class="btn" title="View" data-toggle="tooltip"><i class="fa fa-eye fa-2x" style="color: #323539"></i></a>
                            <a href={{route('student.edit', $student)}} class="btn" title="Edit" data-toggle="tooltip"><i class="material-icons" style="color: #323539">&#xE254;</i></a>
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
                {{ $students->links() }}
            </div>
        </div>
    </div>
@endsection


