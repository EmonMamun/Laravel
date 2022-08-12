@extends('layouts.customerDashbordLayouts')
@section('title','Dashbord')
@section('content')
<div class="container">
    <h1 class="tag">Find the best restaurent here.</h1>
    <br><br><br><br>
    <form action="" method="POST">
    <div class="search-bar">
    
        @csrf
        <input type="text" placeholder="Search restaurant" id="search-input" name="content" >

        <button type="submit" id="search-btn" ><i class="fas fa-search" id="icon"></i></button>
  
    </div>
</form>
    <br><br><br>
    <div id="restaurent-search">
        <p id="closesb">X</p>
        <h3>Results</h3>
        <hr>
        <p id="nodata">No data found</p>
        <div id="result"></div>
        <div id="space">
        </div>
    </div>
</div>
<br><br>
<section class="container restaurant">
    <h1>Restaurants</h1>
    <hr>
    <div id="restaurant-container">
        @foreach($restaurants as $r)
        <div><a href="{{route('showRes',['rId'=>$r->id])}}" onclick="addVid({{$r->id}})" class="card" style="background-image: url('{{$r->logo}}');"">
            <div class="border">
                <h2 class="border-text">{{$r->name}}</h2>
            </div></a>
        </div>
        @endforeach
    </div>
</section>
<br><br>
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
@endsection