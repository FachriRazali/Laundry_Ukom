@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-primary"><i class="fas fa-shopping-cart"></i> My Orders</h2>
    <p class="lead">Here you can track your laundry orders.</p>

    <div class="alert alert-info">🚀 Order tracking feature is coming soon!</div>

    <a href="{{ route('customer.dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
</div>
@endsection
