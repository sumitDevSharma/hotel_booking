@extends('admin.layouts.app')
@section('title')
    @lang($title)
@endsection
@section('content')
    <div class="row ">
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <a href="{{ route('hotels.index') }}">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center ">
                            <div class="col-9">
                                <p class="text-dark mb-0 fw-semibold fs-14">Hotels</p>
                                <h3 class="mt-2 mb-0 fw-bold">{{ $hotels }}</h3>
                            </div>
                            <!--end col-->
                            <div class="col-3 align-self-center">
                                <div
                                    class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                                    <i class="iconoir-hexagon-dice h1 align-self-center mb-0 text-secondary"></i>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                    </div>
                    <!--end card-body-->
                </a>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <a href="{{ route('rooms.index') }}">

                    <div class="card-body">
                        <div class="row d-flex justify-content-center ">
                            <div class="col-9">
                                <p class="text-dark mb-0 fw-semibold fs-14">Rooms</p>
                                <h3 class="mt-2 mb-0 fw-bold">{{ $rooms }}</h3>
                            </div>
                            <!--end col-->
                            <div class="col-3 align-self-center">
                                <div
                                    class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                                    <i class="iconoir-house-rooms h1 align-self-center mb-0 text-secondary"></i>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                    </div>
                </a>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <a href="{{ route('admin.locations') }}">

                    <div class="card-body">
                        <div class="row d-flex justify-content-center ">
                            <div class="col-9">
                                <p class="text-dark mb-0 fw-semibold fs-14">Locations</p>

                                <h3 class="mt-2 mb-0 fw-bold">{{ $locations }}</h3>
                            </div>
                            <!--end col-->
                            <div class="col-3 align-self-center">
                                <div
                                    class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                                    <i class="iconoir-map-pin h1 align-self-center mb-0 text-secondary"></i>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                    </div>
                </a>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->

        <div class="col-md-6 col-lg-4">
            <div class="card">
                <a href="{{ route('users.index') }}">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center ">
                            <div class="col-9">
                                <p class="text-dark mb-0 fw-semibold fs-14">Users</p>

                                <h3 class="mt-2 mb-0 fw-bold">{{ $users }}</h3>
                            </div>
                            <!--end col-->
                            <div class="col-3 align-self-center">
                                <div
                                    class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                                    <i class="iconoir-community h1 align-self-center mb-0 text-secondary"></i>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                    </div>
                </a>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
@endsection
