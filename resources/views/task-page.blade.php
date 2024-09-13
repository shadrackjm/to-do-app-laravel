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
                            <th>S/N</th>
                            <th>Task Name</th>
                            <th>Task Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($tasks) > 0)
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $task->name }}</td>
                                    <td>{{ $task->description }}</td>
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
@endsection