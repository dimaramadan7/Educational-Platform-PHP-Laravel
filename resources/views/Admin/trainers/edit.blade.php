@extends('Admin.layout')

@section('content')

    <div class="d-flex justify-content-between mb-3">
        <h6>Trainers / Edit / {{ $trainer->name }}</h6>
        <a href="{{route('Admin.trainers.index')}}" class="btn btn-sm btn-primary">Back</a>
    </div>

    @include('Admin.inc.errors')

    <form method="POST" action="{{route('Admin.trainers.update')}}" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{$trainer->id}}">
        <div class="form-group">
            <label class="mt-3">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $trainer->name}}">
        </div>
        <div class="form-group">
            <label class="mt-3">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{$trainer->phone}}">
        </div>
        <div class="form-group">
            <label class="mt-3">Speciality</label>
            <input type="text" name="spec" class="form-control" value="{{$trainer->spec}}">
        </div>

        <img src="{{ asset('uploads/trainer/' . $trainer->img) }}" height="100px" alt="" class="py-5">

        <div class="form-group mt-3">
            <input type="file" name="img" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary mt-3">submit</button>
    </form>

@endsection