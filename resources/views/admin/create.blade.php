@extends('layouts.admin')

@section('content')
@if(count($errors->all()))
    <div class="alert alert-danger" role="alert">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
  </div>
@endif

@include('partials.errors')

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.create') }}" method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <input type="text" class="form-control" id="content" name="content">
                </div>
                @foreach($tags as $tag)
                    <div class="chekbox">
                        <label>
                            <input type="checkbox" name="tags[]" value="{{$tag->id}}"> {{$tag->name}}
                        </label>
                    </div>
                @endforeach

                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection