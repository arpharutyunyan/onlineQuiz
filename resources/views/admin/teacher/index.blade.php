@extends('layouts.admin')

@section('content')

    <div class="container">

        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Teachers <b>List</b></h2></div>
                    <div class="col-sm-4">
                        <a href={{route('teacher.create')}}>
                            <span class="btn btn add-new col-auto bg-dark text-white">Add New</span>
                        </a>
                    </div>
                </div>
            </div>
            <form action="{{route('search')}}">
                <label for="start">Start date:</label>

                <input type="date" id="start" name="start"
{{--                       value="2022-01-01"--}}
                       min="2022-01-01" max="2030-12-31">

                <label for="end">End date:</label>

                <input type="date" name="end"
{{--                       value="2018-07-22"--}}
                       min="2022-01-01" max="2030-12-31">

                <input type="submit" class="btn col-auto bg-dark text-white" value="Search">
            </form>
            <br>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
{{--                    <th>Image</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach($teachers as $teacher)
                    <tr>
                        <td>{{$teacher->id}}</td>
                        <td>{{$teacher->name}}</td>
                        <td>{{$teacher->email}}</td>
                        <td>{{$teacher->subject->name}}</td>
                        <td>{{$teacher->created_at}}</td>
                        <td>{{$teacher->updated_at}}</td>
                        <td>
                            @php
                                $id = $teacher->id;
                                $name = 'teacher'; // for route in deleteConfModal
                            @endphp
                            <a href={{route('teacher.show', $id)}} class="btn" title="View" data-toggle="tooltip"><i class="fa fa-eye fa-2x" style="color: #323539"></i></a>
                            <a href={{route('teacher.edit', $id)}} class="btn" title="Edit" data-toggle="tooltip"><i class="material-icons" style="color: #323539">&#xE254;</i></a>
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalDelete{{$id, $name}}" title="Delete">
                                <i class="material-icons" style="color: #323539">&#xE872;</i>
                            </button>
                            @include('admin.deleteConfModal')
                        </td>
{{--                        <td><img src="/{{$teacher->image_url}}" alt="teacher image"></td>--}}
                    </tr>
                @endforeach

                </tbody>
            </table>

            <div class="pagination justify-content-end">
                {{ $teachers->links() }}
            </div>

            <form action="{{route('teacher_export')}}">
                <button type="submit" class="btn btn col-auto bg-dark text-white">Excel</button>
            </form>

        </div>
    </div>
@endsection


