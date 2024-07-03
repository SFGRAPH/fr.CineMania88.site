<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Mon Site')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
    <link rel="stylesheet" href="{{ asset('css/categorieAccordeon.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.1/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet"> 
</head>
<body>
    <header>
        @include('partials.nav')
        <div class="loginContainer">
            <nav>
                <!-- Other navigation items -->
                @guest
                    <a href="{{ route('login') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 50 50">
                            <path id="Icon_material-account-circle" data-name="Icon material-account-circle" d="M28.333,3.333a25,25,0,1,0,25,25A25.009,25.009,0,0,0,28.333,3.333Zm0,7.5a7.5,7.5,0,1,1-7.5,7.5,7.49,7.49,0,0,1,7.5-7.5Zm0,35.5a18,18,0,0,1-15-8.05c.075-4.975,10-7.7,15-7.7,4.975,0,14.925,2.725,15,7.7A18,18,0,0,1,28.333,46.333Z" transform="translate(-3.333 -3.333)" fill="#af1b1d"/>
                        </svg>
                    </a>
                    <a href="{{ route('cart.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="38.18" viewBox="0 0 59.381 57">
                            <g id="Icon_feather-shopping-cart" data-name="Icon feather-shopping-cart" transform="translate(1.833 1.833)">
                                <path id="Tracé_1" data-name="Tracé 1" d="M16.667,35A1.667,1.667,0,1,1,15,33.333,1.667,1.667,0,0,1,16.667,35Z" transform="translate(5.5 15)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="7"/>
                                <path id="Tracé_2" data-name="Tracé 2" d="M35,35a1.667,1.667,0,1,1-1.667-1.667A1.667,1.667,0,0,1,35,35Z" transform="translate(15.714 15)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="7"/>
                                <path id="Tracé_3" data-name="Tracé 3" d="M1.667,1.667H11.19l6.381,35.706a4.921,4.921,0,0,0,4.762,4.293H45.476a4.921,4.921,0,0,0,4.762-4.293L54.048,15H13.571" transform="translate(0 0)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="7"/>
                            </g>
                        </svg>
                    </a>
                    <a href="{{ route('register') }}">Inscription</a>
                @else
                    <a href="{{ route('account') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 50 50">
                            <path id="Icon_material-account-circle" data-name="Icon material-account-circle" d="M28.333,3.333a25,25,0,1,0,25,25A25.009,25.009,0,0,0,28.333,3.333Zm0,7.5a7.5,7.5,0,1,1-7.5,7.5,7.49,7.49,0,0,1,7.5-7.5Zm0,35.5a18,18,0,0,1-15-8.05c.075-4.975,10-7.7,15-7.7,4.975,0,14.925,2.725,15,7.7A18,18,0,0,1,28.333,46.333Z" transform="translate(-3.333 -3.333)" fill="#af1b1d"/>
                        </svg>
                    </a>
                    <a href="{{ route('cart.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="38.18" viewBox="0 0 59.381 57">
                            <g id="Icon_feather-shopping-cart" data-name="Icon feather-shopping-cart" transform="translate(1.833 1.833)">
                                <path id="Tracé_1" data-name="Tracé 1" d="M16.667,35A1.667,1.667,0,1,1,15,33.333,1.667,1.667,0,0,1,16.667,35Z" transform="translate(5.5 15)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="7"/>
                                <path id="Tracé_2" data-name="Tracé 2" d="M35,35a1.667,1.667,0,1,1-1.667-1.667A1.667,1.667,0,0,1,35,35Z" transform="translate(15.714 15)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="7"/>
                                <path id="Tracé_3" data-name="Tracé 3" d="M1.667,1.667H11.19l6.381,35.706a4.921,4.921,0,0,0,4.762,4.293H45.476a4.921,4.921,0,0,0,4.762-4.293L54.048,15H13.571" transform="translate(0 0)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="7"/>
                            </g>
                        </svg>
                    </a>
                    <form action="{{ route('user.logout') }}" method="POST">
                         @csrf
                         <button class="logout" type="submit">Déconnexion</button>
                    </form>
                @endguest
            </nav>
        </div>            
    </header>
    <main>



        @yield('content')
    </main>
    <footer>
        @include('partials.footer')
    </footer>

    <script src="{{ asset('js/nav.js') }}"></script>

</body>
</html>
