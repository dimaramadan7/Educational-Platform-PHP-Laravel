@extends('Admin.layout')
@section('content')
    <dev class="container d-flex justify-content-between mb-3">
        <h6>Students</h6>
        <a href="{{route('Admin.students.create')}}" class="btn btn-sm btn-primary">ADD NEW</a>
    </dev>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Specialty</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{$student->name}}</td>
                <td>{{$student->email}}</td>
                <td>
                    @if($student->spec !==null)
                        {{$student->spec}}
                    @else
                        no specialty
                    @endif
                </td>
                <td>
                    <a href="{{route('Admin.students.edit' ,$student->id)}}" class="btn btn-sm btn-secondary">Edit</a>
                    <a href="{{route('Admin.students.delete' ,$student->id)}}" class="btn btn-sm btn-dark">Delete</a>
                    <a href="{{route('Admin.students.showCourses' ,$student->id)}}" class="btn btn-sm btn-success">Show Courses</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
