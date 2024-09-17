@extends('layouts.auth')
@section('content')
<div class="bg-" style="background-color: white; height:100vh">
    <div class="row text-nowrap">
        <div class="col-md-12 px-5">
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div style="padding-right: 10px; margin-top: 40px">
                <a style="float: right;" href="{{'add-items'}}" class="btn bg-success">Add items</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered overflow-y: scroll;">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Item Name</th>
                            <th>Warehouse Name</th>
                            <th>Item Code</th>
                            <th>Address</th>
                            <th>Description</th>
                            <th>Units/Quantity</th>
                            <th>Moved At</th> <!-- Add this column -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($data as $ade)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$ade->item_name}}</td>
                            <td>{{$ade->warehouse_name}}</td>
                            <td>{{$ade->item_code}}</td>
                            <td>{{$ade->item_address}}</td>
                            <td>{{$ade->item_description}}</td>
                            <td>{{$ade->item_units}}</td>
                            <td>{{$ade->moved_at}}</td> <!-- Display moved_at date and time -->
                            <td>
                                <a href="{{url('edit-items/'.$ade->item_id)}}" class="btn bg-success">Edit</a>
                                <a href="{{url('delete-items/'.$ade->item_id)}}" class="btn" style="background-color: red; color: white;">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                {{ $data->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection
