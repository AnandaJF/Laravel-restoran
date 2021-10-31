<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Food;

use App\Models\Order;

use Illuminate\Queue\Jobs\RedisJob;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function user()
    
        {
            $data=user::all();
        return view("admin.users",compact("data"));
        }

        public function foodmenu()
        {
        $data = food::all();
        return view("admin.foodmenu", compact("data"));
        }   

        

        public function upload(Request $request)
        {
       $data = new food;

       $image=$request->image;

       $imagename =time().'.'.$image->getClientOriginalExtension();

       $request->image->move('foodimage',$imagename);

       $data->image=$imagename;


       $data->title=$request->title;
       $data->price=$request->price;
       $data->descripton=$request->descripton;

       $data->save();
 
       return redirect()->back();   
        }



        public function deleteuser($id)
        {
            $data=user::find($id);
            $data->delete();
        return redirect()->back();
        }

        

        public function deletemenu($id)
{
    $data=food::find($id);
    $data->delete();
    return Redirect()->back(); 
}

public function orders()
{
    $data=order::all();

    return view('kasir.orders',compact('data'));
}

public function adminhome()
{
    return view('admin.adminhome');
}

public function kasirhome()
{
    return view('kasirhome');
}

public function laporan()
{
    return view('admin.laporan');
}

public function transaksi()
{
    return view('kasir.transaksi');
}

public function detail($id)
{ 
    $data = Order::where('id', $id)
        ->first();

    return view('kasir.detail', [
        'data' => $data
    ]);
}

}


