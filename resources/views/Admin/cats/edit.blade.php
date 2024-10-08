@extends('Admin.layout')

@section('content')

    <div class="d-flex justify-content-between mb-3">
        <h6>Categories / Edit / {{ $cat->name }}</h6>
        <a href="{{route('Admin.cats.index')}}" class="btn btn-sm btn-primary">Back</a>
    </div>

    @include('Admin.inc.errors')

    <form method="POST" action="{{route('Admin.cats.update')}}">
        @csrf

        <input type="hidden" name="id" value="{{$cat->id}}">
        <div class="form-group">
            <label class="mb-3">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $cat->name}}">
        </div>

        <button type="submit" class="btn btn-primary mt-3">submit</button>
    </form>

@endsection