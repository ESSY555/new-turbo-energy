@extends('layouts.auth')
@section('content')
<div class="row justify-content-center p-5" style="height: 100vh; background-color: white; height:100vh">
    <div class="col-lg-6 col-md-12 col-xs-12 col-sm-12 col-xl-6" style="margin-top: 60px">
        <form method="POST" action="{{ url('insert-department') }}" class="p-5 mt-3">
            @csrf
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="depar mt-4" style="padding-left: 40px">
                <label for="ict">Add Department</label>
                <input type="text" id="department" name="department" class="form-control" required value="{{ old('department') }}" placeholder="Enter department">
                @error('department')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary mt-5" style="margin-top: 20px; margin-bottom:10px">Submit</button>
                {{-- <a href="{{ url('view-warehouse') }}" class="btn btn-danger mt-3">Back</a> --}}
            </div>
        </form>
    </div>
    <div class="col-6" style="padding-left: 40px; background-color:white">
        <div class="p-5" style="background-color:white; padding-left: 40px">
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
            <div class="table-responsive">
                <h1 class="text-center">All the Departments</h1>
                <table class="table table-bordered" style="overflow-y: auto;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Department</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $dep_part = DB::table('department')->get();
                            $i = 1;
                        @endphp
                        @foreach ($dep_part as $james)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $james->department }}</td>
                            <td>
                                <a href="{{ url('edit-department/' .$james->id) }}"  class="btn bg-success">Edit</a>
                                <a href="{{ url('delete-department/' .$james->id) }}" class="btn" style="background-color: red; color:white">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection
