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
    
<div style="position: left; top: 60px; right: -150px; ">

    <form action="{{url('/uploadfood')}}" method="post" enctype="multipart/form-data">

    @csrf

<div style="margin:5px">
    <label>Title</label>
    <input style="color:blue;" type="text" name="title" placeholder="Write a title" required>
</div>

<div style="margin:5px">
    <label>Price</label>
    <input style="color:blue;" type="num" name="price" placeholder="Write a price" required>
</div>

<div style="margin:5px">
    <label>Image</label>
    <input type="file" name="image" required>
</div>
  
<div style="margin:5px">
    <label>Description</label>
    <input style="color:blue;" type="text" name="descripton" placeholder="Descripton" required>
</div>

<div style="margin:5px"> 

<input style="color : black" type="submit" value="Save" > 

</div>  

    </form>

<div>


<table>
<tr>
  <th style= "padding: 30px; margin-bottom: 5px;">Food Menu</th>
  <th style="padding: 30px">Pri/ce</th>
  <th style="padding: 30px">Description</th>
  <th style="padding: 30px; margin-bottom: 5px;">Image</th>
  <th style="padding: 30px">Action  </th>
</tr>

@foreach($data as $data)
<tr align="center">

  <td>{{$data->title}}</td>
  <td>{{$data->price}}</td>
  <td>{{$data->descripton}}</td>
  <td><img height="200" width="200" src="/foodimage/{{$data->image}}"></td>
  <td><a href="{{url('/deletemenu', $data ->id)}}">Delete</a></td>
</tr> 
@endforeach
</table>





</div>


</div>



  </div>

    @include("admin.adminscript")
  </body>
</html>