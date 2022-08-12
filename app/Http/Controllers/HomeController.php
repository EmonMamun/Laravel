<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\UsersLoginInfo;
use App\Models\Restaurant;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function login()
    {
        return view('login');
    }

    public function customerReg()
    {
        return view('customerReg');
    }

    public function validateCustomerAndSave(Request $req)
    {
        $req->validate(
            [
                'name'=> 'required|max:50|regex:/^[a-zA-Z .-]*$/',
                'contact_number'=>'required|max:11|min:11|regex:/^01[0-9]*$/',
                'email'=>'required|email',
                'password'=>'required|min:3|max:50',
                'con_password'=>'same:password',
                'address'=>'required',
                'gender'=>'required'
            ]
            );
            $customer = new Customer();
            $customer->name = $req->name;
            $customer->email = $req->email;
            $customer->password = md5($req->password);
            $customer->address = $req->address;
            $customer->gender = $req->gender;
            $customer->contact_number=$req->contact_number;
            try{
                $customer->save();
                return view('customerReg')->with('success','Registration successfull');
            }catch(\Illuminate\Database\QueryException $ex){
                return view('customerReg')->with('emailEx','Email Already exist');
            }
    }

    public function restaurantReg()
    {
        return view('restaurantRegistration');
    }

    public function validateRestaurantAndSave(Request $req)
    {
        $req->validate(
            [
                'name'=> 'required|max:50|regex:/^[a-zA-Z .-]*$/',
                'contact_number'=>'required|max:11|min:11|regex:/^01[0-9]*$/',
                'email'=>'required|email',
                'password'=>'required|min:3|max:50',
                'con_password'=>'same:password',
                'address'=>'required',
                'logo'=>'mimes:jpeg,jpg,png,gif|required'
            ]
            );
            $destinationPath = 'upload/'.$req->name;
            $profileImage = date('YmdHis') . "." . $req->file('logo')->getClientOriginalExtension();
            $req->file('logo')->move($destinationPath, $profileImage);
            $restaurant = new Restaurant();
            $restaurant->name = $req->name;
            $restaurant->email = $req->email;
            $restaurant->password = md5($req->password);
            $restaurant->contact_number = $req->contact_number;
            $restaurant->logo = '../'.$destinationPath.'/'.$profileImage;
            $restaurant->address = $req->address;
            try{
                $restaurant->save();
                return view('restaurantRegistration')->with('success','Registration successfull');
            }catch(\Illuminate\Database\QueryException $ex){
                    if(file_exists(public_path($destinationPath.'/'.$profileImage))){
                    unlink(public_path($destinationPath.'/'.$profileImage));
                    }
                return view('restaurantRegistration')->with('emailEx','Email Already exist');
            }
    }

    public function loginValidation(Request $req)
    {
        $req->validate(
            [
                'email'=>'required|email',
                'password'=>'required|min:3|max:50'
            ]
        );
        $loginData= new UsersLoginInfo();
        $loginData = UsersLoginInfo::where([['email',$req->email],['password',md5($req->password)]])->first();
        try{
            if(isset($loginData->rule) && $loginData->rule == 'customer'){
                $customer= new Customer();
                $customer=Customer::where('email',$loginData->email)->first();
                if($customer->status==1)
                {
                    session()->put('customer_id',$customer->id);
                    session()->put('cusName',$customer->name);
                session()->put('rule',$customer->rule);
                return redirect('/customer/dashbord');
                }else{
                    return view('login')->with('block','You are temporary blocked by admin');
                }
            }elseif(isset($loginData->rule) && $loginData->rule == 'vendor'){
                $restaurant = Restaurant::where('email',$loginData->email)->first();
                if($restaurant->status == 1){
                    session()->put('restaurant_id',$restaurant->id);
                    session()->put('rule',$restaurant->rule);
                    session()->put('rname',$restaurant->name);
                    return redirect('/restaurant/dashbord');
                }elseif($restaurant->status == 0){
                    return view('login')->with('block','Your account has not confirmed by admin yet. Please wait for confirmation');
                }else{
                    return view('login')->with('block','You are temporary blocked by admin');
                }
               
            }elseif(isset($loginData->rule) && $loginData->rule == 'admin'){
                $admin = Admin::where('email',$loginData->email)->first();
                session()->put('admin_id',$admin->id);
                session()->put('rule',$admin->rule);
                session()->put('aname',$admin->name);
                return redirect('/admin/dashboard');
            }
            else{
                return view('login')->with('lerr','Email or password not match');
            }
        }catch(Exception $e){
            return view('login')->with('lerr','Email or password not match');
        }
    }
}
