<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mimi Figure Shop</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    @yield('css')
</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="/">Mimi Shop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ml-auto">
                    {{-- if not login show this menu --}}
                    @if(auth()->user() == null || empty(auth()->user()))
                        <li class="nav-item">
                            <a class="nav-link" href="/Login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/Register">Register</a>
                        </li>
                    @elseif(!empty(auth()->user()) && auth()->user()->role == 'Member')
                        <li class="nav-item">
                            <a class="nav-link" href="Feedback">Feedback</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{url('Cart')}}>My Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{url('TransactionHistory')}}>My Transaction</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{url('Profile')}}>Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{url('doLogout')}}>Logout</a>
                        </li>
                    @elseif(!empty(auth()->user()) && auth()->user()->role == 'Admin')
                        <li class="nav-item">
                            <a class="nav-link" href="/Admin/Feedback">Manage Feedback</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{url('Admin/User')}}>Manage User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{url('Admin/Figure')}}>Manage Figure</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/Admin/Category">Manage Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{url('TransactionHistory')}}>Transaction</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{url('Profile')}}>Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{url('doLogout')}}>Logout</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </header>

    <main class="content">
        @yield('content')
    </main>

    <footer class="text-white bg-dark py-3 footer">
        <div class="text-center">
            &#9400; 2019 Copyright by Bluejack
        </div>
    </footer>

    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('js/all.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
    @yield('js')
</body>
</html>
