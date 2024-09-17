@extends('layouts.auth')
@section('content')
<div class="bg-" style=" background-color: white;">
    <div class="text-nowrap">
        <div class="">
            <div style="margin-top: 30px">  @if (session('success'))
                <div class="mt-5 alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif</div>
            <div>
                <a style="float: right; padding-right: 10px; margin-top:40px; margin-right:20px" href="{{'add-warehouse'}}" class="btn bg-success">Add warehouse</a>
            </div>
            <div class="table-responsive" style=" background-color: white;">
                <table class="table px-5 table-bordered " style="overflow-y: scroll;">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Address</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=1;
                        @endphp
                        @foreach ($data as $ade)
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
                            </td>
                            <td>
                                <a href="{{url('edit-warehouse/'.$ade->id)}}" class="btn bg-success">Edit</a>
                                <a href="{{url('delete-warehouse/'.$ade->id)}}" class="btn " style="background-color: red; color:white">delete</a>
                                <a class="btn bg-primary" href="/view-items-in-warehouse/{{$ade->id}}">View</a>
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
