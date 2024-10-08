@extends('Admin.layout')

@section('content')
    <div class="container d-flex justify-content-between mb-3">
        <h6>Courses</h6>
        <a href="{{route('Admin.courses.create')}}" class="btn btn-sm btn-primary">ADD NEW</a>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Img</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $c)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                            <img src="{{asset('uploads/course/' . $c->img)}}" height="50px" alt="">
                        </td>
                        <td>{{ $c->name }}</td>
                        <td>{{ $c->price }}</td>
                        <td>
                            <a href="{{route('Admin.courses.edit', $c->id)}}" class="btn btn-sm btn-secondary">Edit</a>
                            <a href="{{route('Admin.courses.delete', $c->id)}}" class="btn btn-sm btn-dark">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection