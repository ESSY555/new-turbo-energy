@extends('layouts.auth')
@section('content')


<form action="{{ route('funding_requests.store') }}" method="POST" class="max-w-lg mx-auto mt-[100px]">
    @csrf
    <div class="mb-4">
        <label class="block text-gray-700">Amount</label>
        <input type="text" name="amount" class="w-full p-2 border border-gray-300 rounded mt-1" required>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700">Location</label>
        <input type="text" name="location" class="w-full p-2 border border-gray-300 rounded mt-1" required>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700">Reason for Funding</label>
        <textarea name="reason" class="w-full p-2 border border-gray-300 rounded mt-1" required></textarea>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700">Initial Funding</label>
        <input type="text" name="initial_funding" class="w-full p-2 border border-gray-300 rounded mt-1" required>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700">Current Balance</label>
        <input type="text" name="current_balance" class="w-full p-2 border border-gray-300 rounded mt-1" required>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700">Date</label>
        <input type="date" name="date" class="w-full p-2 border border-gray-300 rounded mt-1" required>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700">Time</label>
        <input type="time" name="time" class="w-full p-2 border border-gray-300 rounded mt-1" required>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
</form>


@endsection
