<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Food;

use App\Models\Cart;

use App\Models\Order;




class HomeController extends Controller
{
    public function index ()
{
    return view("home");
}
#--
public function food ()
{
    $data=food::all();
    return view("food", compact("data"));
} 
#--
public function redirects ()
{
    $data=food::all();
    $usertype= Auth::User()->usertype;
    if($usertype=='1')
    {
        return view('admin.adminhome');
    }
    else
    {
        $user_id=Auth::id();
        $count=cart::where('user_id',$user_id )->count();
        

        return view('/home', compact('data','count'));
    }
}

    public function addcart(Request $request,$id)
    {
        if(Auth::id())
        {
            $user_id=Auth::id();
            $foodid=$id;
            $quantity=$request->quantity;

            $cart=new cart;
            $cart->user_id=$user_id;
            $cart->food_id=$foodid;
            $cart->quantity=$quantity;
            $cart->save();

        
            return redirect()->back();
        }
        else
        {
            return redirect('/login');
        }
    }

public function showcart(Request $request,$id)
{

$count=cart::where('user_id',$id)->count();


$data2=cart::select('*')->where('user_id', '=' , $id)->get();


$data=cart::where('user_id' ,$id)->join('food', 'carts.food_id', '=', 'food.id')->get();

return view('showcart',compact('count','data','data2'));

}


public function remove($id)
{
    $data=cart::find($id);
    
    $data->delete();

    return redirect()->back();
}

public function order(Request $request)
{
    foreach($request->foodname as $key=>$foodname)
{
    $data=new order;
    $data->foodname=$foodname;
    $data->price=$request->price[$key];
    $data->quantity=$request->quantity[$key];

    $data->name=$request->name;
    $data->table=$request->table;
    $data->noted=$request->noted;

    $data->save();
}

return redirect()->back();

}



}
