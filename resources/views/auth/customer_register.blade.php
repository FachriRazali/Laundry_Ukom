@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100 futuristic-bg">
    <div class="glass-card p-4">
        <h3 class="text-center neon-text"><i class="fas fa-user-plus"></i> Register as Customer</h3>
        <p class="text-center text-muted">Create your customer account to get started.</p>

        @if(session('success'))
            <div class="alert alert-success futuristic-alert">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('customer.register') }}">
            @csrf

            <!-- 👤 Full Name -->
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <div class="input-group futuristic-input">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" name="name" class="form-control" placeholder="Enter your full name" value="{{ old('name') }}" required>
                </div>
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- 📧 Email Address -->
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <div class="input-group futuristic-input">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}" required>
                </div>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- 🔒 Password -->
            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group futuristic-input">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Enter a secure password" required>
                </div>
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- 🔄 Confirm Password -->
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <div class="input-group futuristic-input">
                    <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm your password" required>
                </div>
                @error('password_confirmation')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- 📞 Phone -->
            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <div class="input-group futuristic-input">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    <input type="text" name="phone" class="form-control" placeholder="Enter your phone number" value="{{ old('phone') }}" required>
                </div>
                @error('phone')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- ✅ Register Button -->
            <button type="submit" class="btn-glass w-100">
                <i class="fas fa-user-plus"></i> Register Now
            </button>

            <!-- 🔙 Back to Login -->
            <div class="text-center mt-3">
                <a href="{{ route('customer.login') }}" class="text-muted small">Already have an account? Login here</a>
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

    /* 🎇 Error Message */
    .error-message {
        color: #ff4c4c;
        font-size: 0.9rem;
        margin-top: 5px;
    }

    /* 🎇 Animated Success Alert */
    .futuristic-alert {
        animation: fadeIn 0.5s ease-in-out;
        background: rgba(0, 255, 64, 0.2);
        border-left: 5px solid #00ff7f;
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
