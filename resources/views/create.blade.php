@extends('layout.app')
@section('content')
    <form action="{{ route('store') }}" method="POST" class="m-5">
        @csrf
        <div class="form-group m-1">
            <label for="name" class="form-label">Name</label>
            <input class="form-control" type="text" name="name" id="name" placeholder="Name">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group m-1">
            <label for="title" class="form-label">Title</label>
            <input class="form-control" type="text" name="title" id="title" placeholder="Power">
            @error('title')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group m-1">
            <label for="universe" class="form-label">Universe</label>
            <input class="form-control" type="text" name="universe" id="universe" placeholder="Universe">
            @error('universe')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="d-flex justify-content-start mt-4 mx-1 gap-2">
            <button type="submit" class="btn btn-dark"><i class="bi bi-plus-circle"></i> Add Character</button>
            <a href="{{route('index')}}" class="btn btn-outline-danger">Cancel</a>
        </div>
    </form>
@endsection
