@extends('Admin.layout')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h6>Students / Edit / {{$student->name}} <span class="text-primary">update</span></h6>
        <a href="{{route('Admin.students.index')}}" class="btn btn-sm btn-primary">Back</a>
    </div>
    @include('Admin.inc.errors')
    <form method="POST" action="{{route('Admin.students.update')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-3">
            <input type="hidden" name="id" value="{{$student->id}}">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{$student->name}}">
        </div>
        <div class="form-group mt-3">
            <label>Email</label>
            <input type="text" name="email" class="form-control" value="{{$student->email}}">
        </div>
        <div class="form-group mt-3">
            <label>Specialty</label>
            <input type="text" name="spec" class="form-control" value="{{$student->spec}}">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
@endsection
