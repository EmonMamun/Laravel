@extends('layouts.restaurantLayouts')
@section('title', 'Delivered Order')
@section('content')

    <head>
        <div class="text">
            <div>
                <i class="fas fa-concierge-bell"></i>
            </div>
            <div>
                <h1>Delivered order</h1>
            </div>
        </div>
    </head><br><br>
    <div id="Pending" class="tabcontent container">
        <div class="flex" style="margin: 0 auto; text-align:center;">
            @for ($i = 0; $i < count($orders); $i++)
                @if (empty($ori) || $orders[$i]->id != $ori)
                    <div class='order-card item'>
                        <p>Order id: {{ $orders[$i]->order_id }}</p>
                        <p>Status: Delivered</p>
                        <p>Items:</p>
                        <aside class='right'>
                            <small class='time'>Time: {{ $orders[$i]->time }}</small>
                            <small class='date'>Date: {{ $orders[$i]->date }}</small>
                        </aside>

                        <hr>
                        <table>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>instruction</th>
                                <th>Category</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                            </tr>
                @endif
                @php
                    $ori = $orders[$i]->id;
                    $gt = 0;
                @endphp
                @foreach ($orders[$i]->OrdersFoodMaping as $f)
                    <tr>
                        <td class='inner'>
                            <img src='{{ asset($f->Food->picture) }}' alt='img' class='flex-img'>

                        </td>
                        <td>
                            <p>{{ $f->Food->name }}</p>
                        </td>
                        <td>
                            <p>{{ $f->instruction }}</p>
                        </td>
                        <td>
                            <p>{{ $f->Food->category }}</p>
                        </td>
                        <td>
                            <p>{{ $f->quantity }}</p>
                        </td>
                        <td>
                            <p>Tk {{ $f->subtotal }}</p>
                        </td>

        </div>
        </tr>
        @php
            $gt += $f->subtotal;
        @endphp
        @endforeach
        @if (!empty($orders[$i + 1]))
            @if ($ori != $orders[$i + 1]->id)
                </table>
                <hr>
                <table class='grandt'>
                    <tr>
                        <td>
                            <p>Total</p>
                        </td>
                        <td>
                            <p>{{ $gt }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Vat(10%)</p>
                        </td>
                        <td>
                            <p>{{ round($gt * 0.1) }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Grand total: </p>
                        </td>
                        <td>
                            <p>{{ round($gt + $gt * 0.1) }}</p>
                        </td>
                    </tr>
                    <aside class='leftab'>
                        <p>Customer info</p>
                        <small>Name: {{ $orders[$i]->Customer->name }}</small>
                        <br>
                        <small>Mobile: {{ $orders[$i]->customer_number }}</small>
                        <br><small><i class='fas fa-map-marked-alt'></i> {{ $orders[$i]->delivary_location }}</small>
                    </aside>
                </table>
                <div class='center'><button data-id=>Delivered</button></div>
            
    </div>
    @php
    $gt = 0;
    @endphp
    @endif
@else
    </table>
    <hr>
    <table class='grandt'>
        <tr>
            <td>
                <p>Total</p>
            </td>
            <td>
                <p>{{ $gt }}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Vat(10%)</p>
            </td>
            <td>
                <p>{{ round($gt * 0.1) }}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Grand total: </p>
            </td>
            <td>
                <p>{{ round($gt + $gt * 0.1) }}</p>
            </td>
        </tr>
        <aside class='leftab'>
            <p>Customer info</p>
            <small>Name: {{ $orders[$i]->Customer->name }}</small>
            <br>
            <small>Mobile: {{ $orders[$i]->customer_number }}</small>
            <br><small><i class='fas fa-map-marked-alt'></i> {{ $orders[$i]->delivary_location }}</small>
        </aside>
    </table>
    <div class='center'><button data-id=>Delivered</button>
    </div>
    </div>
    @php
    $gt = 0;
    @endphp
    @endif
    @endfor
    </div>
    </div>
@endsection
