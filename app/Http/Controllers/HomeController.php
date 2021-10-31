<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Food;

use App\Models\Cart;

use App\Models\Order;

use App\Models\logout;



class HomeController extends Controller
{
    public function index ()
{
    return view("home");
}
#--
public function logout()
{
    Auth::logout();
    return redirect("/");
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

    $usertype= Auth::User()->role;
    if($usertype=='admin')
    {
        return view('admin/adminhome');
    }
    else if($usertype=='kasir')
    {
        return view('kasir/kasirhome');
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

            if ($request->noted != Null) {
                $noted=$request->noted;
            } else {
                $noted= "Tidak Ada";
            }
          

            $cart=new cart;
            $cart->user_id=$user_id;
            $cart->food_id=$foodid;
            $cart->quantity=$quantity;
            $cart->noted=$noted;
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
    $data=order::all();

$count=cart::where('user_id',$id)->count();


$data2=cart::where('user_id', '=' , $id)->get();


// $data=cart::where('user_id' ,$id)->join('food', 'carts.food_id', '=', 'food.id')->get();
$data = [];
foreach ($data2 as $row) {
    $food = Food::where('id', $row->food_id)
        ->first();

    $cart = [
        "id" => $row->id,
        "user_id" => $row->user_id,
        "title" => $food->title,
        "noted" => $row->noted,
        "quantity" => $row->quantity,
        "price" => $food->price,
    ];
    array_push($data, $cart);
}

// dump($data2);
// dd($data);

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
        $foodname = implode(',', $request->foodname);
        $price = implode(',', $request->price);
        $quantity = implode(',', $request->quantity);
        $noted = implode(',', $request->noted);

        Order::create([
            'user_id' => Auth::user()->id,
            'quantity' => $quantity,
            'foodname' => $foodname,
            'price' => $price,
            'name' => $request->name,
            'table' => $request->table,
            'noted' => $noted,
            'status' => "Belum Bayar"
        ]);
        
        return redirect()->back();
    }
}
