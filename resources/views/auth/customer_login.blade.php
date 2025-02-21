@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100 futuristic-bg">
    <div class="glass-card p-4">
        <h3 class="text-center neon-text"><i class="fas fa-sign-in-alt"></i> Customer Login</h3>
        <p class="text-center text-muted">Sign in to access your account.</p>

        @if(session('error'))
            <div class="alert alert-danger futuristic-alert">{{ session('error') }}</div>
        @endif

        <form action="{{ route('customer.login') }}" method="POST">
            @csrf

            <!-- 📧 Email Address -->
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <div class="input-group futuristic-input">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                </div>
            </div>

            <!-- 🔒 Password -->
            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group futuristic-input">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                </div>
            </div>

            <!-- ✅ Login Button -->
            <button type="submit" class="btn-glass w-100">
                <i class="fas fa-sign-in-alt"></i> Login
            </button>

            <!-- 🔗 Register Link -->
            <div class="text-center mt-3">
                <a href="{{ route('customer.register') }}" class="text-muted small">Don't have an account? Register here</a>
            </div>
        </form>
    </div>
</div>

<!-- 🎨 Styling -->
<style>
    /* 🌌 Futuristic Background */
    .futuristic-bg {
        background: linear-gradient(135deg, #1b1e24, #2d2f35);
    }

    /* 🔹 Glassmorphic Card */
    .glass-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(12px);
        border-radius: 12px;
        padding: 30px;
        width: 400px;
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
        background: rgba(255, 0, 0, 0.2);
        border-left: 5px solid #ff4c4c;
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
