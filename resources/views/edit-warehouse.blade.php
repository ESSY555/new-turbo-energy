@extends('layouts.auth') {{-- Assuming you have a layout file --}}
@section('content')
    <div class="container">
        <div class="row justify-content-center" >
            <div class="col-md-8 p-5 align-items-center" style="margin-top: 100px">
                <div class="card">
                    <div class="card-header text-center"><h1><b>Edit Warehouse</b></h1></div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form method="POST"   action="{{ url('update-warehouse') }}" class="p-5">
                        
                            @csrf
                            <input name="id" hidden value={{$id}} />
                            <div class="form-group">
                                <label for="name">warehouse Name</label>
                                <input type="text" id="name" name="name" class="form-control" required value="{{$data->name}}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="code">warehouse Code</label>
                                <input type="text" id="code" name="code" class="form-control" required value="{{$data->code}}">
                                @error('code')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">warehouse Address</label>
                                <input type="text" id="address" name="address" class="form-control" required value="{{$data->address}}">
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">warehouse Description</label>
                                <textarea id="description" name="description" class="form-control" required >{{$data->description}}</textarea>
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
