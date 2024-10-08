@extends('Admin.layout')

@section('content')

    <div class="d-flex justify-content-between mb-3">
        <h6>Trainers / Edit / {{ $course->name }}</h6>
        <a href="{{route('Admin.courses.index')}}" class="btn btn-sm btn-primary">Back</a>
    </div>

    @include('Admin.inc.errors')

    <form method="POST" action="{{route('Admin.courses.update')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$course->id}}">
        <div class="form-group">
            <label class="mt-3">Name</label>
            <input type="text" name="name" class="form-control" value="{{$course->name}}">
        </div>

        <div class="form-group mt-3">
            <label for="cat_id">Category</label>
            <select class="form-control" name="cat_id">
                @foreach($cats as $cat)
                    <option value="{{ $cat->id }}" @if($course->cat_id == $cat->id) selected @endif> {{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="trainer_id mt-3">Trainer</label>
            <select class="form-control" name="trainer_id">
                @foreach($trainers as $t)
                    <option value="{{$t->id}}" @if($course->trainer_id == $t->id) selected @endif>{{$t->name}}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label class="mt-3">Small Description</label>
            <input type="text" name="small_desc" class="form-control" value="{{$course->small_desc}}">
        </div>
        <div class="form-group">
            <label class="mt-3">Description</label>
            <textarea class="form-control" name="desc" cols="30" rows="10">{{$course->desc}}</textarea>
        </div>
        <div class="form-group">
            <label class="mt-3">Price</label>
            <input type="number" name="price" class="form-control" value="{{$course->price}}">
        </div>
        <div class="form-group mt-3">
            <input type="file" name="img" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary mt-3">submit</button>
    </form>

@endsection