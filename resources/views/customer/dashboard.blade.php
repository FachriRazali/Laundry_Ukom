@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-primary"><i class="fas fa-tachometer-alt"></i> Dashboard</h2>
    <p class="lead">Welcome, <strong>{{ auth()->user()->name }}</strong>!</p>

    <div class="row g-4 mt-4">
        <!-- Admin Dashboard -->
        @if(auth()->user()->role == 'admin')
            <div class="col-md-4">
                <a href="{{ route('users.index') }}" class="card dashboard-card">
                    <div class="card-body text-center">
                        <i class="fas fa-users fa-3x text-info"></i>
                        <h5 class="mt-3">Manage Users</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('outlets.index') }}" class="card dashboard-card">
                    <div class="card-body text-center">
                        <i class="fas fa-store fa-3x text-primary"></i>
                        <h5 class="mt-3">Manage Outlets</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('products.index') }}" class="card dashboard-card">
                    <div class="card-body text-center">
                        <i class="fas fa-boxes fa-3x text-success"></i>
                        <h5 class="mt-3">Manage Products</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('transactions.index') }}" class="card dashboard-card">
                    <div class="card-body text-center">
                        <i class="fas fa-shopping-cart fa-3x text-warning"></i>
                        <h5 class="mt-3">Manage Transactions</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('customers.index') }}" class="card dashboard-card">
                    <div class="card-body text-center">
                        <i class="fas fa-user-friends fa-3x text-secondary"></i>
                        <h5 class="mt-3">Manage Customers</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('reports.index') }}" class="card dashboard-card">
                    <div class="card-body text-center">
                        <i class="fas fa-file-alt fa-3x text-danger"></i>
                        <h5 class="mt-3">Generate Reports</h5>
                    </div>
                </a>
            </div>

        <!-- Kasir Dashboard -->
        @elseif(auth()->user()->role == 'kasir')
            <div class="col-md-4">
                <a href="{{ route('transactions.create') }}" class="card dashboard-card">
                    <div class="card-body text-center">
                        <i class="fas fa-plus-circle fa-3x text-warning"></i>
                        <h5 class="mt-3">Enter Transactions</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('customers.index') }}" class="card dashboard-card">
                    <div class="card-body text-center">
                        <i class="fas fa-user-friends fa-3x text-secondary"></i>
                        <h5 class="mt-3">Manage Customers</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('reports.index') }}" class="card dashboard-card">
                    <div class="card-body text-center">
                        <i class="fas fa-file-alt fa-3x text-danger"></i>
                        <h5 class="mt-3">Generate Reports</h5>
                    </div>
                </a>
            </div>

        <!-- Owner Dashboard -->
        @elseif(auth()->user()->role == 'owner')
            <div class="col-md-4">
                <a href="{{ route('reports.index') }}" class="card dashboard-card">
                    <div class="card-body text-center">
                        <i class="fas fa-file-alt fa-3x text-danger"></i>
                        <h5 class="mt-3">View Reports</h5>
                    </div>
                </a>
            </div>

        <!-- Customer Dashboard -->
        @elseif(auth()->guard('customer')->check())
            <div class="col-md-4">
                <a href="{{ route('customer.orders') }}" class="card dashboard-card">
                    <div class="card-body text-center">
                        <i class="fas fa-shopping-cart fa-3x text-success"></i>
                        <h5 class="mt-3">My Orders</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('customer.profile') }}" class="card dashboard-card">
                    <div class="card-body text-center">
                        <i class="fas fa-user fa-3x text-primary"></i>
                        <h5 class="mt-3">My Profile</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <form action="{{ route('customer.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        @endif
    </div>
</div>

<style>
    .dashboard-card {
        text-decoration: none;
        border-radius: 12px;
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
    }

    .dashboard-card .card-body {
        padding: 30px;
        border-radius: 12px;
        background: white;
    }

    .dashboard-card i {
        transition: color 0.2s ease-in-out;
    }

    .dashboard-card:hover i {
        color: #007bff !important;
    }
</style>
@endsection
