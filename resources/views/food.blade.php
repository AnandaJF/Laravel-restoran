<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/order.css">
    <title>Resto | Order</title>
</head>

<body>
    <nav>
        <div class="logo">
            <h1>Restoran Italia</b></h1>
        </div>
        
        <ul>


            <li><a href="/"> Home </a></li>
            <li><a href="{{url('/food')}}"> Food </a></li>
            
            <li style="color:white;">

@auth          
    
<a href="{{url('/showcart',Auth::user()->id)}}"> Transaksi </a>

@endauth

@guest

<div style="font-size:20px;">Transaksi</div>

@endguest 

</li>


            <li>
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <li>
                        <a href="{{url('/logout')}}"> Log Out </a>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a></li>

                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a></li>
                        @endif
                    @endauth
                </div>
            @endif

            </li>
        </ul>
        <div class="menu-toggle">
            <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
    <div class="atas">
        <h1>Makanan dan Minuman</h1>
    </div>



@foreach($data as $data)

<form action="{{url('/addcart', $data->id)}}" method="post">  

    @csrf

<div style="margin-top:15px; margin-bottom:15px;" class="responsive">

        <div style= "background-image: url('/foodimage/{{$data->image}}');  background-repeat: no-repeat;"
        class="gallery" >
        
        
    <div style="margin-top: 235px;" class="desc">
        <h2  class="title">{{ $data->title }}<h2> 
        <h3   class="price">{{ $data->price }}</h3>
        <div class="info"></div>
        <h4  class="descripton">{{ $data->descripton }}</h4> 
    </div>
    
</div>


<div style="margin-top: 5px;">
    <div>
        <input style="width:130px;" type="number" name="quantity" min="1" value="1" style="width: 80px;">
        
    </div>
    <input style="width:200px; height:80px; margin-top:5px; margin-bottom:5px; text-align:center" type="text" name="noted" min="1" placeholder="Noted" style="width: 80px;">
    <input type="submit" value="add cart">
    
</div>
</div>
</form>
        @endforeach
  



        
    <div class="footer">
    <hr>
        <h1>Enjoy Your Meal</h1>
        <p id="email">E-mail : restoran_italia@gmail.com</p>
        <p id="alamat"> Alamat : Jl Pangeran Antasari No.36 Jakarta Selatan, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta (12150)
        </p>
        <p class="hp">No. Hp : (+62) 89510007373</p>
    </div>

</body>

</html>