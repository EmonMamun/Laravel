<!DOCTYPE html>
    <html>

    <head>
        <title>
            {{session()->get('rname')}} | @yield('title')
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('../css/restaurantDashbord.css')}}">
        <link rel="stylesheet" href="{{asset('../css/rorder.css')}}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/bdffe34037.js" crossorigin="anonymous"></script>
        <link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
rel="stylesheet"
/>
<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css"
rel="stylesheet"
/>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"
></script>
    </head>

    <body>
        <nav class="navbar">
            <div class="navflex container">
                <div>
                    <img src="{{asset('../image/logo.png')}}" height="40" width="40">
                </div>
                <div>
                    <h3>Food Court</h3>
                </div>
                <div>
                    <div class="topnav" id="myTopnav">
                        <a href="{{route('restaurantHome')}}"><i class="fas fa-house-user"></i> Home</a>
                        <a href="{{route('addFood')}}"><i class="fas fa-hamburger"></i> Add food</a>
                        <a href="{{route('logout')}}" onclick="logout()"><i class="fas fa-user-alt-slash"></i> Logout</a>
                    </div>
                </div>
            </div>
        </nav>
        @yield('content')
        @yield('update')
        <footer id="contact">
            <div class="container">
                <div class="footer-flex">
                    <div class="first-item">
                        <h2>Contact us</h2>
                        <div class="footer-flex center">
                            <div>
                                <i class="far fa-envelope"></i>
                            </div>
                            <div>
                                <p>Email: foodcourt@foodcourt.com</p>
                            </div>
                        </div>
    
                        <div class="footer-flex center">
                            <div>
                                <i class="fas fa-phone" style="font-size: 35px; padding-right: 10px;"></i>
                            </div>
                            <div>
                                <p>Phone: 900900</p>
                            </div>
                        </div>
    
                        <div class="footer-flex center">
                            <div>
                                <i class="fas fa-map-marked" style="font-size: 35px; padding-right: 10px;"></i>
                            </div>
                            <div>
                                <p>Address: 21/A, Dhopakhola, Mymensingh</p>
                            </div>
                        </div>
                    </div>
    
                    <div class="second-item">
                        <h2>Social media account</h2>
                        <div class="wrapper">
                            <a class="button" href="https://www.facebook.com" target="_blank">
                                <div class="icon">
                                    <i class="fab fa-facebook-f"></i>
                                </div>
                                <span>Facebook</span>
                            </a>
                            <a class="button" href="https://www.twitter.com" target="_blank">
                                <div class="icon">
                                    <i class="fab fa-twitter"></i>
                                </div>
                                <span>Twitter</span>
                            </a>
                            <a class="button" href="https://www.instagram.com" target="_blank">
                                <div class="icon">
                                    <i class="fab fa-instagram"></i>
                                </div>
                                <span>Instagram</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lastSpace"></div>
        </footer>
    </body>
    </html>