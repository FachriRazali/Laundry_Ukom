@extends('layouts.app')

@section('content')
<div class="container futuristic-container">
    <!-- 🌟 Header Section -->
    <div class="header">
        <h1 class="title"><i class="fas fa-file-alt"></i> Owner Reports</h1>
        <div class="actions">
            <a href="{{ route('dashboard') }}" class="btn-glass shadow-neon">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
            <form action="{{ route('owner.reports.generate') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn-glass shadow-neon">
                    <i class="fas fa-file-pdf"></i> Download PDF
                </button>
            </form>
        </div>
    </div>

    <!-- 📊 Report Table -->
    <div class="table-responsive futuristic-table">
        <table class="table">
            <thead class="table-header">
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr class="table-row">
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->product->name }}</td>
                        <td>{{ $transaction->quantity }}</td>
                        <td>Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge badge-{{ $transaction->status }}">
                                {{ ucfirst($transaction->status) }}
                            </span>
                        </td>
                        <td>{{ $transaction->created_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- 🔄 Pagination -->
    <div class="pagination-container">
        {{ $transactions->links('pagination::bootstrap-5') }}
    </div>
</div>

<!-- 🌟 Futuristic Styling -->
<style>
    /* 🔵 Futuristic Container */
    .futuristic-container {
        background: linear-gradient(135deg, #001F3F, #003366);
        border-radius: 15px;
        padding: 30px;
        color: white;
        box-shadow: 0px 5px 15px rgba(0, 255, 255, 0.4);
        max-width: 1200px;
        margin: auto;
        font-family: 'Poppins', sans-serif;
    }

    /* 🎯 Header */
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

    /* 🌟 Glassmorphism Buttons */
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

    /* 📊 Table Styling */
    .futuristic-table {
        border-radius: 10px;
        overflow: hidden;
    }

    .table {
        width: 100%;
        color: white;
        border-collapse: collapse;
        box-shadow: 0px 5px 15px rgba(0, 255, 255, 0.3);
    }

    .table-header {
        background: rgba(255, 255, 255, 0.1);
        text-align: left;
        font-size: 1rem;
        color: #00e6e6;
        text-transform: uppercase;
    }

    .table-row {
        background: rgba(255, 255, 255, 0.08);
        transition: all 0.3s ease-in-out;
    }

    .table-row:hover {
        background: rgba(0, 255, 255, 0.2);
        box-shadow: 0px 0px 15px rgba(0, 255, 255, 0.3);
    }

    /* 🔥 Status Badges */
    .badge-pending {
        background: #ffcc00;
        color: black;
        padding: 5px 12px;
        border-radius: 5px;
        box-shadow: 0px 0px 8px #ffcc00;
    }

    .badge-completed {
        background: #00ff7f;
        color: black;
        padding: 5px 12px;
        border-radius: 5px;
        box-shadow: 0px 0px 8px #00ff7f;
    }

    .badge-canceled {
        background: #ff4040;
        color: white;
        padding: 5px 12px;
        border-radius: 5px;
        box-shadow: 0px 0px 8px #ff4040;
    }

    /* 🔄 Pagination */
    .pagination-container {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }
</style>
@endsection
