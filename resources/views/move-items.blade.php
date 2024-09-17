<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Move Items</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QLZPI4pv7Q0RM7Fj3DSz0bIG/UX0BgpIV2yQw5HFAjA6YoVZ1B7e1BX3WfLelgX6" crossorigin="anonymous">
</head>
<body>
@extends('layouts.auth')

@section('content')
<div class="container">
    <h1>Move Items</h1>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('warehouses.move-items') }}" method="POST">
        @csrf
        <div class="mb-3" style="margin-bottom: 20px">
            <label for="item_id" class="form-label">Select Item</label>
            <select class="form-control" id="item_id" name="item_id" required>
                @foreach($items as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3" style="margin-bottom: 20px">
            <label for="from_warehouse_id" class="form-label">From Warehouse</label>
            <select class="form-control" id="from_warehouse_id" name="from_warehouse_id" required>
                @foreach($warehouses as $warehouse)
                    <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3" style="margin-bottom: 20px">
            <label for="to_warehouse_id" class="form-label">To Warehouse</label>
            <select class="form-control" id="to_warehouse_id" name="to_warehouse_id" required>
                @foreach($warehouses as $warehouse)
                    <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3" style="margin-bottom: 20px">
            <label for="move_date" class="form-label">Move Date</label>
            <input type="date" class="form-control" id="move_date" name="move_date" required>
        </div>

        <div class="mb-3" style="margin-bottom: 20px">
            <label for="move_time" class="form-label">Move Time</label>
            <input type="time" class="form-control" id="move_time" name="move_time" required>
        </div>

        <div class="mt-5" style="margin-top: 20px; height:100vh">
            <button type="submit" class="btn btn-primary">Move Item</button>
        </div>
    </form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
