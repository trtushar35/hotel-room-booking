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
    <div class="container">
        <h1>Booking Information</h1>
    </div>

    <table style="width:100%" class="table">
        <thead>
            <tr align="center">
                <th scope="col">Si</th>
                <th scope="col">User Id</th>
                <th scope="col">Name</th>
                <th scope="col">Phone No</th>
                <th scope="col">Adults</th>
                <th scope="col">Children</th>
                
                <th scope="col">Checkin</th>
                <th scope="col">Checkout</th>
                <th scope="col">Status</th>
                <th scope="col">Payment Status</th>

            </tr>
        </thead>
        @foreach ($bookings as $key=>$booking)
        <tbody align="center">
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$booking->user_id}}</td>
                <td>{{$booking->name}}</td>
                <td>{{$booking->phone}}</td>
                <td>{{$booking->adults}}</td>
                <td>{{$booking->children}}</td>
                
                <td>{{$booking->checkin}}</td>
                <td>{{$booking->checkout}}</td>
                <td>{{$booking->status}}</td>
                <td>{{$booking->payment_status}}</td>

            </tr>
            <button class="btn btn-success" onclick="printlist()">Print </button>
            <script>
                function printlist() {
                    window.print();
                }
            </script>
        </tbody>
        @endforeach
    </table>
</body>

</html>