@extends('layouts.customerDashbordLayouts')
@section('title','Cart')
@section('content')
<div class="container">
    <h2 id="restaurent-name"></h2>
    <hr>
    <div id="add"></div>
    <div class="calculation">
        <table>
            <tr>
                <td> Subtotal</td>
                <td id="subtotal"></td>
            </tr>
            <tr>
                <td>Vat(10%)</td>
                <td id="vat"></td>
            </tr>
            <tr>
                <td>Grand total</td>
                <td id="grand-total"></td>
            </tr>
        </table>
    </div>
    <br><br>
    <aside class="corner">
    <label for="contuct-number">Phone:</label><br>
                <input type="tel" id="contuct-number" value="{{$customer->contact_number}}"><br><br>
                <label for="address">Address: </label><br>
                <input type="address" id="address" value="{{$customer->address}}"><br><br>
        <button id="Clear"><i class="fas fa-trash-alt"></i> Clear cart</button>
        <button id="confirm">Confirm</button>
    </aside>
    <div id="modalnotifi">
        <div id="m2content">
            <p id="m2close">X</p>
            <h2 id="m2message"><h2>
        </div>
    </div>
</div>

@endsection