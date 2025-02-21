@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100 futuristic-bg">
    <div class="glass-card p-4">
        <h3 class="text-center neon-text"><i class="fas fa-sign-in-alt"></i> Welcome Back</h3>
        <p class="text-center text-muted">Please login to continue</p>

        @if(session('error'))
            <div class="alert alert-danger futuristic-alert">{{ session('error') }}</div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <!-- 📧 Email Input -->
            <div class="mb-3">
                <label class="form-label">Email</label>
                <div class="input-group futuristic-input">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                </div>
            </div>

            <!-- 🔒 Password Input -->
            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group futuristic-input">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                </div>
            </div>

            <!-- 🚀 Login Button -->
            <button type="submit" class="btn-glass w-100">
                <i class="fas fa-sign-in-alt"></i> Login
            </button>

         

            <!-- 🆕 Register Options -->
            <div class="d-flex justify-content-center gap-3 mt-4">
                <a href="{{ route('register') }}" class="btn-glass"><i class="fas fa-user-plus"></i> Register User</a>
                <a href="{{ route('customer.register') }}" class="btn-glass"><i class="fas fa-users"></i> Register Customer</a>
            </div>
        </form>
    </div>
</div>

<!-- 🎨 Modern Styling -->
<style>
    /* 🌌 Futuristic Background */
    .futuristic-bg {
        background: linear-gradient(135deg, #1b1e24, #2d2f35);
    }

    /* 🔹 Glassmorphic Card */
    .glass-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 12px;
        padding: 30px;
        width: 380px;
        text-align: center;
        box-shadow: 0px 8px 20px rgba(0, 255, 255, 0.3);
        animation: fadeIn 0.5s ease-in-out;
    }

    /* 🔥 Neon Text */
    .neon-text {
        color: #00e6e6;
        text-shadow: 0px 0px 10px rgba(0, 255, 255, 0.6);
    }

    /* 🔹 Input Fields */
    .futuristic-input {
        background: rgba(255, 255, 255, 0.08);
        border: none;
        backdrop-filter: blur(10px);
        border-radius: 6px;
        padding: 10px;
        transition: 0.3s;
    }

    .futuristic-input:focus-within {
        background: rgba(0, 255, 255, 0.2);
        box-shadow: 0px 0px 10px rgba(0, 255, 255, 0.5);
    }

    /* 🚀 Glass Button */
    .btn-glass {
        padding: 10px 15px;
        border-radius: 6px;
        background: rgba(0, 255, 255, 0.2);
        border: none;
        color: white;
        font-weight: bold;
        transition: 0.3s;
        text-decoration: none;
    }

    .btn-glass:hover {
        background: rgba(0, 255, 255, 0.4);
        box-shadow: 0px 8px 20px rgba(0, 255, 255, 0.4);
        transform: translateY(-2px);
    }

    /* 🎇 Animated Success Alert */
    .futuristic-alert {
        animation: fadeIn 0.5s ease-in-out;
        background: rgba(255, 64, 64, 0.2);
        border-left: 5px solid #ff4040;
        color: white;
    }

    /* 🚀 Animations */
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
