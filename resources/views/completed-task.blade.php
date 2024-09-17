@extends('layouts.auth')

@section('content')
    <div class="container-fluid completed-task">
        <h1>Completed Tasks</h1>

        <form method="POST" action="{{ route('tasks-complete') }}" >
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @csrf
            <div class="form-group">
                <label for="task_id">Select Task:</label>
                <select name="task_id" id="task_id" class="form-control" required>
                    @foreach ($tasks as $task)
                        <option value="{{ $task->id }}">{{ $task->title }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Mark as Completed</button>
        </form>
    </div>

    <div class="container">
        <canvas id="taskProgressChart" width="400" height="200"></canvas>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('assets/auth/icon/simple-line-icons/css/task-progress-chart.js')}}"></script>
@endsection
