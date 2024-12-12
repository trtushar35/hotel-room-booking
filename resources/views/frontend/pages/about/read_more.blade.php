@extends('frontend.partial.master')

@section('rony')
@include('frontend.partial.header')


<div class="about">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="titlepage">
                    <h2 align="center">About Us</h2>
                </div>
            </div>


        </div>
    </div>
</div>



    <div class="container">
        <div class="row mt-6">


            <div class="col-md-12">
                <div class="card" style="width:1000px">
                    
                    <div class="card-body">
                        <h4 class="card-title">About Us:</h4>
                        <p class="card-text">
                            At Hotel Sea View, we believe in turning moments into memories. Our establishment stands as a testament to the fusion of modern luxury and the timeless allure of oceanfront living. Whether you're seeking a romantic escape, a family adventure, or a corporate retreat, our seaside haven is crafted to cater to all your desires.</p>
                        <br>
                        <h4 class="card-title">Our Coastal Retreat:</h4>
                        Perched on the edge of Cox's Bazar azure waters, our hotel boasts unparalleled sea views that paint the perfect backdrop for an unforgettable stay. Feel the gentle sea breeze, listen to the soothing rhythm of the waves, and immerse yourself in the serenity that only a coastal retreat can offer.</p>
                        <br>

                        <h4 class="card-title">A Symphony of Amenities:</h4>
                        <p class="card-text">Indulge in a range of amenities designed to elevate your seaside experience. From well-appointed rooms with panoramic sea views to gourmet dining options that tantalize your taste buds with fresh, local flavors – every detail is meticulously curated to ensure your stay is nothing short of extraordinary.</p>
                        <br>

                        <h4 class="card-title">Seaside Events & Celebrations:</h4>
                        <p class="card-text">Planning a special event? Our sea-view venues provide an enchanting setting for weddings, corporate gatherings, and celebrations of all kinds. Let the backdrop of the ocean add a touch of magic to your special moments.</p>
                        <br>

                        <h4 class="card-title">Sustainability & Respect for Nature:</h4>
                        <p class="card-text">As stewards of the coastline, we are committed to sustainable practices that preserve the natural beauty surrounding us. From energy-efficient initiatives to responsible waste management, we strive to minimize our ecological footprint while providing an exceptional guest experience.</p>
                        <br>

                        <h4 class="card-title">Our Team:</h4>
                        <p class="card-text">The heart of Hotel Sea View lies in our dedicated and passionate team. From the warm welcome at the reception to the personalized service throughout your stay, our team is committed to ensuring your time with us exceeds expectations.</p>
                        <br>

                        <h4 class="card-title">Book Your Seaside Escape:</h4>
                        <p class="card-text">Embark on a journey of coastal luxury with Hotel Sea View. Discover the allure of waking up to the sound of waves, the joy of panoramic sunsets, and the serenity that only a sea-view retreat can provide. Book your stay with us and let the ocean be your constant companion on this unforgettable voyage.</p>
                        <br>

                        <p class="card-text">At Hotel Sea View, we don't just offer accommodations; we offer an invitation to experience the beauty and magic of the sea like never before. Welcome to a world where the horizon meets hospital</p>
                        <br>
                        <a href="{{route('home')}}" class="col-ml-3 btn btn-primary">Back</a>
                    </div>
                </div>

            </div>


            <div class="col-md-3"></div>
        </div>
    </div>


    <!--  footer -->
    @include('frontend.partial.footer')
    @endsection