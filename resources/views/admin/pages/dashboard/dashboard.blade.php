@extends('admin.master')

@section('content')

<div class="container col-12 ">

    <div class="row">
        <div class="col">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                User</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Total User= {{$userCount}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-user fa-2x text-300"></i>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Room List </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Total Room= {{$roomCount}}</div>
                        </div>
                        <div class="col-auto">

                            <i class="fa-solid fa-house fa-2x text-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Amenities</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Total Amenities= {{$amenitiesCount}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-brands fa-algolia text-300"></i>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container col-4 ml-2 ">

    <div class="row">
        <div class="col">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Booking</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Total Booking= {{$bookingCount}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-key text-500"></i>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>



@endsection