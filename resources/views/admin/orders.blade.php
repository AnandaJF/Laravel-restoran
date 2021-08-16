<x-app-layout>
 
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>

   @include("admin.admincss");
  
</head>
  <body> 
      
<div class="container-scroller">

    @include("admin.navbar")


<div style="position: left; top: 60px; right: -150px;">

<table align="center">

    <tr align="center">
        <td style="padding: 30px;">Name</td>
        <td style="padding: 30px;">Table</td>
        <td style="padding: 30px;">Noted</td>
        <td style="padding: 30px;">Food Name</td>
        <td style="padding: 30px;">Price</td>
        <td style="padding: 30px;">Quantity</td>
        <td style="padding: 30px;">Total Price</td>
    </tr>

    @foreach($data as $data)

    <tr align="center"> 
        <td>{{$data->name}}</td>
        <td>{{$data->table}}</td>
        <td>{{$data->noted}}</td>
        <td>{{$data->foodname}}</td>
        <td>{{$data->price}}</td>
        <td>{{$data->quantity}}</td>
        <td>Rp{{$data->price * $data->quantity}}</td>
    </tr>

    @endforeach


</table>

</div>



</div>

    @include("admin.adminscript");
  </body>
</html>