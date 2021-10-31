<x-app-layout>
 
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
<head>
  @include("admin.admincss");
</head>
<body>
  <div class="container-scroller">

    @include("kasir.navbarkasir")

  <div  class="table">

    <table  cellpadding="10" border="1" style="margin-left:auto;margin-right:auto; background-color: white;">
    
        <tr align="center">
            <th style="padding: 30px;">Food Name</th>
            <th style="padding: 30px;">Price</th>
            <th style="padding: 30px;">Quantity</th>
            <th style="padding: 30px;">Sub Total</th>
        </tr>
      
        <tr align="center">
          <td style="padding: 10px;">
          @foreach (explode(',',$data->foodname) as $item)
              {{ $item }}
              <br>
          @endforeach
        </td>
        
        <td style="padding: 10px;">
          @foreach (explode(',',$data->price) as $item)
              {{ number_format($item) }}
              <br>
          @endforeach
        </td>
        
        <td style="padding: 10px;">
          @foreach (explode(',',$data->quantity) as $item)
              {{ $item }}
              <br>
          @endforeach
        </td>
        
        <td style="padding: 10px;">
          @php
              $price = explode(',',$data->price);
              $quantity = explode(',',$data->quantity);
              @endphp
          @foreach (explode(',',$data->foodname) as $item)
          {{ number_format($price[$loop->iteration - 1] * $quantity[$loop->iteration - 1]) }}
          <br>
          @endforeach
        </td>
      </tr>
      
      <tr>
        <th colspan="3">Total</th>
        <td align="center">
          @php
            $check_price = explode(',',$data->price);
            $check_quantity = explode(',',$data->quantity);
            $total = [];
            $i = 0;
              foreach (explode(',',$data->foodname) as $item) {
                $findtotal = $check_price[$i] * $check_quantity[$i];
                array_push($total, $findtotal);
                $i++;
              }
          @endphp
          {{ number_format(array_sum($total)) }}
          </td> 
        </tr>
        
<tr>
  <th colspan="3">Bayar</th>
     <td style="padding: ">
        <input type="text">
      </td>
</tr>

<tr>
  <th colspan="3">Kembalian</th>
        <td style="padding: ">
          <input type="text">
        </td>
</tr>




      </table>

      <div align="center" style="padding: 10px;">
        <input class="btn btn-success" type="submit" value="Bayar dan Cetak">
    </div>

  </div>

  </div>
  
</body>
</html>