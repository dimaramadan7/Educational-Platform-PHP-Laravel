@extends('Admin.layout')
@section('content')

    <div class="container d-flex justify-content-between mb-3">
        <h6>Students / Show Courses</h6>
        <div>
            <a href="{{route('Admin.students.addCourse', $student_id)}}" class="btn btn-sm btn-success">Add To Course</a>
            <a href="{{route('Admin.students.index')}}" class="btn btn-sm btn-primary">Back</a>
        </div>
    </div>
    <div class="container">
        <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">status</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($courses as $c)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                {{$c->name}}
                            </td>
                            <td>
                                {{$c->pivot->status}}
                            </td>
                            <td>
                                @if($c->pivot->status !== 'approve')
                                    <a href="{{route('Admin.students.approveCourse' ,[$student_id, $c->id])}}" class="btn btn-sm btn-info">Approve</a>
                                @endif

                                @if($c->pivot->status !== 'reject')
                                    <a href="{{route('Admin.students.rejectCourse' ,[$student_id, $c->id])}}" class="btn btn-sm btn-danger">Reject</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
@endsection