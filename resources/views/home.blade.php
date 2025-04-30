<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background: linear-gradient(135deg, #f8e8ff, #a0f1ea, #fff1f5);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            font-family: 'Poppins', sans-serif;
        }

        @keyframes gradient {
            0% { background-position: 0% 50% }
            50% { background-position: 100% 50% }
            100% { background-position: 0% 50% }
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 40px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease-in-out;
        }

        .glass-card:hover {
            transform: scale(1.01);
        }

        .card-header {
            background-color: #fd79a8;
            color: white;
            font-weight: 600;
            text-align: center;
            padding: 15px;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }

        .card-body {
            color: #2d3436;
        }

        .btn-dashboard {
            background-color: #fd79a8;
            color: white;
            font-weight: 600;
            padding: 10px 25px;
            border-radius: 30px;
            border: none;
            transition: all 0.3s ease-in-out;
            display: inline-block;
            margin-top: 20px;
        }

        .btn-dashboard:hover {
            background-color: #e84393;
            box-shadow: 0 0 12px rgba(253, 121, 168, 0.5);
        }

        .text-center {
            margin-top: 30px;
        }
    </style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
                <div class="col-md-8">
                    <div class="glass-card">
                        <div class="card-header">Dashboard</div>

                        <div class="card-body">
                            <p class="text-center">You are logged in!</p>

                            <div class="text-center">
                                <a href="{{ url('/home') }}" class="btn btn-dashboard">
                                    Go to Home
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
