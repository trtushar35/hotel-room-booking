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

  <h2>Hotel Information</h2>

  <table style="width:100%" class="table">
    <thead>
      
    <tr align="center">
      <th scope="col">Id</th>
      <th scope="col">Branch Name</th>
      <th scope="col">Email Address</th>
      <th scope="col">Address</th>
      <th scope="col">Contact Number</th>
    
      
    </tr>
  </thead>
  <tbody>
    @foreach($hotels as $key=> $hotel)
    <tr align="center">
      <th scope="row">{{$key+1}}</th>
      <td>{{$hotel->branch}}</td>
      <td>{{$hotel->email}}</td>
      <td>{{$hotel->address}}</td>
      <td>{{$hotel->contuct_number}}</td>
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