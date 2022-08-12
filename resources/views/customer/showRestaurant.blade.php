@extends('layouts.customerDashbordLayouts')
@section('title',$restaurant->name)
@section('content')
<header class="header">
    <div class="header-flex container">
        <div>
            <img src="{{asset($restaurant->logo)}}" id="image">
            
       </div>
       <div class="dev"></div>
        <div id="info">
            <h1 id="name">{{$restaurant->name}}</h1>
            <p><strong>Email:</strong> {{$restaurant->email}}</p>
            <p><strong>Contuct number:</strong> {{$restaurant->contact_number}}</p>
            <p><strong>Address:</strong> {{$restaurant->address}}</p>
        </div>
    </div>
</header>
<br><br>

<section class="container">
    <div id="category-list"> 
        <h3>Category</h3> 
        <hr>
        <br>
        <div id="categorylist">
           
                @foreach($categories as $c)
                <div><a href="#{{$c->category}}" class='c-i'>{{$c->category}}</a></div>
                @endforeach
        </div>
    </div>
</section>
<section class="container">
    <h3 id="h3cen">Food items</h3>
    <hr>
    <div class="flex">
        @foreach($foods as $f)
            @if(empty($cat)||$f->category!=$cat)
            <div class='hole' id='{{$f->category}}'>
                <h3>{{$f->category}}</h3>
                <hr>
            </div>
            @endif
            <div class='foodcard'style="width:550px;" onclick='foodCardClick({{$f->id}})'>
                <div>
                    <h4 class='item-name'>{{$f->name}}</h4>
                    <p class='item-description'>{{$f->description}}</p>
                    <p class='item-price'>Tk {{$f->price}}</p>
                </div>
                <div>
                    <img src='{{asset($f->picture)}}' class='foodcard-img'>
                </div>
            </div>
            @php
                $cat = $f->category
            @endphp
        @endforeach
    </div>   
    <div id="modal">
        <div id="modal-content">
            <p id="modal-close-btn">X</p>
            <div id="showImg"></div>
            <h2 id="restaurentname"><h2>
            <hr>
            <h1 id="food-name"></h1>
            <p id="description"></p>
            <p id="price"><sapn style="color:rgb(182, 182, 182);">(per.)</sapn></p>
                <label for="quantity">Add quantity <span style="color:rgb(182, 182, 182);">(minimum 1.)</span>:</label><br>
                <input type="number" min="1" step="1" value="1" id="quantity">
                <br><br>
                <label for="details">Add your instructions <sapn style="color:rgb(182, 182, 182);">(optional.)</sapn>:</label><br>
                <textarea id="details"></textarea><br><br>
                <div id="error-message">
                    
                </div><br><br>
                <button id="add-to-cart">+ Add to cart</button>
                <button id="modal-close-btn-2">Close</button>
        </div>
    </div>
    <div id="modalnotifi">
        <div id="m2content">
            <p id="m2close">X</p>
            <h2 id="m2message"><h2>
        </div>
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