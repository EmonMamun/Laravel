@extends('layouts.restaurantLayouts')
@section('title','Dashbord')
@section('content')
<header id="logo-name">
    <img src="{{$restaurant->logo}}" alt="Avatar" id="logo">
    <h2 id="res">
        {{session()->get('rname')}}
    </h2>
</header>
<br>
<section class="container">
    <div class="dropdown">
        <button class="dropbtn"><i class="fas fa-tasks">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manage order</i></button>
        <div class="dropdown-content">
        <a href="{{route('pendingOrders')}}"><i class="fas fa-spinner">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pending</i></a>
        <a href="{{route('showCook')}}"><i class="fas fa-utensils">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cooking</i></a>
        <a href="{{route('showDeliver')}}"><i class="fas fa-check-circle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Delivered</i></a>
        </div>
      </div>
    <h4 class="h4">Food items</h4>
    <hr>
    <br><br>
    <div id="categorylist">
        @if (isset($categories))
            @foreach($categories as $c)
            <div><a href="#{{$c->category}}" class='c-i'>{{$c->category}}</a></div>
            @endforeach
        @endif
    </div>
    <br>
    <div id="foodflex">
        @foreach($foods as $f)
            @if(empty($cat) || $f->category!=$cat)
            <div id="{{$f->category}}" class="cat-c">
                <p class="show-c">{{$f->category}}
                </p><hr><br>
            </div>
            @endif
            <div class="foodcard">
                <div>
                    <h4 class="item-name">{{$f->name}}</h4>
                    <p class="item-description">{{$f->description}}</p>
                    <p class="item-price">Tk {{$f->price}}</p>
                    <div class="btnPos">
                        <a href="{{route('updateFood',['foodId'=>$f->id])}}"><button class="btnEdit">Edit</button></a>
                        <a href="{{route('deleteFood',['foodId'=>$f->id])}}"><button class="btnDelete">Delete</button></a>
                    </div>
                </div>
                <div> 
                    <img src="{{$f->picture}}" class="foodcard-img" style="height:100px; width:100px;"/>
                </div>
            </div>
            @php
                $cat=$f->category
            @endphp
        @endforeach
    </div>
    <br><br>
</section>
@endsection