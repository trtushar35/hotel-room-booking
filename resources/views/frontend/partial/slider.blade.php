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
   <!-- banner -->
   <section class="banner_main">
      <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
         <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
         </ol>
         <div class="carousel-inner">
            <div style="z-index: 1000000; position:absolute; top: 200px; left: 700px; font-family: fantasy">
               <h1 class="text-white display-2">Hotel Sea View</h1>
            </div>
            <div class="carousel-item active">
               <img class="first-slide" src="{{url('frontend/images/banner1.jpg')}}" alt="First slide">
               <div class="container">
               </div>
            </div>
            <div class="carousel-item">
               <img class="second-slide" src="{{url('frontend/images/banner2.jpg')}}" alt="Second slide">
            </div>
            <div class="carousel-item">
               <img class="third-slide" src="{{url('frontend/images/banner3.jpg')}}" alt="Third slide">
            </div>
         </div>
         <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
         </a>
         <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
         </a>
      </div>

      <div class="booking_ocline">
         <div class="container">
            <div class="row">
               <div class="col-md-5">
                  <div class="book_room">
                     <h1>Book a Room Online</h1>
                     <h3 align="center" class="text-white">(Check Available Room)</h3>
                     <form action="{{route('website.room.search')}}" class="book_now" method="post">
                        @csrf
                        <div class="row">
                           <div class="col-md-12">
                              <div class="elem-group inlined">
                                 <label for="checkin-date" class="text-white"><b>Check-in Date</b></label>
                                 <input type="date" id="checkin-date" name="checkin" required>
                              </div>
                              @error('checkin')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                           </div>
                           <div class="col-md-12">

                              <div class="elem-group inlined">
                                 <label for="checkout-date" class="text-white"><b>Check-out Date</b></label>
                                 <input type="date" id="checkout-date" name="checkout" required>
                              </div>
                              @error('checkout')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                           </div>
                           <div class="col-md-12">
                              <button class="btn btn-success">Search Room</button>
                              <!-- <button class="book_btn" ></button> -->
                           </div>


                        </div>
                     </form>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
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
   <!-- end banner -->
</body>

</html>