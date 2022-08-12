    <!DOCTYPE html>
    <html>

    <head>
        <title>{{ session()->get('cusName') }} | @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('../css/customerdashbord.css') }}">
        <link rel="stylesheet" href="{{ asset('../css/home.css') }}">
        <link rel="stylesheet" href="{{ asset('../css/foods.css') }}">
        <link rel="stylesheet" href="{{ asset('../css/cart.css') }}">
        <link rel="stylesheet" href="{{ asset('../css/order.css') }}">
        <script src="https://kit.fontawesome.com/bdffe34037.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
        
    </head>

    <body>
        <nav class="navbar">
            <div class="navflex container">
                <div>
                    <img src="{{ asset('../image/logo.png') }}" height="40" width="40">
                </div>
                <div>
                    <h3>Food Court</h3>
                </div>
                <div>
                    <div class="topnav" id="myTopnav">
                        <a href="{{ route('customerhome') }}"><i class="fas fa-house-user"></i> Home</a>
                        <a href="{{ route('cart') }}" class="show-cart"><i class="fas fa-cart-arrow-down"></i> Cart </a>
                        <a href="{{route('orders')}}"><i class="fas fa-list"></i> My orders</a>
                        <a href="{{ route('customerLogout') }}" onclick="logout()"><i class="fas fa-user-alt-slash"></i>
                            Logout</a>

                    </div>
                </div>
            </div>
        </nav>

        @yield('content')
        <script src="{{ asset('../js/logout.js') }}"></script>
        <script src="{{ asset('../js/customerFoodModal.js') }}"></script>
        <script src="{{ asset('../js/cartAdd.js') }}"></script>
        <script src="{{asset('../js/cartLoad.js')}}"></script>
        <script src="{{asset('../js/viewRes.js')}}"></script>
    </body>

    </html>
