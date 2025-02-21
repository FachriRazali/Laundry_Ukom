@extends('layouts.app')

@section('content')
<div class="container futuristic-container">
    <div class="header">
        <h1 class="title"><i class="fas fa-edit"></i> Edit Transaction</h1>
        <div class="actions">
            <a href="{{ route('transactions.index') }}" class="btn-glass shadow-neon">
                <i class="fas fa-arrow-left"></i> Back to Transactions
            </a>
        </div>
    </div>

    @if(session('error'))
        <div class="alert alert-danger alert-neon" role="alert">
            <strong>⚠ Error:</strong> {{ session('error') }}
        </div>
    @endif

    <div class="transaction-form">
        <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- 🚀 Product Selection (Disabled) -->
            <div class="mb-3">
                <label class="form-label">Product</label>
                <select name="product_id" class="form-control futuristic-input" disabled>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" {{ $transaction->product_id == $product->id ? 'selected' : '' }}>
                            {{ $product->name }} - Rp {{ number_format($product->price, 0, ',', '.') }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- 🚀 Quantity (Disabled) -->
            <div class="mb-3">
                <label class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control futuristic-input" value="{{ $transaction->quantity }}" disabled>
            </div>

            <!-- 🚀 Status Selection -->
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control futuristic-input">
                    <option value="pending" {{ $transaction->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ $transaction->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="canceled" {{ $transaction->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-glass btn-neon">
                    <i class="fas fa-save"></i> Update Transaction
                </button>
                <a href="{{ route('transactions.index') }}" class="btn-glass btn-secondary">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<style>
    /* 🌟 Futuristic Glassmorphism Container */
    .futuristic-container {
        background: linear-gradient(135deg, #000428, #004e92);
        border-radius: 15px;
        padding: 30px;
        color: white;
        box-shadow: 0px 5px 15px rgba(0, 255, 255, 0.4);
        max-width: 600px;
        margin: auto;
    }

    /* 🚀 Header Section */
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

    /* 🚀 Form & Inputs */
    .transaction-form {
        padding: 20px;
        border-radius: 12px;
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(10px);
        box-shadow: 0px 5px 15px rgba(0, 255, 255, 0.2);
    }

    .form-label {
        font-weight: bold;
        color: #00e6e6;
        text-shadow: 0px 0px 8px rgba(0, 255, 255, 0.4);
    }

    .futuristic-input {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(8px);
        border: none;
        padding: 10px;
        border-radius: 8px;
        color: white;
        font-weight: bold;
        box-shadow: inset 0px 0px 8px rgba(0, 255, 255, 0.3);
    }

    .futuristic-input:focus {
        outline: none;
        box-shadow: 0px 0px 12px rgba(0, 255, 255, 0.6);
    }

    /* 🚀 Neon Buttons */
    .btn-glass {
        padding: 12px 20px;
        border-radius: 8px;
        color: white;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        box-shadow: 0px 5px 15px rgba(0, 255, 255, 0.2);
        border: none;
        transition: all 0.3s ease-in-out;
        text-align: center;
        font-weight: bold;
        display: inline-block;
        width: 100%;
        margin-top: 10px;
    }

    .btn-glass:hover {
        background: rgba(0, 255, 255, 0.3);
        transform: translateY(-2px);
        box-shadow: 0px 8px 20px rgba(0, 255, 255, 0.4);
    }

    .btn-neon {
        background: rgba(0, 255, 255, 0.4);
        box-shadow: 0px 0px 12px rgba(0, 255, 255, 0.5);
    }

    .btn-neon:hover {
        background: rgba(0, 255, 255, 0.6);
        box-shadow: 0px 0px 20px rgba(0, 255, 255, 0.8);
    }

    /* 🎇 Animated Success Alert */
    .alert-neon {
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
