<!-- resources/views/admin/manage-users.blade.php -->

@extends('layouts.auth')

@section('content')
<div class="row justify-content-center user-list mt-5">
    <div class="col-md-11">
        <h2>User List</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <table class="main-users table table-bordered">
            <thead>
                <tr>
                    <th class="text-nowrap">#</th>
                    <th class="text-nowrap">Name</th>
                    <th class="text-nowrap">Email</th>
                    <th class="text-nowrap">Role</th>
                    <th class="text-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp

                @foreach ($users as $user)
                    <tr>
                        <td class="text-nowrap">{{ $i++ }}</td>
                        <td class="text-nowrap">{{ $user->name }}</td>
                        <td class="text-nowrap">{{ $user->email }}</td>
                        <td class="text-nowrap">
                            @switch($user->role_as)
                                @case(0)
                                    User
                                    @break
                                @case(1)
                                    <span class="badge badge-primary">Admin</span>
                                    @break
                                @case(2)
                                    <span class="badge badge-info">Accountant</span>
                                    @break
                                @case(3)
                                    <span class="badge badge-info">BDM</span>
                                    @break
                                @case(4)
                                    <span class="badge badge-info">Marketing</span>
                                    @break
                            @endswitch
                        </td>
                        <td class="d-flex justify-content-between align-items-center flex-wrap">
                            <form method="POST" action="{{ route('user.change-role', $user->id) }}" class="mb-2 mr-2">
                                @csrf
                                <div class="form-group">
                                    <label for="role_as">Change Role</label>
                                    <select name="role_as" id="role_as" class="form-control">
                                        <option value="0" {{ $user->role_as == 0 ? 'selected' : '' }}>User</option>
                                        <option value="1" {{ $user->role_as == 1 ? 'selected' : '' }}>Admin</option>
                                        <option value="2" {{ $user->role_as == 2 ? 'selected' : '' }}>Accountant</option>
                                        <option value="3" {{ $user->role_as == 3 ? 'selected' : '' }}>BDM</option>
                                        <option value="4" {{ $user->role_as == 4 ? 'selected' : '' }}>Marketing</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm btn-block">Change Role</button>
                            </form>
                            <div class="mb-2 mr-2">
                                <form method="POST" action="{{ route('delete-user', $user->id) }}" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm btn-block" style="overflow: hidden;">Delete</button>
                                </form>
                            </div>
                            <div class="mb-2 mr-2">
                                <form method="POST" action="{{ route('deactivate-user', $user->id) }}" class="d-inline" onsubmit="return confirm('Are you sure you want to deactivate this user?')">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-warning btn-sm btn-block" style="overflow: hidden;">Deactivate</button>
                                </form>
                            </div>
                            <div>
                                <form method="POST" action="{{ route('reactivate-user', $user->id) }}" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to reactivate this user?')">Reactivate</button>
                                </form>
                            </div>
                        </td>
                        
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $users->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection
