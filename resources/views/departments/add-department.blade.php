@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Department</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('departments.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="department_name">Department Name</label>
                            <input type="text" class="form-control @error('department_name') is-invalid @enderror" id="department_name" name="department_name" value="{{ old('department_name') }}" placeholder="Enter department name" required>
                            @error('department_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Add Department</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <a href="{{ route('departments.create') }}" class="btn btn-primary">Add Department</a> --}}

</div>
@endsection
