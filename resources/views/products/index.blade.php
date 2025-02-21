@extends('layouts.app')

@section('content')
<div class="container futuristic-container">
    <div class="header">
        <h1 class="title"><i class="fas fa-box"></i> Manage Products</h1>
        <div class="actions">
            <a href="{{ route('dashboard') }}" class="btn-glass shadow-neon">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
            <a href="{{ route('products.create') }}" class="btn-glass shadow-neon">
                <i class="fas fa-plus"></i> New Product
            </a>
        </div>
    </div>

    <!-- ✅ Success Notification -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show neon-alert" role="alert">
            <strong>✅ Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- 🚀 Products Table -->
    <div class="table-responsive futuristic-card">
        <table class="table table-hover align-middle futuristic-table">
            <thead class="table-header">
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Outlet</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td><strong>{{ $product->name }}</strong></td>
                        <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td>
                                    <strong>{{ $product->outlet ? $product->outlet->name : 'No Outlet Assigned' }}</strong>
                                </td>
                        <td class="text-center">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn-edit">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this product?');">
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

    <!-- 📄 Pagination -->
    <div class="pagination-container">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
</div>

<!-- 🌟 Modern Styling -->
<style>
    /* 🌌 Futuristic Background */
    .futuristic-container {
        background: linear-gradient(135deg, #1b1e24, #343a40);
        padding: 30px;
        border-radius: 15px;
        color: white;
        box-shadow: 0px 5px 15px rgba(0, 255, 255, 0.4);
        max-width: 1100px;
        margin: auto;
    }

    /* 🚀 Title & Actions */
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .title {
        font-size: 2rem;
        color: #00e6e6;
        text-shadow: 0px 0px 15px rgba(0, 255, 255, 0.6);
    }

    /* ✨ Glass Buttons */
    .btn-glass {
        padding: 10px 20px;
        border-radius: 8px;
        color: white;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        box-shadow: 0px 5px 15px rgba(0, 255, 255, 0.2);
        border: none;
        transition: all 0.3s ease-in-out;
        text-decoration: none;
    }

    .btn-glass:hover {
        background: rgba(0, 255, 255, 0.3);
        transform: translateY(-2px);
        box-shadow: 0px 8px 20px rgba(0, 255, 255, 0.4);
    }

    /* 🏆 Table Design */
    .futuristic-table {
        background: rgba(255, 255, 255, 0.08);
        border-radius: 12px;
        box-shadow: 0px 5px 15px rgba(0, 255, 255, 0.2);
        overflow: hidden;
    }

    .table-header {
        background: #00e6e6;
        color: black;
        font-weight: bold;
    }

    .futuristic-table tbody tr {
        transition: all 0.3s ease-in-out;
    }

    .futuristic-table tbody tr:hover {
        background: rgba(0, 255, 255, 0.2);
        transform: scale(1.01);
    }

    /* 🚀 Action Buttons */
    .btn-edit, .btn-delete {
        padding: 8px 15px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s ease-in-out;
        display: inline-block;
    }

    .btn-edit {
        background: #ffc107;
        color: black;
        box-shadow: 0px 5px 10px rgba(255, 193, 7, 0.3);
    }

    .btn-edit:hover {
        background: #ff9800;
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
