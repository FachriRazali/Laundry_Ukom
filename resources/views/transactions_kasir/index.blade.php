@extends('layouts.app')

@section('content')
<div class="container futuristic-container">
    <div class="header">
        <h1 class="title"><i class="fas fa-shopping-cart"></i> Admin Transactions</h1>
        <div class="actions">
            <a href="{{ route('dashboard') }}" class="btn-glass shadow-neon">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
            <a href="{{ route('kasir.transactions.create') }}" class="btn-glass btn-create shadow-neon">
                <i class="fas fa-plus"></i> New Transaction
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show neon-alert" role="alert">
            <strong>✅ Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="transactions-container">
        @foreach ($transactions as $transaction)
            <div class="transaction-card">
                <div class="transaction-info">
                    <h5>💳 Transaction #{{ $transaction->id }}</h5>
                    <p><strong>User:</strong> {{ $transaction->user->name }}</p>
                    <p><strong>Product:</strong> {{ $transaction->product->name }}</p>
                    <p><strong>Quantity:</strong> {{ $transaction->quantity }}</p>
                    <p><strong>Total Price:</strong> Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</p>
                    <p><strong>Status:</strong> 
                        <span class="badge 
                            {{ $transaction->status == 'pending' ? 'badge-warning' : '' }}
                            {{ $transaction->status == 'completed' ? 'badge-success' : '' }}
                            {{ $transaction->status == 'canceled' ? 'badge-danger' : '' }}">
                            {{ ucfirst($transaction->status) }}
                        </span>
                    </p>
                </div>

                <!-- 🎯 Edit Button -->
                <div class="transaction-actions">
                    <a href="{{ route('kasir.transactions.edit', $transaction->id) }}" class="btn-edit">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    {{ $transactions->links('pagination::bootstrap-5') }}
</div>

<style>
    /* 🌟 Futuristic Container */
    .futuristic-container {
        background: linear-gradient(135deg, #000428, #004e92);
        border-radius: 15px;
        padding: 30px;
        color: white;
        box-shadow: 0px 5px 15px rgba(0, 255, 255, 0.4);
        max-width: 1200px;
        margin: auto;
    }

    /* 🚀 Title & Header */
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

    /* 💳 Transaction Cards */
    .transactions-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
    }

    .transaction-card {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(10px);
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0px 5px 15px rgba(0, 255, 255, 0.2);
        transition: all 0.3s ease-in-out;
    }

    .transaction-card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 10px 30px rgba(0, 255, 255, 0.4);
    }

    .transaction-info h5 {
        font-size: 1.3rem;
        margin-bottom: 10px;
        color: #00e6e6;
    }

    /* 🚀 Neon Buttons */
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

    /* ✨ Edit Button */
    .btn-edit {
        display: block;
        text-align: center;
        margin-top: 10px;
        padding: 8px 15px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(8px);
        border-radius: 6px;
        color: #00e6e6;
        text-decoration: none;
        font-weight: bold;
        transition: 0.3s;
        box-shadow: 0px 4px 8px rgba(0, 255, 255, 0.3);
    }

    .btn-edit:hover {
        background: rgba(0, 255, 255, 0.3);
        color: white;
        box-shadow: 0px 6px 12px rgba(0, 255, 255, 0.5);
    }

    /* ✨ New Transaction Button */
    .btn-create {
        margin-left: 10px;
        background: rgba(0, 255, 255, 0.3);
        color: white;
        font-weight: bold;
        text-transform: uppercase;
        transition: all 0.3s ease-in-out;
    }

    .btn-create:hover {
        background: rgba(0, 255, 255, 0.5);
        box-shadow: 0px 8px 20px rgba(0, 255, 255, 0.5);
        transform: translateY(-3px);
    }

    /* 🔥 Status Badges */
    .badge-warning {
        background: #ffcc00;
        color: black;
        padding: 5px 12px;
        border-radius: 5px;
        box-shadow: 0px 0px 8px #ffcc00;
    }

    .badge-success {
        background: #00ff7f;
        color: black;
        padding: 5px 12px;
        border-radius: 5px;
        box-shadow: 0px 0px 8px #00ff7f;
    }

    .badge-danger {
        background: #ff4040;
        color: white;
        padding: 5px 12px;
        border-radius: 5px;
        box-shadow: 0px 0px 8px #ff4040;
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
