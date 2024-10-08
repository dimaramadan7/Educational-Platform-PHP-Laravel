@extends('Admin.layout')

@section('content')

    <div class="d-flex justify-content-between mb-3">
        <h6>Categories / Add New</h6>
        <a href="{{route('Admin.cats.index')}}" class="btn btn-sm btn-primary">Back</a>
    </div>

    @include('Admin.inc.errors')

    <form method="POST" action="{{route('Admin.cats.store')}}">
        @csrf
        <div class="form-group">
            <label class="mb-3">Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">submit</button>
    </form>

@endsection