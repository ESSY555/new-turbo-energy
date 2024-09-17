@extends('layouts.auth') {{-- Assuming you have a layout file --}}
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-top: 100px">
                <div class="card">
                    <div class="card-header text-center"><h1>Add Warehouse</h1></div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form method="POST"   action="{{ url('save-warehouse') }}" class="p-5">

                            @csrf
                            {{-- <div class="form-group">
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
                                <div class="mt-2 alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div> --}}
                            <div class="form-group">
                                <label for="name">warehouse Name</label>
                                <input type="text" id="name" name="name" class="form-control" required value="{{ old('name') }}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="code">warehouse Code</label>
                                <input type="number" id="code" name="code" class="form-control" required value="{{ old('code') }}">
                                @error('code')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">warehouse Address</label>
                                <input type="text" id="address" name="address" class="form-control" required value="{{ old('address') }}">
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">warehouse Description</label>
                                <textarea id="description" name="description" class="form-control" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ url('view-warehouse') }}" class="btn btn-danger">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
