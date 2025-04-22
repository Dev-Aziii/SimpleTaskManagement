@extends('layout')

@section('title', 'Task')

@section('content')
    <section class="home-blog bg-sand">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-xl-5 col-lg-6 col-md-8">
                    <div class="section-title text-center title-ex1">
                        <h2>Welcome!</h2>
                        <p>A simple task management app using the Laravel framework performing basic CRUD functionality</p>
                    </div>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="row mb-4">
                <div class="col text-end">
                    <a href="{{ route('tasks.create') }}" class="btn btn-success">
                        <i class="fas fa-plus-circle"></i> Add New Task
                    </a>
                </div>
            </div>

            <div class="row">
                <h2>Task List:</h2>
                <hr>
                @foreach ($tasks as $task)
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex">
                                <div>
                                    <h5 class="day">{{ $task->created_at->format('d') }}</h5>
                                    <span class="month">{{ $task->created_at->format('M') }}</span>
                                </div>
                                <div class="ms-3">
                                    <h5 class="card-title">
                                        {{ $task->title }}
                                        @if (!$task->is_completed)
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @else
                                            <span class="badge bg-success">Completed</span>
                                        @endif
                                    </h5>
                                    <p class="card-text">{{ $task->description}}</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-3">
                                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning btn-sm me-2">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete this post?')">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            </div>
        </div>
    </section>
@endsection

