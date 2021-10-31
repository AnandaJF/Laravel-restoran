<x-app-layout>
 
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>

   @include("admin.admincss");
  
</head>
  <body>   
<div class="container-scroller">

    @include("admin.navbar");

    <div  class="table">
    
    <table  cellpadding="10" border="1" style="margin-left:100px; background-color: white;">

    <tr align="center">
        <th style="padding: 30px;">Name</th>
        <th style="padding: 30px;">Email</th>
        <th style="padding: 30px;">Status</th>
    </tr>


@foreach($data as $data)
<tr align="center">
    <td style="padding: 30px;">{{$data->name}}</td>
    <td style="padding: 30px;">{{$data->email}}</td>

    @if($data->role=="admin")
    <td><a>Manajer</a></td>
    @elseif($data->role=="kasir")
    <td><a>Kasir</a></td>
    @else
    <td><a>Pelanggan</a></td>
@endif

</tr>

@endforeach

    </table>
    </div>

</div>

    @include("admin.adminscript");

</body>
</html>