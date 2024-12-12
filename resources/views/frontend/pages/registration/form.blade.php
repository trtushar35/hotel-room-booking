<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
 <style>
 @keyframes slideFromTopToBottom {
            0% {
                transform: translateY(-100%);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1.5;
            }
        }

        #animated-content {
            animation: slideFromTopToBottom 1.5s ease-in-out;
        }
        </style>
</head>
<body>
<section id="animated-content" class="vh-100">

  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="{{url('frontend/images/signup-image.jpg')}}" 
          class="img-fluid mt-5 p-5 ml-5 " alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        
        <form action="{{route('website.user.registration')}}" method='post'>
            @csrf
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-0 me-3"><h1>Sign up</h1> </p>
          </div>

          <div class="form-outline mb-4">
            <input required type="text" id="form3Example3" name="name" class="form-control form-control-lg"
              placeholder="Enter Full_Name" />
            <label class="form-label" for="form3Example3">Name</label>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>


            <div class="form-outline mb-4">
            <input required type="file" id="form3Example3" name="image" class="form-control form-control-lg"
              placeholder="Choose Image" />
            <label class="form-label" for="form3Example3">Image</label>
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-outline mb-4">
            <input required type="text" id="form3Example3" name="phone" class="form-control form-control-lg"
              placeholder="Enter Contuct Number" />
            <label class="form-label" for="form3Example3">Phone No</label>
            @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="form-outline mb-4">
            <input required type="text" id="form3Example3" name="address" class="form-control form-control-lg"
              placeholder="Enter Addresse" />
            <label class="form-label" for="form3Example3">Address</label>
            @error('address')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input required type="email" id="form3Example3" name="email" class="form-control form-control-lg"
              placeholder="Enter a valid email address" />
            <label class="form-label" for="form3Example3">Email address</label>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          
          <!-- Password input -->
          <div class="form-outline mb-3">
            <input required type="password" id="form3Example4" name="password" class="form-control form-control-lg"
              placeholder="Enter password" />
            <label  class="form-label" for="form3Example4">Password</label>
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="text-center text-lg-start mt-4 pt-2">
          <button class="btn btn-primary btn-lg btn-block" type="submit">Sign up</button>
          </div>
          <br>
          <div>
            <p>Already you have an account? <a href="{{route('website.login')}}">Sign in</a></p>
          </div>
          
        </form>
      </div>
    </div>
  </div>
  <!--<div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">

  </div>-->
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>