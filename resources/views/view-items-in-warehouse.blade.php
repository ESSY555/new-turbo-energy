@extends('layouts.auth')
@section('content')
<div class="" style="height: 100vh">
    <div class=" text-nowrap">
        <div class="col-md-12 px-5">
        <div class="" style="margin-top: 30px; background-color: white">
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        </div>
            <div>
                <img src="../../../../" alt="">
                <a style="float: right; margin-right: 40px; margin-top:40px" href="{{'/add-items'}}" class="btn bg-success">Add items</a>
            </div>
            <div class="table-responsive" style=" background-color: white">
                <table class="table table-bordered" style="overflow-y: scroll">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Address</th>
                            <th>Description</th>
                            <th>units/quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                         $ittems = DB::table('items')->get();
                         $i = 1;
                        @endphp
                        @foreach ( $items as $ade)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>
                                {{$ade->name}}
                            </td>
                            <td>
                                {{$ade->code}}
                            </td>
                            <td>
                                {{$ade->address}}
                            </td>
                            <td>
                                {{$ade->description}}
                            <td>
                                {{$ade->units}}
                            </td>
                            <td>
                                <a href="{{url('edit-items-in-warehouse/'.$ade->id)}}" class="btn bg-success">Edit</a>
                                <a href="{{url('delete-items/'.$ade->id)}}" class="btn " style="background-color: red; color:white">delete</a>
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




 