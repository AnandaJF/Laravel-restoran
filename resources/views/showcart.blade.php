<!DOCTYPE html>
<html lang="en">
<head>
<base href="/public">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/transaksi.css">
    <title>Transaksi | Resto</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/transaksi.css">
    <title>Resto | Order</title>
</head>

<body>
    <nav>
        <div class="logo">
            <h1>Restoran Italia</h1>
        </div>
        <ul>


            <li><a href="/redirects"> Home </a></li>
            <li><a href="{{url('/food')}}"> Food </a></li>
            
            <li style="color:white;">

            @auth          
                
            <a href="{{url('/showcart',Auth::user()->id)}}"> Carts</a>
        
            @endauth

            @guest

            Transaksi

            @endguest 

            </li>

            @auth          
                
            <a href="{{url('/showcart',Auth::user()->id)}}"> Transaksi</a>
        
            @endauth

            @guest

            Transaksi

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
                            <li> <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a></li>
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


<div class="table">
   
    <table  cellpadding="10" border="1" style="margin-left:auto;margin-right:auto; background-color: white;">

<tr>
    <th>Food Name</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Noted</th>
    <th>Total</th>
    <th>Action</th>
</tr>

<form action="{{url('order')}}" method="POST" > 

@csrf


<?php
$price=0;
foreach($data as $data) {
?>

<tr align="center">

    <td style="padding: 10px;">
    <input type="text" name="foodname[]" value="{{$data["title"]}}" hidden="">
    {{ $data["title"] }}
    </td>

    <td style="padding: 10px;">
    <input type="text" name="quantity[]" value="{{$data["quantity"]}}" hidden="">
    {{ $data["quantity"] }}
    </td>
    

    <td style="padding: 10px;">
    <input type="text" name="price[]" value="{{$data["price"]}}" hidden="">
    {{  $data["price"] }}
    </td>
    
    
    @php
        $result = collect(DB::select("select * from carts where id = " . $data["id"]))->first();
    @endphp
    <td style="padding: 10px;">
        <input type="text" name="noted[]" value="{{$data["noted"]}}" hidden="">
        {{  $result->noted }}
    </td>
    
    <td>
        {{ $total = $data["price"] * $data["quantity"] }}
        <?php $price += $total = $data["price"] * $data["quantity"]; ?>
    </td>
    
    
    <td>
        <a href="{{url('/remove', $data["id"])}}" >Remove</a>
    </td>
    
</tr>
<?php } ?>

<tr>
    <th colspan="4">Total</th>
    <td><?php echo $price ?></td>
</tr>



@foreach($data2 as $data2)

@endforeach

</table>




<div id="appear" align="center" style="padding: 10px;">
    
    <div style="padding: 10px; color:white">
<h1>Konfirmasi Pemesanan</h1>
</div>

<div style="padding: 10px;">
    
    <input type="text" name="name" placeholder="Name">
    
</div>

<div style="padding: 10px;">
    
    <input type="number" name="table" placeholder="Number Table">
    
</div>

</div>

<div align="center" style="padding: 10px;">
    <input class="btn btn-success" type="submit" value="Order">
</div>

</div>

</form>

</div>
<div class="footer">
    <hr color="white">
    <p id="email">E-mail : restoran_italia@gmail.com</p>
        <p id="alamat"> Alamat : Jl Pangeran Antasari No.36 Jakarta Selatan, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta (12150)
        </p>
        <p class="hp">No. Hp : (+62) 89510007373</p>
    </div>
    
    
    
    
    
    
<script type="text/javasript">
    $("#order").click(  
        function()
        {
            $("#appear").show();
        }

    );
</script>

<script src="javascript/home.js"></script>
<script src="javascript/navbar.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</html>
</body>
</html>