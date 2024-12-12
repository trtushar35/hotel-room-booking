<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        @keyframes slideFromTopToBottom {
            0% {
                transform: translateY(-100%);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        #animated-content {
            animation: slideFromTopToBottom 1.5s ease-in-out;
        }

        .google-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #4285F4;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .google-btn:hover {
            background-color: #357AE8;
        }

        .google-btn img {
            margin-right: 10px;
            width: 20px;
            height: 20px;
        }
    </style>
</head>
<body>
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

<section id="animated-content" class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="{{url('frontend/images/signin-image.jpg')}}" 
          class="img-fluid mt-5 p-5 ml-5" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="{{route('web.login.post')}}" method="post">
          @csrf
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start mb-3">
            <h1 class="lead fw-normal">Sign in</h1>
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
            <label class="form-label" for="form3Example4">Password</label>
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          @if(Session::has('message'))
          <p class="alert alert-danger">{{session()->get('message')}}</p>
          @endif

          <!-- Login Button -->
          <div class="text-center text-lg-start mt-4 pt-2">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
          </div>
          <br>

          <!-- Google Sign-In Button -->
          <div class="text-center mb-3">
            <a href="{{ route('auth.google') }}" class="google-btn">
              <img src="{{url('uploads/download.jpg')}}" alt="Google Logo">
              Sign in with Google
            </a>
          </div>

          <!-- Sign Up Link -->
          <div class="text-center">
            <p>Don't have an account? <a href="{{route('website.registration')}}">Sign Up</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
