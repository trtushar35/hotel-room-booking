<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Sea View</title>
  <style>
    table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
    }
  </style>
</head>

<body>

  <h2>User Information</h2>

  <table style="width:100%" class="table">
    <thead>
      <tr align="center">
        <th scope="col">Id</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Role</th>
        <th scope="col">Phone</th>
        <th scope="col">Email</th>
        <th scope="col">Address</th>

      </tr>
    </thead>
    <tbody>
      @foreach($users as $key=>$user)
      <tr align="center">
        <th scope="row">{{$key+1}}</th>
        <td>
          <img style="border-radius: 50%;" height="40" width="40" src="{{url('uploads/users',$user->image)}}" alt="">
        </td>
        <td>{{$user->name}}</td>
        <td>{{$user->role}}</td>
        <td>{{$user->phone}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->address}}</td>

      </tr>
      @endforeach
      <button class="btn btn-success" onclick="printlist()">Print List</button>
      <script>
        function printlist() {
          window.print();
        }
      </script>
    </tbody>
  </table>

</body>

</html>