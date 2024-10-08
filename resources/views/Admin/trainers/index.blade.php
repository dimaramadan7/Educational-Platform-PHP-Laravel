@extends('Admin.layout')

@section('content')
    <div class="container d-flex justify-content-between mb-3">
        <h6>Trainers</h6>
        <a href="{{route('Admin.trainers.create')}}" class="btn btn-sm btn-primary">ADD NEW</a>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Img</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Speciality</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trainers as $t)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                            <img src="{{asset('uploads/trainer/' . $t->img)}}" height="50px" alt="">
                        </td>
                        <td>{{ $t->name }}</td>
                        <td>
                            @if($t->phone !== null)
                            {{ $t->phone }}
                            @else
                                not exist
                            @endif
                        </td>
                        <td>{{ $t->spec }}</td>
                        <td>
                            <a href="{{route('Admin.trainers.edit', $t->id)}}" class="btn btn-sm btn-secondary">Edit</a>
                            <a href="{{route('Admin.trainers.delete', $t->id)}}" class="btn btn-sm btn-dark">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection