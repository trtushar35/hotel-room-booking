<!-- our_room -->


<!-- our_room -->


<div class="our_room">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2>Amenities</h2>

            </div>
         </div>
      </div>
      <div class="row">
      @foreach($allAmenities as $amenities)
         <div class="col-md-4 col-sm-6">
            <div id="serv_hover" class="room">
               <div class="room_img">
                  <figure><img style="width: 400px; height: 300px" src="{{ url('/uploads/amenities/',$amenities->image) }}"></figure>
               </div>
               <div class="bed_room">
                  <h3>{{$amenities->amenities_type}}</h3>
                  
                  
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</div>
<!-- end our_room -->