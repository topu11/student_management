@extends('master')
@section('title')
    view student
@endsection
@section('content')
<table class="table table-responsive table-hover TFtable">
    <tr>
      <th style="color:red; background:white;">id</th>
      <th style="color:green; background:white;">student_id</th>
      <th style="color:red; background:white;">student_name</th>
      <th style="color:green;background:white;">department</th>
      <th style="color:red;background:white;">cell_phone</th>
      <th style="color:green;background:white;">mail_address</th>
      <th style="color:red;background:white;">student_info</th>
      <th style="color:red;background:white;">Action</th>
    </tr>
    @php $i=0; @endphp
    @foreach($students as $student)
    @php $i++; @endphp
     <tr>
      <th >{{$i}}</th>
      <th >{{$student->student_id}}</th>
      <th >{{$student->student_name}}</th>
      <th <?php if($student->department=="CSE"): ?> style="background-color:green;" <?php endif; ?>
       <?php if($student->department=="EEE"): ?> style="background-color:blue;" <?php endif; ?>
       >
      {{$student->department}}</th>
      <th >{{$student->cell_phone}}</th>
      <th >{{$student->mail_address}}</th>
      <th >{{$student->student_info}}</th>
      <th>
      <a href="{{route('edit',$student->student_id)}}"><button class="btn btn-success">Edit</a>
    <a href="{{route('delete',$student->student_id)}}"><button class="btn btn-danger" onclick="return checkDelete()";>delete</a>
      </th>
    </tr>
  @endforeach
   </table>
   <style type="text/css">
       .TFtable tr:nth-child(odd){
           background: #b8d1f3;
       }
       .TFtable tr:nth-child(even){
           background: #dae5f4;
       }
   </style>
   <script>
       function checkDelete()
       {
           if(confirm("sure to delete"))
           {
               return true;
           }
           else
           {
               return false;
           }
       }
   </script>
@endsection




