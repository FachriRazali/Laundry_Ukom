@extends('layouts.app')

@section('content')
<div class="container futuristic-container">
    <div class="header">
        <h1 class="title"><i class="fas fa-user-plus"></i> Add New User</h1>
        <a href="{{ route('users.index') }}" class="btn-glass shadow-neon">
            <i class="fas fa-arrow-left"></i> Back to Users
        </a>
    </div>

    <div class="card futuristic-card">
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label"><strong><i class="fas fa-user"></i> Name</strong></label>
                    <input type="text" name="name" class="form-control futuristic-input" placeholder="Enter full name" required>
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong><i class="fas fa-envelope"></i> Email</strong></label>
                    <input type="email" name="email" class="form-control futuristic-input" placeholder="Enter email address" required>
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong><i class="fas fa-key"></i> Password</strong></label>
                    <input type="password" name="password" class="form-control futuristic-input" placeholder="Enter secure password" required>
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong><i class="fas fa-user-tag"></i> Role</strong></label>
                    <select name="role" class="form-control futuristic-input">
                        <option value="admin">Admin</option>
                        <option value="kasir">Kasir</option>
                        <option value="owner">Owner</option>
                    </select>
                </div>

                <button type="submit" class="btn-glass btn-neon-green"><i class="fas fa-save"></i> Create User</button>
                <a href="{{ route('users.index') }}" class="btn-glass btn-neon-red"><i class="fas fa-times"></i> Cancel</a>
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
        text-align: center;
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

    /* 🚀 Input Fields */
    .futuristic-input {
        background: rgba(255, 255, 255, 0.1);
        border: none;
        color: white;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0px 5px 10px rgba(0, 255, 255, 0.2);
        transition: all 0.3s ease-in-out;
    }

    .futuristic-input:focus {
        background: rgba(0, 255, 255, 0.2);
        box-shadow: 0px 10px 20px rgba(0, 255, 255, 0.4);
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

    .btn-neon-red {
        background: rgba(255, 0, 0, 0.3);
        box-shadow: 0px 0px 15px rgba(255, 0, 0, 0.6);
    }

    .btn-neon-green:hover {
        background: rgba(0, 255, 0, 0.5);
    }

    .btn-neon-red:hover {
        background: rgba(255, 0, 0, 0.5);
    }
</style>
@endsection
