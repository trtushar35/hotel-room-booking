<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   @notifyCss
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>Hotel Sea View</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="{{url('frontend/css/bootstrap.min.css')}}">
   <!-- style css -->
   <link rel="stylesheet" href="{{url('frontend/css/style.css')}}">
   <!-- Responsive-->
   <link rel="stylesheet" href="{{url('frontend/css/responsive.css')}}">
   <!-- fevicon -->
   <link rel="icon" href="{{url('frontend/images/fevicon.png')}}" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="{{url('frontend/css/jquery.mCustomScrollbar.min.css')}}">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet" />

   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   <style>
      body {
         margin-top: 20px;
      }

      .align-center {
         text-align: center;
      }

      .hash-list {
         display: block;
         padding: 0;
         margin: 0 auto;
      }

      @media (min-width: 768px) {
         .hash-list.cols-3>li:nth-last-child(-n+3) {
            border-bottom: none;
         }
      }

      @media (min-width: 768px) {
         .hash-list.cols-3>li {
            width: 33.3333%;
         }
      }

      .hash-list>li {
         display: block;
         float: left;
         border-right: 1px solid rgba(0, 0, 0, 0.2);
         border-bottom: 1px solid rgba(0, 0, 0, 0.2);
      }

      .pad-30,
      .pad-30-all>* {
         padding: 30px;
      }

      img {
         border: 0;
      }

      .mgb-20,
      .mgb-20-all>* {
         margin-bottom: 20px;
      }

      .wpx-100,
      .wpx-100-after:after {
         width: 100px;
      }

      .img-round,
      .img-rel-round {
         border-radius: 50%;
      }

      .padb-30,
      .padb-30-all>* {
         padding-bottom: 30px;
      }

      .mgb-40,
      .mgb-40-all>* {
         margin-bottom: 40px;
      }

      .align-center {
         text-align: center;
      }

      [class*="line-b"] {
         position: relative;
         padding-bottom: 20px;
         border-color: #E6AF2A;
      }

      .fg-text-d,
      .fg-hov-text-d:hover,
      .fg-active-text-d.active {
         color: #222;
      }

      .font-cond-b {
         font-weight: 700 !important;
      }





      .stretch-card>.card {
         width: 100%;
         min-width: 100%
      }

      body {
         background-color: #f9f9fa
      }

      .flex {
         -webkit-box-flex: 1;
         -ms-flex: 1 1 auto;
         flex: 1 1 auto
      }

      @media (max-width:991.98px) {
         .padding {
            padding: 1.5rem
         }
      }

      @media (max-width:767.98px) {
         .padding {
            padding: 1rem
         }
      }

      .padding {
         padding: 3rem
      }


      .owl-carousel .item {
         margin: 3px;
      }

      .owl-carousel .item img {
         display: block;
         width: 100%;
         height: auto;
      }

      .owl-carousel .item {
         margin: 3px;
      }

      .owl-carousel {
         margin-bottom: 15px;
      }
   </style>

</head>
<!-- body -->

<body class="main-layout">

   <!-- Header -->
   @yield('rony')

   <!-- Slider -->


   <!-- about -->

   @include('notify::components.notify')

   <!-- our_room -->


   <!-- gallery -->


   <!-- blog -->


   <!--  contact -->


   <!--  footer -->


   <!-- Javascript files-->
   <script src="{{url('frontend/js/jquery.min.js')}}"></script>
   <script src="{{url('frontend/js/bootstrap.bundle.min.js')}}"></script>
   <script src="{{url('frontend/js/jquery-3.0.0.min.js')}}"></script>
   <!-- sidebar -->
   <script src="{{url('frontend/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
   <script src="{{url('frontend/js/custom.js')}}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>
   @notifyJs
   <script>
      (function(window, document) {
         var loader = function() {
            var script = document.createElement("script"),
               tag = document.getElementsByTagName("script")[0];
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
            tag.parentNode.insertBefore(script, tag);
         };

         window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
      })(window, document);











      $(document).ready(function() {

         $(".owl-carousel").owlCarousel({

            autoPlay: 3000,
            items: 4,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 3],
            center: true,
            nav: true,
            loop: true,
            responsive: {
               600: {
                  items: 4
               }
            }






         });

      });
   </script>

</body>

</html>