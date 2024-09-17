@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-12 col-xs-12 col-sm-12 col-xl-6" style="padding-left: 40px; background-color:white">
            <div class="p-5" style="background-color:white; padding-left: 40px">
                <h1 class="text-center pt-5">Edit Department</h1>

                @if (session('success'))
                <div class="mt-5 alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif

                <form method="POST" action="{{ route('departments.update', $department->id) }}">
                    @csrf
                    <div class="form-group">
                        <label for="department_name">Department Name</label>
                        <input type="text" class="form-control" id="department_name" name="department_name" value="{{ $department->department }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('departments.index') }}" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
