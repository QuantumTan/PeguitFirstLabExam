@extends('layout.app')
@section('content')
    <form action="{{ route('update', $character->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group m-5">
            <label for="name" class="form-label">Name</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $character->name) }}"
                placeholder="John Doe">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group m-5">
            <label for="title" class="form-label">Title</label>
            <input class="form-control" type="text" name="title" id="title"
                value="{{ old('title', $character->title) }}" placeholder="make a ...">
            @error('title')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group m-5">
            <label for="universe" class="form-label">Universe</label>
            <input class="form-control" type="text" name="universe" id="universe"
                value="{{ old('universe', $character->universe) }}" placeholder="Italian mobs">
            @error('universe')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="d-flex justify-content-end m-5">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
