@extends('layout')

@section('title', 'Edit Task')

@section('content')
    <div class="container mt-4 d-flex justify-content-center">
        <div class="card shadow-lg" style="width: 50rem;">
            <div class="card-header bg-primary text-white">
                <h2><i class="fas fa-edit"></i> Edit Task</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('tasks.update', $task) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $task->title) }}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Body</label>
                        <textarea name="description" class="form-control" rows="5">{{ old('body', $task->description) }}</textarea>
                        @error('body')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input type="hidden" name="is_completed" value="0">
                            <input type="checkbox" name="is_completed" class="form-check-input" value="1" {{ old('is_completed', $task->is_completed) ? 'checked' : '' }}>
                            <label class="form-check-label">Mark as completed</label>
                        </div>
                    </div>

                    <button type='submit' class="btn btn-success"><i class="fas fa-save"></i> Update</button>
                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
