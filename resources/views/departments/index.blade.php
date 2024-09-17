@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-12 col-xs-12 col-sm-12 col-xl-6" style="padding-left: 40px; background-color:white">
            <div class="p-5" style="background-color:white; padding-left: 40px">
                <h1 class="text-center pt-5">All the Departments</h1>
                <div class="table-responsive">
                    <table class="table table-bordered" style="overflow-y: auto;">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Department</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $department)
                            <tr>
                                <th scope="row">{{ $department->id }}</th>
                                <td>{{ $department->department }}</td>
                                <td>
                                    <a href="{{ route('departments.edit', $department->id) }}" class="btn bg-success">Edit</a>
                                    <a href="{{ route('departments.delete', $department->id) }}" class="btn" style="background-color: red; color:white">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
