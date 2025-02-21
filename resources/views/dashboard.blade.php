@extends('layouts.app')

@section('content')
<div class="dashboard-container">
    <!-- 🌟 Header Section -->
    <div class="dashboard-header">
        <h1 class="dashboard-title"><i class="fas fa-tachometer-alt"></i> <strong>{{ auth()->user()->role }}</strong> Dashboard</h1>
        <p class="dashboard-welcome">Welcome back, <strong>{{ auth()->user()->name }}</strong>!</p>
    </div>

    <!-- 📌 Dashboard Grid -->
    <div class="dashboard-grid">
        @if(auth()->user()->role == 'admin')
            <a href="{{ route('users.index') }}" class="dashboard-card">
                <i class="fas fa-users"></i>
                <span>Manage Users</span>
            </a>
            <a href="{{ route('admin.customers.index') }}" class="dashboard-card">
                <i class="fas fa-user-friends"></i>
                <span>Manage Customers</span>
            </a>
            <a href="{{ route('outlets.index') }}" class="dashboard-card">
                <i class="fas fa-store"></i>
                <span>Manage Outlets</span>
            </a>
            <a href="{{ route('products.index') }}" class="dashboard-card">
                <i class="fas fa-boxes"></i>
                <span>Manage Products</span>
            </a>
            <a href="{{ route('admin.transactions.index') }}" class="dashboard-card">
                <i class="fas fa-shopping-cart"></i>
                <span>Manage Transactions</span>
            </a>
            <a href="{{ route('admin.reports.index') }}" class="dashboard-card">
                <i class="fas fa-file-alt"></i>
                <span>Generate Reports</span>
            </a>
        @elseif(auth()->user()->role == 'kasir')
            <a href="{{ route('kasir.customers.index') }}" class="dashboard-card">
                <i class="fas fa-user-friends"></i>
                <span>Manage Customers</span>
            </a>
            <a href="{{ route('kasir.transactions.index') }}" class="dashboard-card">
                <i class="fas fa-plus-circle"></i>
                <span>Enter Transactions</span>
            </a>
            <a href="{{ route('kasir.reports.index') }}" class="dashboard-card">
                <i class="fas fa-file-alt"></i>
                <span>Generate Reports</span>
            </a>
        @elseif(auth()->user()->role == 'owner')
            <a href="{{ route('owner.reports.index') }}" class="dashboard-card">
                <i class="fas fa-file-alt"></i>
                <span>View Reports</span>
            </a>
        @endif
    </div>
</div>

<!-- 🌟 Modern Admin Dashboard Styling -->
<style>
    /* 🔵 Dashboard Container */
    .dashboard-container {
        background: linear-gradient(135deg, #1a1a2e, #16213e);
        border-radius: 15px;
        padding: 30px;
        color: white;
        max-width: 1200px;
        margin: auto;
        font-family: 'Poppins', sans-serif;
        text-align: center;
        box-shadow: 0px 5px 15px rgba(0, 255, 255, 0.4);
    }

    /* 🚀 Dashboard Header */
    .dashboard-header {
        margin-bottom: 30px;
    }

    .dashboard-title {
        font-size: 2.5rem;
        text-shadow: 0px 0px 15px rgba(0, 255, 255, 0.6);
    }

    .dashboard-welcome {
        font-size: 1.2rem;
        color: #ddd;
    }

    /* 🔥 Dashboard Grid */
    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 20px;
        justify-items: center;
    }

    /* 🎯 Dashboard Card */
    .dashboard-card {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(10px);
        border-radius: 12px;
        padding: 25px;
        text-decoration: none;
        text-align: center;
        color: white;
        font-size: 1.2rem;
        font-weight: bold;
        display: flex;
        flex-direction: column;
        align-items: center;
        box-shadow: 0px 5px 15px rgba(0, 255, 255, 0.2);
        transition: all 0.3s ease-in-out;
        width: 100%;
    }

    .dashboard-card i {
        font-size: 2.8rem;
        margin-bottom: 12px;
        transition: color 0.2s ease-in-out;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 10px 30px rgba(0, 255, 255, 0.4);
        background: rgba(0, 255, 255, 0.3);
    }

    .dashboard-card:hover i {
        color: #00e6e6;
    }
</style>
@endsection
