@extends('layouts.auth')
@section('content')
<div class="row justify-content-center p-5" style="height: 100vh; background-color: white; margin-top: 60px;">
    <div class="col-lg-6 col-md-12">
        <form method="POST"  class="p-5 mt-3">
            @csrf
            @method('POST') <!-- Add this line for POST method -->
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="depar mt-4">
                <label for="ict">Edit Department</label>
                <input type="text" id="department" name="department" class="form-control" required value="{{ $data->department }}" placeholder="Enter department">
                @error('department')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary mt-3">Update</button>
                <a class="btn btn-danger mt-3">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection
