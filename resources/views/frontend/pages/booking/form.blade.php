<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Nanum+Gothic'>
    <style>
        .booking-form {
            width: 500px;
            margin: 0 auto;
            padding: 50px;
            background: #fff;
        }

        div.elem-group {
            margin: 20px 0;
        }

        div.elem-group.inlined {
            width: 49%;
            display: inline-block;
            float: left;
            margin-left: 1%;
        }

        label {
            display: block;
            font-family: 'Nanum Gothic';
            padding-bottom: 10px;
            font-size: 1.25em;
        }

        input,
        select,
        textarea {
            border-radius: 2px;
            border: 2px solid #777;
            box-sizing: border-box;
            font-size: 1.25em;
            font-family: 'Nanum Gothic';
            width: 100%;
            padding: 10px;
        }

        div.elem-group.inlined input {
            width: 95%;
            display: inline-block;
        }

        textarea {
            height: 250px;
        }

        hr {
            border: 1px dotted #ccc;
        }

        button {
            height: 50px;
            background: orange;
            border: none;
            color: white;
            font-size: 1.25em;
            font-family: 'Nanum Gothic';
            border-radius: 4px;
            cursor: pointer;
            padding: 0 12px;
        }

        button:hover {
            background: #333;
        }
    </style>
</head>
  
<body>


    

    <form action="{{route('web.booking.store')}}" method="post">
        @csrf
        <h1 align='center'>Booking Form</h1>

        <input type="hidden" value="{{$rooms}}" name="rooms">
        <input type="hidden" name="discount_id" value="{{$discounts }}">
        <div class="elem-group">
            <label for="name">Your Name</label>
            <input value="{{auth()->user()->name}}" type="text" id="name" name="name" placeholder="abc" required>
        </div>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="elem-group">
            <label for="email">Your E-mail</label>
            <input value="{{auth()->user()->email}}" type="email" id="email" name="email" placeholder="abc@gmail.com" required>
        </div>
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="elem-group">
            <label for="phone">Your Phone</label>
            <input value="{{auth()->user()->phone}}" type="tel" id="phone" name="phone" placeholder="+88010000000" required>
        </div>
        @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <hr>
        <div class="elem-group inlined">
            <label for="adult">Adults</label>
            <input type="number" id="adult" name="adults" placeholder="adults" min="1" required>
        </div>
        @error('adults')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="elem-group inlined">
            <label for="child">Children</label>
            <input type="number" id="child" name="children" placeholder="children" min="0">
        </div>
        @error('children')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="elem-group inlined">
            <label for="checkin-date">Check-in Date</label>
            <input readonly type="date" id="checkin-date" name="checkin" value="{{$checkin}}">
        </div>
        @error('checkin')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="elem-group inlined">
            <label for="checkout-date">Check-out Date</label>
            <input readonly type="date" id="checkout-date" name="checkout" value="{{$checkout}}">
        </div>
        @error('checkout')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <hr>

        <button type="btn btn-success">Book The Rooms</button>

        
    </form>
    
    <script>
        var currentDateTime = new Date();
        var year = currentDateTime.getFullYear();
        var month = (currentDateTime.getMonth() + 1);
        var date = (currentDateTime.getDate() + 1);

        if (date < 10) {
            date = '0' + date;
        }
        if (month < 10) {
            month = '0' + month;
        }

        var dateTomorrow = year + "-" + month + "-" + date;
        var checkinElem = document.querySelector("#checkin-date");
        var checkoutElem = document.querySelector("#checkout-date");

        checkinElem.setAttribute("min", dateTomorrow);

        checkinElem.onchange = function() {
            checkoutElem.setAttribute("min", this.value);
        }
    </script>
    
</body>


</html>