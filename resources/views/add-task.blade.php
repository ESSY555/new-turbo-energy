@extends('layouts.auth')

@section('content')
<div class="container people" style="background-color:white">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center" style="margin-top: 20px"><h1>Add Task</h1></div>

                <div class="card-body">
                    <form method="POST" action="save-task">
                        @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="due_date">Due Date</label>
                            <input type="date" class="form-control" id="due_date" name="due_date" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Assigned by</label>
                            <input type="text" class="form-control" id="assigned_by" name="assigned_by" required>
                        </div>
                        <div class="form-group">
                            <label for="priority">Priority</label>
                            <select class="form-control" id="priority" name="priority">
                                <option value="Low">Low</option>
                                <option value="Medium" selected>Medium</option>
                                <option value="High">High</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="assigned_user">Assigned User</label>
                            <select class="form-control" id="assigned_user" name="assigned_user">
                                <option value="" selected>Select User</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@include('completed-chart')

@endsection
