@extends('layouts.auth')

@section('content')
    <div class="container-fluid completed-task-pag">
        <h1>Completed Tasks</h1>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-nowrap">#</th>
                        <th class="text-nowrap">Title</th>
                        <th class="text-nowrap">Description</th>
                        <th class="text-nowrap">Due Date</th>
                        <th class="text-nowrap">Status</th>
                        <th class="text-nowrap">Assigned User</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($completedTasks as $task)
                        <tr>
                            <td class="text-nowrap">{{ $task->id }}</td>
                            <td class="text-nowrap">{{ $task->title }}</td>
                            <td class="text-nowrap">{{ $task->description }}</td>
                            <td class="text-nowrap">{{ $task->due_date }}</td>
                            <td class="text-nowrap">{{ $task->status }}</td>
                            <td class="text-nowrap">{{ $task->assigned_user }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="container">
                <canvas id="taskProgressChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>

    <script>
        const completedTasksCount = {{ count($completedTasks) }};
    </script>
    
    

@endsection
