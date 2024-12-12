<!-- loader  -->
<div class="loader_bg">
   <div class="loader"><img src="{{url('frontend/images/loading.gif')}}" alt="#" /></div>
</div>
<!-- end loader -->
<!-- header -->
<header>
   <!-- header inner -->
   <div class="header">
      <div class="container">
         <div class="row">




            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10">
               <nav class="navigation navbar navbar-expand-md navbar-dark ">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarsExample04">
                     <ul class="navbar-nav mr-auto">
                        <li class="nav-item ">
                           <a class="nav-link" href="{{route('home')}}">Home</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{route('web.about')}}">About</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{route('web.room')}}">Room</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{route('web.amenities')}}">Amenities</a>
                        </li>

                        <li class="nav-item">
                           <a class="nav-link" href="{{route('web.contuct')}}">Contact</a>
                        </li>
                        @guest
                        <li class="nav-item">
                           <a class="nav-link" href="{{route('website.login')}}">Login</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{route('website.registration')}}">Registration</a>
                        </li>

                        @endguest

                        @auth
                        <div class="list-inline-item me-5">
                           <h3 class="d-flex align-items-center">
                              <b>
                                 <a href="{{route('web.profile')}}" class="text-muted d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#userModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user me-1">
                                       <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                       <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <span>({{ auth()->user()->name }})</span>
                                 </a>
                              </b>
                           </h3>
                        </div>
                        <li class="nav-item">
                           <a class="nav-link" href="{{route('web.booking.list',auth()->user()->id)}}">Booking List</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{ route('web.logout')}}">Logout</a>
                        </li>
                        @endauth
                     </ul>
                  </div>
               </nav>
            </div>

         </div>
      </div>
   </div>
</header>





<!-- end header inner -->
<!-- end header -->