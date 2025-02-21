@extends('layouts.app')

@section('content')
<div class="container futuristic-container">
    <div class="header">
        <h1 class="title"><i class="fas fa-user-edit"></i> Edit Customer</h1>
        <div class="actions">
            <a href="{{ route('customers.index') }}" class="btn-glass shadow-neon">
                <i class="fas fa-arrow-left"></i> Back to Customers
            </a>
        </div>
    </div>

    <div class="card futuristic-card">
        <div class="card-body">
            <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label"><strong>Name</strong></label>
                    <input type="text" name="name" class="form-control futuristic-input" value="{{ $customer->name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Email</strong></label>
                    <input type="email" name="email" class="form-control futuristic-input" value="{{ $customer->email }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Phone</strong></label>
                    <input type="text" name="phone" class="form-control futuristic-input" value="{{ $customer->phone }}">
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Address</strong></label>
                    <textarea name="address" class="form-control futuristic-input">{{ $customer->address }}</textarea>
                </div>

                <button type="submit" class="btn-glass btn-neon-green"><i class="fas fa-save"></i> Update Customer</button>
                <a href="{{ route('customers.index') }}" class="btn-glass btn-neon-red"><i class="fas fa-times"></i> Cancel</a>
            </form>
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
        max-width: 700px;
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

    /* 🚀 Glassmorphism Inputs */
    .futuristic-input {
        background: rgba(255, 255, 255, 0.1);
        border: none;
        color: white;
        padding: 12px;
        border-radius: 8px;
        box-shadow: inset 0px 0px 8px rgba(0, 255, 255, 0.3);
        transition: all 0.3s ease-in-out;
    }

    .futuristic-input:focus {
        background: rgba(255, 255, 255, 0.2);
        box-shadow: inset 0px 0px 15px rgba(0, 255, 255, 0.5);
        outline: none;
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

    /* 🚀 Neon Buttons */
    .btn-neon-green {
        background: rgba(0, 255, 0, 0.3);
        box-shadow: 0px 0px 15px rgba(0, 255, 0, 0.6);
    }

    .btn-neon-green:hover {
        background: rgba(0, 255, 0, 0.5);
    }

    .btn-neon-red {
        background: rgba(255, 0, 0, 0.3);
        box-shadow: 0px 0px 15px rgba(255, 0, 0, 0.6);
    }

    .btn-neon-red:hover {
        background: rgba(255, 0, 0, 0.5);
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
