<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title></title>

   
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



   
   
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])                                                            

</head>
<style>
    .custom-navbar {
    background: linear-gradient(to right,rgb(255, 255, 255),rgb(255, 255, 255)); /* Mauve doux */
    border-radius: 0 0 20px 20px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.navbar-brand {
    font-size: 1.5rem;
    font-weight: bold;
}

.link-hover {
    transition: color 0.3s ease;
}

.link-hover:hover {
    color: #6c5ce7 !important; 
    text-decoration: underline;
}

.btn-outline-success {
    background-color: #a8e6a3; 
    color: white;
    font-weight: 500;
    border-radius: 30px;
    border: none;
    transition: all 0.3s ease-in-out;
}

.btn-outline-success:hover {
    background-color: #6edb7d; 
    color: white;
    box-shadow: 0 4px 12px rgba(76, 175, 80, 0.3);
}

.btn-outline-primary {
    background-color: #91caff; 
    color: white;
    font-weight: 500;
    border-radius: 30px;
    border: none;
    transition: all 0.3s ease-in-out;
}

.btn-outline-primary:hover {
    background-color: #5aaeff; 
    color: white;
    box-shadow: 0 4px 12px rgba(30, 144, 255, 0.3);
}
/* Le lien avec le nom de l'utilisateur */
#navbarDropdown {
    background-color: #91caff; /* bleu clair */
    color: white !important;
    padding: 8px 16px;
    border-radius: 20px;
    transition: background-color 0.3s ease;
    font-weight: 500;
}

#navbarDropdown:hover {
    background-color: #5aaeff;
    color: white !important;
}


.dropdown-menu {
    border-radius: 10px;
    border: none;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.dropdown-item {
    transition: background-color 0.3s ease;
    font-weight: 500;
}

.dropdown-item:hover {
    background-color: #e0f0ff; 
    color: #007bff;
}

/* Animation douce au survol */
.btn-hover-green:hover {
    background-color: #d4edda;
    color: #28a745 !important;
}

.btn-hover-red:hover {
    background-color: #f8d7da;
    color: #dc3545 !important;
}

.dropdown-menu {
    border: none;
    border-radius: 12px;
    padding: 10px 0;
}

@import url('https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css');



</style>
<body>
    <div id="app">
    <nav class="navbar navbar-expand-md shadow-sm custom-navbar">
    <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
    <img src="{{ asset('storage/logo.png') }}" alt="Logo" height="40" width="200" class="me-2">
    </a>

        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto"></ul>

            <ul class="navbar-nav ms-auto">
                @guest
                @if (Route::has('login'))
                 <li class="nav-item">
                <a class="btn btn-outline-primary mx-1" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                <a class="btn btn-outline-success mx-1" href="{{ route('register') }}">{{ __('Créer un compte') }}</a>
                </li>
                @endif

                @else
                <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center gap-2 text-white link-hover" href="#" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                </a>


                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Déconnexion') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
