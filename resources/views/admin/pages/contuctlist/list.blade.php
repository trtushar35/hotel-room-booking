 @extends('admin.master')
 @section('content')
 <h2>Contuct List</h2>

 <table class="table">
   <thead>
     <tr>
       <th scope="col">Si</th>
       <th scope="col">Name</th>
       <th scope="col">Email</th>
       <th scope="col">Phone No</th>
       <th scope="col">Message</th>
     </tr>
   </thead>
   <tbody>
   @foreach($contuct as $key=> $contucts)
     <tr>
       <th scope="row">{{$key+1}}</th>
       <td>{{$contucts->name}}</td>
       <td>{{$contucts->email}}</td>
       <td>{{$contucts->phone}}</td>
       <td>{{$contucts->message}}</td>
     </tr>
     @endforeach
   </tbody>
 </table>
 {{$contuct->links()}}
 @endsection