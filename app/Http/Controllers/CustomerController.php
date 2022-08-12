<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Restaurant;
use Illuminate\Support\Facades\DB;
use App\Models\Food;
use App\Models\Order;
use App\Models\OrdersFoodMaping;

class CustomerController extends Controller
{
    public function showDashbord()
    {
        $customer = Customer::where('id',session()->get('customer_id'))->first();
        $restaurants = Restaurant::where('status',1)->get();
        return view('customer.dashbord')->with('customer',$customer)->with('restaurants',$restaurants);
    }
    public function showCart()
    {   
        $customer = Customer::where('id',session()->get('customer_id'))->first();
        return view('customer.cart')->with('customer',$customer);
    }
    public function logout(){
        session()->flush();
        return redirect('login');
    }
    public function showRes(Request $req)
    {
        $restaurant = Restaurant::find($req->rId);
        $categories =DB::table('fooditem')->where('vendor_id',$req->rId)
        ->select('category')->distinct()->get();
        $foods = Food::where('vendor_id',$req->rId)->orderBy('category')->get();
        return view('customer.showRestaurant')->with('restaurant',$restaurant)->with('categories',$categories)->with('foods',$foods);
    }
    public function searchResults(Request $req)
    {
        $restaurants=Restaurant::where('name','like','%'.$req->content.'%')->where('status',1)->get();
        return view('customer.dashbord')->with('restaurants',$restaurants);
    }
    public function getFood(Request $req)
    {
        $food = Food::find($req->foodid);
        return response()->json($food);
    }
    public function confirmOrder(Request $req)
    {
        $items = json_decode($req->items);
        $customer_id = session()->get('customer_id');
        $order_id =uniqid();
        $order = new Order();
        $order->customer_id = $customer_id;
        $order->vendor_id = $items[0]->restaurentId;
        $order->delivary_location = $req->address;
        $order->order_id=$order_id;
        $order->customer_number = $req->phone;
        $order->save();
        $oid = Order::select('id')->where('order_id',$order_id)->first();
        foreach($items as $i){
            $ofm = new OrdersFoodMaping();
            $ofm->food_id = $i->foodId;
            $ofm->order_id = $oid->id;
            $ofm->instruction = $i->orderDes;
            $ofm->subtotal = $i->subtotal;
            $ofm->quantity = $i->foodQuantity;
            $ofm->save();
        }
        return response()->json("Order placed.");
    }
    public function showOrders()
    {
        $pending=Order::where('customer_id',session()->get('customer_id'))->where('status','pending')->orWhere('status','Cooking')->get();
        $delivered = Order::where('customer_id',session()->get('customer_id'))->where('status','Delivered')->get();
        return view('customer.showOrders')->with('pendingOrder',$pending)->with('delivered',$delivered);
    }
   
    
}
