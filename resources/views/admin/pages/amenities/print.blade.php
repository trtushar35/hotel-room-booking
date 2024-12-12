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

  <h2>Amenities Information</h2>

  <table style="width:100%" class="table">
    <thead>
    <tr align="center">
      <th scope="col">Id</th>
      <th scope="col">Amenities Type</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($allAmenities as $key=> $amenities)
    <tr align="center">
      <th scope="row">{{$key+1}}</th>
      <td>{{$amenities->amenities_type}}</td>
        <td>
        <img width="70" height="40" src="{{ url('/uploads/amenities',$amenities->image) }}" alt="amenities image not found">
      
        </td>
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