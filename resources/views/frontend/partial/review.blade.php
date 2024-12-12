
  <div class="page-content page-container" id="page-content">
    <div class="padding">
      <div class="row container-fluid">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h1 class="card-title" align="center" ><b>Read Customer Reviews</b></h1>
             
              @auth
              <a align="center"  class="btn btn-primary" href="{{route('web.review')}}">Give Review</a>
              @endauth
              <div class="owl-carousel">

              @foreach($reviewRatings as $review)
                <div class="item">
                <img src="{{url('uploads/users',$review->user->image)}}" class="wpx-1000 img-round mgb-20 ">
                  <p align="center" class="fs-110 font-cond-l" contenteditable="true">"{{$review->review}}"</p>
                  <h5 align="center"  class="font-cond mgb-5 fg-text-d fs-130" contenteditable="true">Guest Name:{{$review->user->name}}</h5>
                  
                </div>

                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>