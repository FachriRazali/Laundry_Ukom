@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-primary"><i class="fas fa-user"></i> My Profile</h2>
    <p class="lead">Update your profile information here.</p>

    <div class="alert alert-info">🚀 Profile management feature is coming soon!</div>

    <a href="{{ route('customer.dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
</div>
@endsection
