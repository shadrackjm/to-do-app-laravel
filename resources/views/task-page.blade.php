@extends('layouts/app-layout')
@section('main')
    <div class="container">
        <div class="card">
            <div class="card-header">Laravel To do App <a href="/load-form" class="btn btn-success btn-sm float-end">Add new</a></div>
            @if (Session::has('success'))
                <span class="alert alert-success p-2">{{ Session::get('success') }}</span>
            @endif
            @if (Session::has('error'))
                <span class="alert alert-danger p-2">{{ Session::get('error') }}</span>
            @endif
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>S/N</th>
                            <th>Task Name</th>
                            <th>Task Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($tasks) > 0)
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>
                                        {{-- @if ($task->is_complete == 0)
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                          </div>
                                        @else
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" checked class="form-check-input" id="exampleCheck1">
                                          </div>
                                        @endif --}}
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" onchange="" {{ $task->is_complete == 0 ? '' : 'checked'  }} class="form-check-input" id="exampleCheck1">
                                          </div>
                                    </td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $task->name }}</td>
                                    <td>{{ $task->description }}</td>
                                    <td><a href="/edit/{{ $task->id }}" class="btn btn-primary btn-sm">Edit</a></td>
                                    <td>
                                        <a href="/delete/{{ $task->id }}" class="btn btn-danger btn-sm" onclick="return confirm('are you sure you want to delete {{ $task->name }}?')">Delete</a>
                                        {{-- <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Delete
                                          </button> --}}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>No Data Found!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            ...
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </div>
    </div>
@endsection