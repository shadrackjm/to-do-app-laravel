@extends('layouts/app-layout')
@section('main')
<div class="container">
    <div class="card">
        <div class="card-header">Edit New Task <a href="/" class="btn btn-success btn-sm float-end">Go Home</a></div>
        <div class="card-body">
            {{-- <form method="POST" action="{{ url('/post-data') }}"> --}}
            <form method="POST" action="{{ route('edit') }}">
                @csrf
                <input type="hidden" name="task_id"  value="{{ $task->id }}">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Task Name</label>
                  <input type="text" class="form-control" name="task_name" value="{{ $task->name }}" id="exampleInputEmail1" aria-describedby="emailHelp">
                  @error('task_name')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">task Description</label>
                  <input type="text" class="form-control" name="task_description" value="{{ $task->description }}" id="exampleInputPassword1">
                  @error('task_description')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
        </div>
    </div>
</div>
@endsection