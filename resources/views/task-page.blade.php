<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('task page') }}
        </h2>
    </x-slot>

{{-- @extends('layouts/app-layout')
@section('main') --}}
    <div class="container pt-3">
        <div class="card">
            <div class="card-header">Laravel To do App <a href="/load/form" class="btn btn-success btn-sm float-end">Add new</a></div>
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
                                            <input type="checkbox" onchange="updateTaskStatus(this, {{ $task->id }})" {{ $task->is_complete == 0 ? '' : 'checked' }} class="form-check-input" id="exampleCheck1">

                                          
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
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    
    function updateTaskStatus(checkbox, userId) {
        const isChecked = $(checkbox).is(':checked');
    
        // Make an AJAX request to update the task status
        $.ajax({
            url: '/update-task-status', // Change to your actual URL
            method: 'POST',
            data: {
                id: taskId,
                is_complete: isChecked ? 1 : 0,
                _token: '{{ csrf_token() }}' // Include CSRF token if using Laravel
            },
            success: function(response) {
                // Handle success, maybe show a message
                console.log('Task status updated:', response);
            },
            error: function(xhr) {
                // Handle error
                console.error('Error updating task status:', xhr);
            }
        });
    }
    
        </script>
{{-- @endsection --}}
    </x-app-layout>