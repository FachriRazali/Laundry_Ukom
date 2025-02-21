@extends('layouts.app')

@section('content')
<div class="container futuristic-container">
    <div class="header">
        <h1 class="title"><i class="fas fa-edit"></i> Edit Product</h1>
        <a href="{{ route('products.index') }}" class="btn-glass shadow-neon">
            <i class="fas fa-arrow-left"></i> Back to Products
        </a>
    </div>

    <div class="futuristic-card">
        <div class="card-body">
            <form action="{{ route('products.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- 🌟 Product Name -->
                <div class="mb-3">
                    <label class="form-label"><strong>Product Name</strong></label>
                    <input type="text" name="name" class="form-control futuristic-input" value="{{ $product->name }}" required>
                </div>

                <!-- 💰 Price Input -->
                <div class="mb-3">
                    <label class="form-label"><strong>Price</strong></label>
                    <div class="input-group">
                        <span class="input-group-text futuristic-badge">Rp</span>
                        <input type="number" name="price" class="form-control futuristic-input" value="{{ $product->price }}" required>
                    </div>
                </div>

                <!-- 🏢 Select Outlet -->
                <div class="mb-3">
                    <label class="form-label"><strong>Select Outlet</strong></label>
                    <select name="outlet_id" class="form-control futuristic-input" required>
                        @foreach ($outlets as $outlet)
                            <option value="{{ $outlet->id }}" {{ $product->outlet_id == $outlet->id ? 'selected' : '' }}>
                                {{ $outlet->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- 🚀 Action Buttons -->
                <button type="submit" class="btn-glass shadow-neon"><i class="fas fa-save"></i> Save Changes</button>
                <a href="{{ route('products.index') }}" class="btn-glass shadow-red">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </form>
        </div>
    </div>
</div>

<!-- 🎨 Modern Styling -->
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

    /* 📦 Form Inputs */
    .futuristic-input {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(10px);
        border: none;
        color: white;
        padding: 10px;
        border-radius: 6px;
        transition: 0.3s;
    }

    .futuristic-input:focus {
        background: rgba(0, 255, 255, 0.2);
        box-shadow: 0px 0px 10px rgba(0, 255, 255, 0.5);
    }

    /* 💰 Price Badge */
    .futuristic-badge {
        background: #00e6e6;
        color: black;
        font-weight: bold;
        border-radius: 6px;
        padding: 10px;
    }

    /* 🚀 Buttons */
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
        display: inline-block;
        margin-right: 10px;
    }

    .btn-glass:hover {
        background: rgba(0, 255, 255, 0.3);
        transform: translateY(-2px);
        box-shadow: 0px 8px 20px rgba(0, 255, 255, 0.4);
    }

    .shadow-red {
        background: rgba(255, 64, 64, 0.2);
    }

    .shadow-red:hover {
        background: rgba(255, 64, 64, 0.4);
    }

    /* 🏆 Form Container */
    .futuristic-card {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(10px);
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0px 5px 15px rgba(0, 255, 255, 0.2);
    }
</style>
@endsection
