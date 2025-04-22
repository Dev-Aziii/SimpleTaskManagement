@extends('layout')

@section('title', 'Create task')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card shadow-lg" style="width: 50rem;">
            <div class="card-header bg-primary text-white">
                <h2><i class="fa-solid fa-plus"></i> Create New Task</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('tasks.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="5">{{ old('body') }}</textarea>
                        @error('body')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type='submit' class="btn btn-success"><i class="fas fa-save"></i> Create</button>
                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
