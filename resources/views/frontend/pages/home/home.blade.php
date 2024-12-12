@extends('frontend.partial.master')

@section('rony')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<script>
    // Hide the session message after 5 seconds
    setTimeout(() => {
        const message = document.getElementById('session-message');
        if (message) {
            // Remove the Bootstrap "show" class to fade out the alert
            message.classList.remove('show');
            // Optionally, completely remove the alert from the DOM after fading
            setTimeout(() => message.remove(), 150); // Adjust timing for fade out
        }
    }, 5000);
</script>



      <!-- Header -->
      @include('frontend.partial.header')

      <!-- Slider -->
      @include('frontend.partial.slider')

      <!-- about -->
      @include('frontend.partial.about')

      <!-- our rooms -->
      @include('frontend.partial.rooms')      
 
      <!-- gallery -->
      @include('frontend.partial.roomlist')

      <!-- blog -->
      @include('frontend.partial.amenities')

      <!--  contact -->
      @include('frontend.partial.contact')

      <hr>

      <!--  review -->
      @include('frontend.partial.review')

      

      <!--  footer -->
      @include('frontend.partial.footer')

@endsection