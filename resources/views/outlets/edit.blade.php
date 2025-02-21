@extends('layouts.app')

@section('content')
<div class="container futuristic-container">
    <div class="header">
        <h1 class="title"><i class="fas fa-edit"></i> Edit Outlet</h1>
        <div class="actions">
            <a href="{{ route('outlets.index') }}" class="btn-glass shadow-neon">
                <i class="fas fa-arrow-left"></i> Back to Outlets
            </a>
        </div>
    </div>

    <div class="card futuristic-card">
        <div class="card-body">
            <form action="{{ route('outlets.update', $outlet->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- 🌟 Outlet Name -->
                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-store"></i> <strong>Outlet Name</strong></label>
                    <input type="text" name="name" class="form-control futuristic-input" value="{{ $outlet->name }}" required>
                </div>

                <!-- 🌟 Address -->
                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-map-marker-alt"></i> <strong>Address</strong></label>
                    <textarea name="address" class="form-control futuristic-input" rows="3" required>{{ $outlet->address }}</textarea>
                </div>

                <!-- 🌟 Action Buttons -->
                <div class="form-actions">
                    <button type="submit" class="btn-save"><i class="fas fa-save"></i> Save Changes</button>
                    <a href="{{ route('outlets.index') }}" class="btn-cancel"><i class="fas fa-times"></i> Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- 🌟 Custom CSS -->
<style>
    /* 🌌 Futuristic Background */
    .futuristic-container {
        background: linear-gradient(135deg, #1b1e24, #343a40);
        padding: 30px;
        border-radius: 15px;
        color: white;
        box-shadow: 0px 5px 15px rgba(0, 255, 255, 0.4);
        max-width: 800px;
        margin: auto;
    }

    /* 🔥 Title */
    .title {
        font-size: 2rem;
        font-weight: bold;
        color: #00e6e6;
        text-shadow: 0px 0px 10px rgba(0, 255, 255, 0.7);
    }

    /* 🚀 Glass Button */
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

    /* 🚀 Input Fields */
    .futuristic-input {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 8px;
        color: white;
        padding: 12px;
        transition: all 0.3s ease-in-out;
    }

    .futuristic-input:focus {
        border-color: #00e6e6;
        box-shadow: 0px 0px 10px rgba(0, 255, 255, 0.4);
    }

    /* 🎯 Buttons */
    .btn-save, .btn-cancel {
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s ease-in-out;
        display: inline-block;
        margin-right: 10px;
    }

    .btn-save {
        background: #00e6e6;
        color: black;
        box-shadow: 0px 5px 10px rgba(0, 255, 255, 0.3);
    }

    .btn-save:hover {
        background: #00cccc;
        color: white;
        transform: scale(1.1);
    }

    .btn-cancel {
        background: #ff4040;
        color: white;
        box-shadow: 0px 5px 10px rgba(255, 64, 64, 0.3);
    }

    .btn-cancel:hover {
        background: #cc0000;
        transform: scale(1.1);
    }
</style>
@endsection
