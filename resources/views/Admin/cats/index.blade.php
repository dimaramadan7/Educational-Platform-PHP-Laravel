@extends('Admin.layout')

@section('content')
    <div class="container d-flex justify-content-between mb-3">
        <h6>Categories</h6>
        <a href="{{route('Admin.cats.create')}}" class="btn btn-sm btn-primary">ADD NEW</a>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cats as $cat)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $cat->name }}</td>
                        <td>
                            <a href="{{route('Admin.cats.edit', $cat->id)}}" class="btn btn-sm btn-secondary">Edit</a>
                            <a href="{{route('Admin.cats.delete', $cat->id)}}" class="btn btn-sm btn-dark">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection