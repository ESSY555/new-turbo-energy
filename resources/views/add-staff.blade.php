@extends('layouts.auth')
@section('content')
<div class="container gradient-bg text-nowrap" style="background-color: white; height:65rem">
  <h1 class="mt-5 mb-4 text-center pt-2">STAFF FORM</h1>
  @if (session('success'))
  <div class="mt-5 alert alert-success" role="alert">
      {{ session('success') }}
  </div>
  @endif

  @if (session('error'))
  <div class="mt-5 alert alert-danger" role="alert">
      {{ session('error') }}
  </div>
  @endif

  <form method="POST" action="{{ url('save-staff') }}">
    @csrf
<div class="">
    <div class="form-group">
        <label for="firstName">First Name</label>
        <input type="text" class="form-control" name="firstName" placeholder="Enter first name" value="{{ old('firstName') }}">
        @error('firstName')
        <div class="mt-2 -m-b-3 alert alert-light text-danger text-center position-absolute start-0" role="alert" style="width: fit-content; margin-bottom:-20px; margin-left:-28px">
            {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="middleName">Middle Name</label>
        <input type="text" class="form-control" name="middleName" placeholder="Enter middle name" value="{{ old('middleName') }}">
        @error('middleName')
        <div class="mt-2 alert alert-light text-danger text-center position-absolute start-0" role="alert" style="width: fit-content; margin-bottom:-20px; margin-left:-28px">
            {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-group">
          <label for="lastName">Last Name</label>
          <input type="text" class="form-control" name="lastName" placeholder="Enter last name" value="{{ old('lastName') }}">
          @error('lastName')
          <div class="mt-2 alert alert-light text-danger text-center position-absolute start-0" role="alert" style="width: fit-content; margin-bottom:-20px; margin-left:-28px">
              {{ $message }}
          </div>
          @enderror
      </div>

      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" name="address" placeholder="Enter address" value="{{ old('address') }}">
        @error('address')
        <div class="mt-2 alert alert-light text-danger text-center position-absolute start-0" role="alert" style="width: fit-content; margin-bottom:-20px; margin-left:-28px">
            {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="phoneNumber">Phone Number</label>
        <input type="number" class="form-control" name="phoneNumber" placeholder="the number must start from zero and must be 11 digit" value="{{ old('phoneNumber') }}">
        @error('phoneNumber')
        <div class="mt-2 alert alert-light text-danger text-center position-absolute start-0" role="alert" style="width: fit-content; margin-bottom:-20px; margin-left:-28px">
            {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{ old('email') }}">
        @error('email')
        <div class="alert alert-light text-danger text-center position-absolute start-0" role="alert" style="width: fit-content; margin-bottom:-20px; margin-left:-28px">
            {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-group">
        @php
          $dep_part = DB::table('department')->get();
        @endphp

        <label for="warehouse_id">Department</label>
        <select class="form-control" name="department">
            <option value="">Select department</option>
            @foreach ($dep_part as $department)
                <option value="{{ $department->department }}">{{ $department->department }}</option>
            @endforeach
        </select>
        @error('department')
        <div class="mt-2 alert alert-light text-danger text-center position-absolute start-0" role="alert" style="width: fit-content; margin-left:-28px ">
            {{ $message }}
        </div>
        @enderror
      </div>
</div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ url('view-staff') }}" class="btn btn-danger">Back</a>
  </form>
</div>
@endsection
