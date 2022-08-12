<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class AdminController extends Controller
{
    public function showDashbord()
    {
        $restaurants = Restaurant::where('status',0)->get();
        $restaurantsother = Restaurant::where('status',1)->orWhere('status',2)->get();
        return view('admin.adminDashbord')->with('needAproval',$restaurants)->with('all',$restaurantsother);
    }
    public function logout()
    {
        session()->flush();
        return redirect('login');
    }
    public function approve(Request $req)
    {
        $r = Restaurant::find($req->add);
        $r->status = 1;
        $r->update();
        return redirect('admin/dashboard');
    }
}
