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

  

<div  class=table style="position: left; top: 60px; right: -150px;">

<table  cellpadding="10" border="1" style="margin-left:auto;margin-right:auto; background-color: white;">

    <tr align="center">
        <th style="padding: 30px;">No</th>
        <th style="padding: 30px;">Date</th>
        <th style="padding: 30px;">User ID</th>
        <th style="padding: 30px;">Nama Pemesan</th>
        <th style="padding: 30px;">Table</th>
        <th style="padding: 30px;">Action</th>
    </tr>
    
  <?php $no = 1;?>
  <?php $price=0;
  foreach($data as $data)
   {
  ?>
    <tr align="center"> 

        <td>{{ $no }}</td>

        <td>
          {{-- <?php
          date_default_timezone_set('Asia/Jakarta');
          echo date('d-m-Y'); ?>  --}}
          {{ date('d M Y', strtotime($data->created_at)) }}
        </td>

        <td>{{ $data->user_id}}</td>
        <td>{{ $data->name}}</td>
        <td>{{ $data->table}}</td>

       <td><a href="{{ route('detail', [$data->id]) }}" class="btn btn-primary"> Detail </a> </td>

    </tr>
    <?php $no++ ;?>
    <?php } ?>

    

    


</table>

</div>



</div>

    @include("admin.adminscript");
  </body>
</html>