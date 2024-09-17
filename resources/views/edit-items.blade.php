@extends('layouts.auth') {{-- Assuming you have a layout file --}}
@section('content')
    <div class="container">
        <div class="" style="height: 100vh">
            <div class="col-md-8" style="margin-top: 100px">
                <div class="card">
                    <div class="card-header text-center"><h1>Edit items</h1></div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form method="POST" action="/update-items" class="p-5">

                            @csrf
                            <input type="hidden" name="id" value="{{$data->id}}">
{{-- @php
$ware_house = DB::table('warehouses')->get()
@endphp
                            <div class="form-group">
                                <label for="warehouse_id">warehouse</label>
                                <select class="form-control" name="warehouse_id">
                                    <option value="">Select warehouse</option>
                                    @foreach ($ware_house as $ware)
                                    <option value={{$ware->id}}>{{$ware->name}}</option>

                                    @endforeach


                                </select>
                                @error('warehouse_id')
                                <div class="mt-2 alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div> --}}
                            <div class="form-group">
                                <label for="name">items Name</label>
                                <input type="text" id="name" name="name" class="form-control" required value="{{$data->name}}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="code">item Code</label>
                                <input type="text" id="code" name="code" class="form-control" required value="{{$data->code}}">
                                @error('code')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">item Address</label>
                                <input type="text" id="address" name="address" class="form-control" required value="{{$data->address}}">
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">item Description</label>
                                <textarea id="description" name="description" class="form-control" required>{{$data->description}}</textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="units">item units</label>
                                <textarea id="description" name="units" class="form-control" required>{{$data->units}}</textarea>
                                @error('units')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-danger mt-3" onclick="history.back()">Back</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
