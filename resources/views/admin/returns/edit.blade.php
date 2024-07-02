@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Edit Return</h1>

    <form action="{{ route('admin.returns.update', $return->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="order_id">Order</label>
            <select name="order_id" id="order_id" class="form-control">
                @foreach($orders as $order)
                    <option value="{{ $order->id }}" {{ $return->order_id == $order->id ? 'selected' : '' }}>
                        {{ $order->order_number }} - {{ $order->user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="reason">Reason</label>
            <input type="text" name="reason" id="reason" class="form-control" value="{{ $return->reason }}">
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="pending" {{ $return->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ $return->status == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ $return->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                <option value="refunded" {{ $return->status == 'refunded' ? 'selected' : '' }}>Refunded</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Return</button>
    </form>
</div>
@endsection




