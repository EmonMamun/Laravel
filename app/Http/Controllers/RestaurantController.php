<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\DB;
use App\Models\Food;
use App\Models\Order;
class RestaurantController extends Controller
{
    public function showDashbord()
    {
        $restaurant=Restaurant::where('id',session()->get('restaurant_id'))->first();
        $foods = Food::where('vendor_id',session()->get('restaurant_id'))->orderBy('category')->get();
        $categories = DB::table('fooditem')->where('vendor_id',session()->get('restaurant_id'))
        ->select('category')->distinct()->get();
        return view('restaurant.dashbord')
        ->with('restaurant',$restaurant)
        ->with('categories',$categories)->with('foods',$foods);
    }
    public function logout()
    {
        session()->flush();
        return redirect('login');
    }
    public function addFood()
    {
        $categories = DB::table('fooditem')->select('category')->distinct()->get();
        return view('restaurant.addFood')->with('categories',$categories);
    }
    public function addFoodOnDb(Request $req)
    {
        $req->validate(
            [
                'image'=>'mimes:jpeg,jpg,png,gif,jfif|required',
                'name'=>'required|max:50|regex:/^[a-zA-Z 0-9.-]*$/',
                'price'=>'required',
                'description'=>'required',
                'category'=>'required|regex:/^[a-zA-Z 0-9.-]*$/'
            ]
            );
            $destinationPath = 'upload/'.session()->get('rname');
            $profileImage = date('YmdHis') . "." . $req->file('image')->getClientOriginalExtension();
            $req->file('image')->move($destinationPath, $profileImage);
            $food = new Food();
            $food->name = $req->name;
            $food->description = $req->description;
            $food->price = $req->price;
            $food->category = $req->category;
            $food->picture = '../'.$destinationPath.'/'.$profileImage;
            $food->vendor_id = session()->get('restaurant_id');
            $food->save();
            return redirect('restaurant/dashbord');
    }
    public function foodUpdate(Request $req)
    {
        $categories = DB::table('fooditem')->select('category')->distinct()->get();
        $food = Food::where('id',$req->foodId)->where('vendor_id',session()->get('restaurant_id'))->first();
        session()->put('foodId',$req->foodId);
        return view('restaurant.foodUpdate')->with('food',$food)->with('categories',$categories);
    }
    public function updateValid(Request $req)
    {
        $req->validate(
            [
                'name'=>'required|max:50|regex:/^[a-zA-Z .-]*$/',
                'price'=>'required',
                'description'=>'required',
                'category'=>'required|regex:/^[a-zA-Z 0-9.-]*$/'
            ]);
        $food = Food::find(session()->get('foodId'));
        $food->name = $req->name;
        $food->price = $req->price;
        $food->description = $req->description;
        $food->category = $req->category;
        $food->update();
        session()->forget('foodId');
        return redirect('restaurant/dashbord');
    }
    public function deleteFood(Request $req)
    {
        $food=Food::find($req->foodId);
        $food->delete();
        return redirect('restaurant/dashbord');
    }
    public function showPendings()
    {
        $orders=Order::where('vendor_id',session()->get('restaurant_id'))->where('status','pending')->get(); 
        return view('restaurant.showPending')->with('orders',$orders);
    }
    public function updatePanToCook(Request $req)
    {
        $order =Order::find($req->orderid);
        $order->status = "Cooking";
        $order->update();
        return redirect('restaurant/pendingOrder');
    }
    public function updateCookToDeliver(Request $req)
    {
        $order =Order::find($req->orderid);
        $order->status = "Delivered";
        $order->update();
        return redirect('restaurant/showCook');
    }
    public function showCook() 
    {
        $orders=Order::where('status','Cooking')->where('vendor_id',session()->get('restaurant_id'))->get();
        return view('restaurant.showCooking')->with('orders',$orders);
    }
    public function showDeliver() 
    {
        $orders=Order::where('status','Delivered')->where('vendor_id',session()->get('restaurant_id'))->get();
        return view('restaurant.showDelivered')->with('orders',$orders);
    }
    
}
