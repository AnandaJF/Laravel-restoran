<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Resto | Order</title>
</head>

<body>
    <nav>
        <div class="logo">
            <h1>Restoran Italia</h1>
        </div>
        <ul>


            <li><a href="{{url('/redirects  ')}}"> Home </a></li>
            <li><a href="{{url('/food')}}"> Food </a></li>
            
            <li style="color:#FFFFE5;">

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

    <div class="atas">
        <h1>Selamat Datang</h1>
        <p>Restoran Italia adalah restoran pertama di Jakarta yang menyajikan segala macam makanan dan minuman khas italia, disini kami menyajikan makanan terbaik untuk anda supaya kalian senang dan puas.</p>
        <img src="img/asik.jpg">
    </div>

    <div class="bawah">
        <h1>Menu Favorit</h1>
        <div class="container">
            <img src="img/cannoli.jpg" alt="Avatar" class="image">
            <div class="overlay">
                <div class="text">Cannoli</div>
            </div>
        </div>
    </div>

    <div class="terakhir">
        <h1>Cara Pemesanan</h1>
        <p id="satu">1. Klik menu order di pojok kanan atas</p>
        <p id="dua">2. Pilih menu makanan anda lalu klik pesan</p>
        <p id="tiga">3. Jika sudah pesanan anda akan di antar ke meja</p>
        <img src="img/pizza.jpg">
    </div>
<hr>
    <div class="footer" style="padding: 10px">
        <p id="email">E-mail : restoran_italia@gmail.com</p>
        <p id="alamat"> Alamat : Jl Pangeran Antasari No.36 Jakarta Selatan, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta (12150)
        </p>
        <p class="hp">No. Hp : (+62) 89510007373</p>
    </div>

</body>
<script src="javascript/home.js"></script>
<script src="javascript/navbar.js"></script>

</html>