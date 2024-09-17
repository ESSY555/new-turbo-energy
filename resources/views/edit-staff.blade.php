@extends('layouts.auth')
@section('content')
<div class="container gradient-bg text-nowrap" style="height: 100vh">
    <h1 class="mt-5 mb-4 text-center pt-2">Edit Staff</h1>

    @if (session('success'))
    <div class="mt-5 alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <form method="POST" action="{{ url('update-staff') }}">
        @csrf
        <input type="hidden" name="id" value="{{$data->id}}">
        <div class="row justify-content-between align-items-center">
            <div class="form-group col-md-6">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" name="firstName" placeholder="Enter first name" value="{{$data->FirstName}}">
                @error('firstName')
                <div class="mt-2 alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="middleName">Middle Name</label>
                <input type="text" class="form-control" name="middleName" placeholder="Enter middle name" value="{{$data->MiddleName}}">
                @error('middleName')
                <div class="mt-2 alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" name="lastName" placeholder="Enter last name" value="{{$data->LastName}}">
                @error('lastName')
                <div class="mt-2 alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" placeholder="Enter address" value="{{$data->Address}}">
                @error('address')
                <div class="mt-2 alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="phoneNumber">Phone Number</label>
                <input type="tel" class="form-control" name="phoneNumber" placeholder="Enter phone number" value="{{$data->PhoneNumber}}">
                @error('phoneNumber')
                <div class="mt-2 alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="email">Email address</label>
                <input type="email" id="Email" class="form-control" name="Email" placeholder="Enter email" value="{{$data->Email}}">
                @error('Email')
                <div class="mt-2 alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="warehouse_id">Department</label>
                <input type="Department" id="Department" class="form-control" name="Department" placeholder="Department" value="{{$data->Department}}">
                @error('department')
                <div class="mt-2 alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
        <a href="{{ url('view-staff') }}" class="btn btn-danger mt-3">Back</a>
    </form>
</div>
@endsection
