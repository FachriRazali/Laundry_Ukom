<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laundry Management System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Custom Styles -->
    <style>
        /* 🌌 Futuristic Background */
        body {
            background: linear-gradient(135deg, #1b1e24, #2d2f35);
            color: white;
            font-family: 'Poppins', sans-serif;
        }

        /* 🔷 Glass Navbar */
        .navbar {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0px 8px 20px rgba(0, 255, 255, 0.2);
        }

        .navbar-brand {
            font-weight: bold;
            text-shadow: 0px 0px 10px rgba(0, 255, 255, 0.6);
        }

        .navbar-nav .nav-link {
            color: white !important;
            font-size: 1rem;
            transition: 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: #00e6e6 !important;
            text-shadow: 0px 0px 8px rgba(0, 255, 255, 0.8);
        }

        /* 🚀 Glass Container */
        .futuristic-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            padding: 30px;
            margin-top: 20px;
            box-shadow: 0px 5px 15px rgba(0, 255, 255, 0.3);
        }

        /* 🔥 Button Styles */
        .btn-glass {
            background: rgba(0, 255, 255, 0.2);
            border: none;
            padding: 10px 15px;
            border-radius: 6px;
            font-weight: bold;
            color: white;
            transition: 0.3s;
            text-decoration: none;
            box-shadow: 0px 5px 15px rgba(0, 255, 255, 0.2);
        }

        .btn-glass:hover {
            background: rgba(0, 255, 255, 0.4);
            box-shadow: 0px 8px 20px rgba(0, 255, 255, 0.4);
            transform: translateY(-2px);
        }

        /* 🚀 Logout Button */
        .logout-btn {
            border: none;
            background: none;
            color: white;
            font-size: 1rem;
            transition: 0.3s;
        }

        .logout-btn:hover {
            color: #00e6e6;
            text-shadow: 0px 0px 10px rgba(0, 255, 255, 0.8);
        }

    </style>
</head>
<body>

    <!-- 🔷 Glassmorphic Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/dashboard">
                <i class="fas fa-tshirt"></i> Laundry Management
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" id="logout-form">
                            @csrf
                            <button type="submit" class="logout-btn">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- 🚀 Main Content -->
    <div class="container futuristic-container">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
