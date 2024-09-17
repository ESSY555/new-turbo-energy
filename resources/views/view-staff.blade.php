@extends('layouts.auth')

@section('content')
<div style="background-color:white; height:100vh" id="myElement">
    <div style="background-color:white">
        <div style="margin-top: 30px">
            @if (session('success'))
            <div class="mt-5 alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
        </div>
        <div class="row text-nowrap">
            <div class="col-md-11 px-5">
                <div class="flex text-right">
                    <div style=" padding-right:10px; font-size: 30px;">
                        <a href="{{'add-staff'}}" class="btn btn-success">Add Staff</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table px-5 " style="overflow-y: scroll;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Address</th>
                                <th>Phone Number</th>
                                <th>Email Address</th>
                                <th>Department</th>
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
                                <td>{{$ade->FirstName}}</td>
                                <td>{{$ade->MiddleName}}</td>
                                <td>{{$ade->LastName}}</td>
                                <td>{{$ade->Address}}</td>
                                <td>{{$ade->PhoneNumber}}</td>
                                <td>{{$ade->Email}}</td>
                                <td>{{$ade->Department}}</td>
                                <td>
                                    <a href="{{url('edit-staff/'.$ade->id)}}" class="btn btn-success">Edit</a>
                                    <form action="{{ url('delete-staff/' . $ade->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn" style="background-color: red; color:white" onclick="return confirm('Are you sure you want to delete this staff member?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $data->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/gsap.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        gsap.to('#myElement', { duration: 2, x: 20, rotation: 360 });
    });
</script>
@endsection
