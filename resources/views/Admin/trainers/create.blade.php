@extends('Admin.layout')

@section('content')

    <div class="d-flex justify-content-between mb-3">
        <h6>Trainers / Add New</h6>
        <a href="{{route('Admin.trainers.index')}}" class="btn btn-sm btn-primary">Back</a>
    </div>

    @include('Admin.inc.errors')

    <form method="POST" action="{{route('Admin.trainers.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="mt-3">Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label class="mt-3">Phone</label>
            <input type="text" name="phone" class="form-control">
        </div>
        <div class="form-group">
            <label class="mt-3">Speciality</label>
            <input type="text" name="spec" class="form-control">
        </div>
        <div class="form-group mt-3">
            <input type="file" name="img" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary mt-3">submit</button>
    </form>

@endsection