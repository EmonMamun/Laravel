@extends('layouts.customerDashbordLayouts')
@section('title', 'Orders')
@section('content')

    <header class="container">
        <div class="stk">
            <h3>On processing items</h3>
            <hr>
        </div>
        <div id="appendItems">
            @for ($i = 0; $i < count($pendingOrder); $i++)
                @if (empty($oid) || $oid != $pendingOrder[$i]->id)
                    <div class='order-container'>
                        <p class='orderId'>Order id: {{ $pendingOrder[$i]->order_id }}</p>
                        <aside class='right'>
                            <p>Date: {{ $pendingOrder[$i]->date }}</p>
                            <p>Time: {{ $pendingOrder[$i]->time }}</p>
                        </aside><br><br>
                        <img src='{{ asset($pendingOrder[$i]->Restaurant->logo) }}' alt='img' class='rimg'>
                        <h2 class='resname'>{{ $pendingOrder[$i]->Restaurant->name }}</h2><br>
                        <table>
                            <tr>
                                <th>Item</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                            </tr>
                @endif
                @php
                    $oid = $pendingOrder[$i]->id;
                    $gt = 0;
                @endphp

                @foreach ($pendingOrder[$i]->OrdersFoodMaping as $fm)
                    <tr>
                        <td>{{ $fm->Food->name }}</td>
                        <td>{{ $fm->Food->price }}</td>
                        <td>{{ $fm->quantity }}</td>
                        <td>{{ $fm->subtotal }}</td>
                        @php
                            $gt += $fm->subtotal;
                        @endphp
                    </tr>
                @endforeach
                @if (!empty($pendingOrder[$i + 1]))
                    @if ($oid != $pendingOrder[$i + 1]->id)
                        </table>
                        <div class='tright'>
                            <table>
                                <tr>
                                    <td>Total</td>
                                    <td>{{ $gt }}</td>
                                </tr>
                                <tr>
                                    <td>Vat(10%)</td>
                                    <td>{{ round(0.1 * $gt) }}</td>
                                </tr>
                                <tr>
                                    <td>Grand total</td>
                                    <td>{{ $gt + round(0.1 * $gt) }}</td>
                                    @php
                                        $gt = 0;
                                    @endphp
                                </tr>
                            </table>
                        </div>
                        <br>
                        <div class='innerFlex'>
                            <div class='pending'>
                                <p>{{ $pendingOrder[$i]->status }}</p>
                                <div class='loader'>
                                    <div class='loader__element'>
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>
        @endif
    @else
        </table>
        <div class='tright'>
            <table>
                <tr>
                    <td>Total</td>
                    <td>{{ $gt }}</td>
                </tr>
                <tr>
                    <td>Vat(10%)</td>
                    <td>{{ round(0.1 * $gt) }}</td>
                </tr>
                <tr>
                    <td>Grand total</td>
                    <td>{{ $gt + round(0.1 * $gt) }}</td>
                    @php
                        $gt = 0;
                    @endphp
                </tr>
            </table>
        </div>
        <br>
        <div class='innerFlex'>
            <div class='pending'>
                <p>{{ $pendingOrder[$i]->status }}</p>
                <div class='loader'>
                    <div class='loader__element'>
                    </div>
                </div>
            </div>
        </div>
        </div>
        @endif
        @endfor
        </div>
    </header><br>
    <section class="container">
        <div class="stk">
        <h3>Delivered items</h3>
        <hr>
        </div>
        <div id="delivered">
            @for ($i = 0; $i < count($delivered); $i++)
            @if (empty($oid) || $oid != $delivered[$i]->id)
                <div class='order-container'>
                    <p class='orderId'>Order id: {{ $pendingOrder[$i]->order_id }}</p>
                    <aside class='right'>
                        <p>Date: {{ $delivered[$i]->date }}</p>
                        <p>Time: {{ $delivered[$i]->time }}</p>
                    </aside><br><br>
                    <img src='{{ asset($delivered[$i]->Restaurant->logo) }}' alt='img' class='rimg'>
                    <h2 class='resname'>{{ $delivered[$i]->Restaurant->name }}</h2><br>
                    <table>
                        <tr>
                            <th>Item</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </tr>
            @endif
            @php
                $oid = $delivered[$i]->id;
                $gt = 0;
            @endphp

            @foreach ($delivered[$i]->OrdersFoodMaping as $fm)
                <tr>
                    <td>{{ $fm->Food->name }}</td>
                    <td>{{ $fm->Food->price }}</td>
                    <td>{{ $fm->quantity }}</td>
                    <td>{{ $fm->subtotal }}</td>
                    @php
                        $gt += $fm->subtotal;
                    @endphp
                </tr>
            @endforeach
            @if (!empty($delivered[$i + 1]))
                @if ($oid != $delivered[$i + 1]->id)
                    </table>
                    <div class='tright'>
                        <table>
                            <tr>
                                <td>Total</td>
                                <td>{{ $gt }}</td>
                            </tr>
                            <tr>
                                <td>Vat(10%)</td>
                                <td>{{ round(0.1 * $gt) }}</td>
                            </tr>
                            <tr>
                                <td>Grand total</td>
                                <td>{{ $gt + round(0.1 * $gt) }}</td>
                                @php
                                    $gt = 0;
                                @endphp
                            </tr>
                        </table>
                    </div>
                    <br>
                    <div class='innerFlex'>
                        <div class='delivered'>
                            <p>Delivered</p>
                            <i class='fas fa-check'></i>
                        </div>
                    </div>
    </div>
    @endif
@else
    </table>
    <div class='tright'>
        <table>
            <tr>
                <td>Total</td>
                <td>{{ $gt }}</td>
            </tr>
            <tr>
                <td>Vat(10%)</td>
                <td>{{ round(0.1 * $gt) }}</td>
            </tr>
            <tr>
                <td>Grand total</td>
                <td>{{ $gt + round(0.1 * $gt) }}</td>
                @php
                    $gt = 0;
                @endphp
            </tr>
        </table>
    </div>
    <br>
    <div class='innerFlex'>
        <div class='delivered'>
            <p>Delivered</p>
            <i class='fas fa-check'></i>
        </div>
    </div>
    </div>
    @endif
    @endfor
        <div>
    </section><br><br>

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
