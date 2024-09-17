@extends('layouts.auth')
@section('content')

<div class="container" style="height: 100vh">
    <div class="row">
        <!-- Add User Form -->
        <div class="col-md-6">
            <h2>Add User</h2>
            <form method="POST" action="{{ route('save-user') }}" class="needs-validation" novalidate>
                @csrf
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control text-nowrap" placeholder="Enter name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control text-nowrap" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control text-nowrap" placeholder="Enter password" required>
                </div>
                <div class="form-group">
                    <label for="role">Role:</label>
                    <select name="role" id="role" class="form-control text-nowrap" required>
                        <option value="0">User</option>
                        <option value="1">Admin</option>
                        <option value="2">Accountant</option>
                        <option value="3">cashier</option>
                        <option value="4">Marketing</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add User</button>
            </form>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    const form = document.querySelector('form');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        try {
            const response = await axios.post('{{ route('save-user') }}', new FormData(form));
            // Redirect or handle success response
            window.location.reload(); // Example reload page
        } catch (error) {
            console.error('Error:', error.response.data.error);
            // Display error in the console
            alert('An error occurred while adding the user. Check the console for details.');
        }
    });
</script>


@endsection
