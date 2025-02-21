@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- 🚀 Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="dashboard-title"><i class="fas fa-store"></i> Manage Outlets</h2>
        <div>
            <a href="{{ route('dashboard') }}" class="btn btn-outline-light btn-glass">
                <i class="fas fa-arrow-left"></i> Dashboard
            </a>
            <a href="{{ route('outlets.create') }}" class="btn btn-primary btn-glass">
                <i class="fas fa-plus"></i> New Outlet
            </a>
        </div>
    </div>

    <!-- ✅ Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show neon-alert" role="alert">
            <strong>✅ Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- 🌟 Outlets Table -->
    <div class="card futuristic-card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table futuristic-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Outlet Name</th>
                            <th>Address</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($outlets as $outlet)
                            <tr>
                                <td>{{ $outlet->id }}</td>
                                <td><strong>{{ $outlet->name }}</strong></td>
                                <td>{{ $outlet->address }}</td>
                                <td class="text-center">
                                    <a href="{{ route('outlets.edit', $outlet->id) }}" class="btn-edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('outlets.destroy', $outlet->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this outlet?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn-delete">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- 🚀 Pagination -->
            <div class="d-flex justify-content-center mt-3">
                {{ $outlets->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

<!-- 🌟 Custom CSS -->
<style>
    /* 🌌 Futuristic Background */
    .container-fluid {
        background: linear-gradient(135deg, #1b1e24, #343a40);
        padding: 30px;
        border-radius: 15px;
        color: white;
        box-shadow: 0px 5px 15px rgba(0, 255, 255, 0.4);
    }

    /* 🔥 Dashboard Title */
    .dashboard-title {
        font-size: 2rem;
        font-weight: bold;
        color: #00e6e6;
        text-shadow: 0px 0px 10px rgba(0, 255, 255, 0.7);
    }

    /* 🎭 Glass Button Effect */
    .btn-glass {
        padding: 10px 20px;
        border-radius: 8px;
        color: white;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        box-shadow: 0px 5px 15px rgba(0, 255, 255, 0.2);
        border: none;
        transition: all 0.3s ease-in-out;
    }

    .btn-glass:hover {
        background: rgba(0, 255, 255, 0.3);
        transform: translateY(-2px);
        box-shadow: 0px 8px 20px rgba(0, 255, 255, 0.4);
    }

    /* 📜 Table Styling */
    .futuristic-table {
        background: rgba(255, 255, 255, 0.08);
        border-radius: 10px;
        overflow: hidden;
        color: white;
        box-shadow: 0px 5px 15px rgba(0, 255, 255, 0.2);
    }

    .futuristic-table th {
        background: rgba(0, 255, 255, 0.2);
        padding: 12px;
    }

    .futuristic-table tbody tr {
        transition: all 0.3s ease-in-out;
    }

    .futuristic-table tbody tr:hover {
        background: rgba(0, 255, 255, 0.2);
        transform: scale(1.02);
    }

    /* 🎨 Edit & Delete Buttons */
    .btn-edit, .btn-delete {
        padding: 6px 12px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s ease-in-out;
    }

    .btn-edit {
        background: #00e6e6;
        color: black;
        box-shadow: 0px 5px 10px rgba(0, 255, 255, 0.3);
    }

    .btn-edit:hover {
        background: #00cccc;
        color: white;
        transform: scale(1.1);
    }

    .btn-delete {
        background: #ff4040;
        color: white;
        box-shadow: 0px 5px 10px rgba(255, 64, 64, 0.3);
    }

    .btn-delete:hover {
        background: #cc0000;
        transform: scale(1.1);
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
