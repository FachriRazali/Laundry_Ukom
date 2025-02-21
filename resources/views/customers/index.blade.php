@extends('layouts.app')

@section('content')
<div class="container futuristic-container">
    <div class="header">
        <h1 class="title"><i class="fas fa-users"></i> Manage Customers</h1>
        <div class="actions">
            <a href="{{ route('dashboard') }}" class="btn-glass shadow-neon">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
            <a href="{{ route('customers.create') }}" class="btn-glass btn-neon-green">
                <i class="fas fa-user-plus"></i> New Customer
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show neon-alert" role="alert">
            <strong>✅ Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card futuristic-card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table futuristic-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $customer->id }}</td>
                                <td><strong>{{ $customer->name }}</strong></td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ $customer->address }}</td>
                                <td class="text-center">
                                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this customer?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-3">
                {{ $customers->links() }}
            </div>
        </div>
    </div>
</div>

<style>
    /* 🌟 Futuristic Container */
    .futuristic-container {
        background: linear-gradient(135deg, #000428, #004e92);
        border-radius: 15px;
        padding: 30px;
        color: white;
        box-shadow: 0px 5px 15px rgba(0, 255, 255, 0.4);
        max-width: 1000px;
        margin: auto;
    }

    /* 🚀 Header */
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .title {
        font-size: 2rem;
        text-shadow: 0px 0px 15px rgba(0, 255, 255, 0.6);
    }

    /* 🚀 Glassmorphism Card */
    .futuristic-card {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(10px);
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0px 5px 15px rgba(0, 255, 255, 0.2);
        transition: all 0.3s ease-in-out;
    }

    /* 🚀 Futuristic Table */
    .futuristic-table {
        width: 100%;
        border-collapse: collapse;
        background: rgba(255, 255, 255, 0.1);
        color: white;
        text-align: left;
    }

    .futuristic-table th {
        padding: 15px;
        background: rgba(0, 255, 255, 0.2);
        text-align: center;
    }

    .futuristic-table td {
        padding: 15px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .futuristic-table tr:hover {
        background: rgba(0, 255, 255, 0.2);
        transition: 0.3s;
    }

    /* 🚀 Glassmorphism Buttons */
    .btn-glass {
        padding: 10px 20px;
        border-radius: 8px;
        color: white;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        box-shadow: 0px 5px 15px rgba(0, 255, 255, 0.2);
        border: none;
        transition: all 0.3s ease-in-out;
        display: inline-block;
        text-decoration: none;
    }

    .btn-glass:hover {
        background: rgba(0, 255, 255, 0.3);
        transform: translateY(-2px);
        box-shadow: 0px 8px 20px rgba(0, 255, 255, 0.4);
    }

    /* 🚀 Neon Colors */
    .btn-neon-green {
        background: rgba(0, 255, 0, 0.3);
        box-shadow: 0px 0px 15px rgba(0, 255, 0, 0.6);
    }

    .btn-neon-green:hover {
        background: rgba(0, 255, 0, 0.5);
    }

    /* 🎇 Animated Success Alert */
    .neon-alert {
        animation: fadeIn 0.5s ease-in-out;
        background: rgba(0, 255, 255, 0.2);
        border-left: 5px solid #00e6e6;
        color: white;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endsection
