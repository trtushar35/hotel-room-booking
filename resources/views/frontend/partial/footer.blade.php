<footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class=" col-md-4">
                     <h3>Contact US</h3>
                     <ul class="conta">
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> Address</li>
                        <li><i class="fa fa-mobile" aria-hidden="true"></i> +01 1234569540</li>
                        <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="#"> demo@gmail.com</a></li>
                     </ul>
                  </div>
                  <div class="col-md-4">
                     <h3>Menu Link</h3>
                     <ul class="link_menu">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><a href="{{route('web.about')}}"> about</a></li>
                        <li><a href="{{route('web.room')}}">Our Room</a></li>
                        <li><a href="{{route('web.amenities')}}">Amenity</a></li>
                        <li><a href="{{route('web.contuct')}}">Contact Us</a></li>
                        @guest
                        <li><a href="{{route('website.login')}}">Login</a></li>
                        <li><a href="{{route('website.registration')}}">Registration</a></li>
                        @endguest
                        @auth
                        <li><a href="{{route('web.profile',auth()->user()->id)}}"> My Profile</a></li>
                        <li><a href="{{route('web.booking.list',auth()->user()->id)}}"> Booking List</a></li>
                        <li><a href="{{route('web.logout')}}"> Logout</a></li>
                        @endauth
                     </ul>
                  </div>
                  <div class="col-md-4">
                     <h3>News letter</h3>
                     
                     <ul class="social_icon">
                        <li><a href="https://www.facebook.com/tanvirahammad.rony/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>  
                        <li><a href="https://www.linkedin.com/in/md-tanvir-1386261a3/"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.youtube.com/watch?v=uDeXz-f3TVI"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-10 offset-md-1">
                        
                        <p>
                        © 2024 All Rights Reserved. NUB ECSE TEAM 
                        <br><br>
                        
                        </p>

                     </div>
                  </div>
               </div>
            </div>
         </div>
   </footer>