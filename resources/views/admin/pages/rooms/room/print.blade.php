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

  <h2>Room Information</h2>

  <table style="width:100%" class="table">
    <thead>
    <tr align="center">
      <th scope="col">Id</th>
      <th scope="col">Room Image</th>
      <th scope="col">Room Name</th>
      <th scope="col">Room No</th>
      <th scope="col">Amount</th>
     
      
    </tr>
  </thead>
  <tbody>
  @foreach($rooms as $key=> $room)
    <tr align="center">
      <th scope="row">{{$key+1}}</th>
      <td>
        <img width="100" height="70" src="{{ url('/uploads/rooms/',$room->image) }}" alt="room image not found">
      
        </td>
      <td>{{$room->room_name}}</td>
      <td>{{$room->room_no}}</td>
      <td>{{$room->amount}}</td>
      
     
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