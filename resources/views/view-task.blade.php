@extends('layouts.auth')

@section('content')
<div class="container-fluid main-con-in-view" style="height: 100vh">


   <div class="nav-at-view">
    <nav class="nav nav-pills nav-justified " >
        <li class="nav-item">
            <a id="add-task-link" class="nav-link {{ Request::is('/') ? 'active active-button' : '' }}" href="#task-content" onclick="showAddTask()">view task</a>
        </li>
        <li class="nav-item">
            <a id="in-progress-link" class="nav-link {{ Request::is('in-progress') ? 'active active-button' : '' }}" href="#in-progress-content" onclick="showInProgress()">mark task complete</a>
        </li>
        <li class="nav-item">
            <a id="completed-link" class="nav-link {{ Request::is('completed') ? 'active active-button' : '' }}" href="#completed-content" onclick="showCompleted()">Completed Task</a>
        </li>
    </nav>
   </div>


   <div class="table-on-view">
    <div id="task-content" style="display: none;">
        <div class="card-header text-center" style="margin-top: 20px"><h1>task list</h1></div>

        <!-- Your task list content here -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <!-- Table headers -->
                <thead>
                    <!-- Table row for headers -->
                    <tr>
                        <!-- Table data cells for headers -->
                        <thead>
                            <tr>
                                <th class="text-nowrap">#</th>
                                <th class="text-nowrap">Title</th>
                                <th class="text-nowrap">Description</th>
                                <th class="text-nowrap">Due Date</th>
                                <th class="text-nowrap">assigned by</th>
                                <th class="text-nowrap">Priority</th>
                                <th class="text-nowrap">Status</th>
                                <th class="text-nowrap">Assigned User</th>
                            </tr>
                        </thead>

                </thead>
                <!-- Table body -->
                <tbody>
                    <!-- Loop through tasks to display -->
                    @php
                    $i = 1;
                    @endphp
                  @foreach ($tasks as $task)
                  <tr>
                      <td class="text-nowrap">{{$i++}}</td>
                      <td class="text-nowrap">{{ $task->title }}</td>
                      <td class="text-nowrap">{{ $task->description }}</td>
                      <td class="text-nowrap">{{ $task->due_date }}</td>
                      <td class="text-nowrap">{{ $task->assigned_by }}</td>
                      <td class="text-nowrap">{{ $task->priority }}</td>
                      <!-- Change color based on status -->
                      <td style="color:
                          @if ($task->status === 'Pending')
                              red
                          @elseif ($task->status === 'Completed')
                              green
                          @else
                              yellow
                          @endif
                          ">
                          {{ $task->status }}
                      </td>
                      <td class="text-nowrap">{{ $task->user_name ?? 'N/A' }}</td>
                  </tr>
                  @endforeach

                </tbody>
            </table>
            {{ $tasks->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <div id="in-progress-content" style="display: none;">
        <div class="container-fluid completed-task col-md-6">
            <h1>mark Task complete</h1>

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
            <div>
            {{ $tasks->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

    <div id="completed-content" style="display: none;">

    </div>

    <div id="Much-longer-content" style="display: none;">
        <!-- Placeholder for much longer content -->
        <!-- You can replace this with the actual form or content you want to display -->
        <h4>Much Longer Content</h4>
        <!-- Container for the retrieved content -->
        <div id="dynamic-content"></div>
    </div>
   </div>


<script>
    function showAddTask() {
        document.getElementById('task-content').style.display = 'block';
        document.getElementById('in-progress-content').style.display = 'none';
        document.getElementById('completed-content').style.display = 'none';

        document.getElementById('add-task-link').classList.add('active-button');
        document.getElementById('in-progress-link').classList.remove('active-button');
        document.getElementById('completed-link').classList.remove('active-button');
    }

    function showInProgress() {
        document.getElementById('task-content').style.display = 'none';
        document.getElementById('in-progress-content').style.display = 'block';
        document.getElementById('completed-content').style.display = 'none';

        document.getElementById('add-task-link').classList.remove('active-button');
        document.getElementById('in-progress-link').classList.add('active-button');
        document.getElementById('completed-link').classList.remove('active-button');
    }

    function showCompleted() {
        document.getElementById('task-content').style.display = 'none';
        document.getElementById('in-progress-content').style.display = 'none';
        document.getElementById('completed-content').style.display = 'block';

        document.getElementById('add-task-link').classList.remove('active-button');
        document.getElementById('in-progress-link').classList.remove('active-button');
        document.getElementById('completed-link').classList.add('active-button');
    }

    // Trigger click event on the active button when the page loads
    document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('add-task-link').click();
        });
</script>


</div>

@endsection
