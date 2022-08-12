<!DOCTYPE html>
<html>

<head>
    <title>Food Court</title>
    <link rel="stylesheet" href="css/home.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/bdffe34037.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <!--Navbar-->
    <div class="under-section">
        <div class="underflex">
            <div class="text">
                <p>Need a business Account?</p>
            </div>
            <div class="btn">
                <a href="{{route('restaurantReg')}}">Click here</a>
            </div>
        </div>
    </div>
    <div class="full">
        <div class="container">
            <div class="topnav" id="myTopnav">
                <a href="{{route('home')}}" class="active"><i class="fas fa-home"></i> Home</a>
                <a href="#contact"><i class="fas fa-address-book"></i> Contact</a>
                <a href="#about"><i class="fas fa-info-circle"></i> About</a>
                <a href="{{route('login')}}"><i class="fas fa-user"></i> Login</a>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>
    </div>

    <header>
        <div class="header-flex-container">
            <div class="left">
                <img src="image/logo.png" height="350" width="350">
            </div>
            <div class="right">
                <h1>Food</h1>
                <h1>Court</h1>
            </div>
        </div>
    </header>
    <!--ShowCase-->
    @yield('content')
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
</html>