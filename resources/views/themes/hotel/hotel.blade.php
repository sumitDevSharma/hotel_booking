@extends($theme . 'layouts.app')
@section('title', trans('Home'))
@section('content')

<style>
   main#content {
    margin: 200px 0 0;
}   
.flex-horizontal-center {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
}

@media (min-width: 1200px) {
    .pl-xl-0, .px-xl-0 {
        padding-left: 0 !important;
    }
}
.col.col-md-7.col-lg-7.col-xl-5.flex-horizontal-center.pl-xl-0 {
    padding: 30px;
}
</style>
    <main id="content">
        <!-- Breadcrumb -->

        <!-- End Breadcrumb -->
        <div class="mt-8 mb-8">
        
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xl-9">
                    <div class="d-block d-md-flex flex-center-between align-items-start mb-2">
                        <div class="mb-3">
                            <ul class="list-unstyled mb-2 d-md-flex flex-lg-wrap flex-xl-nowrap mb-2">
                                <li
                                    class="border border-brown bg-brown rounded-xs d-flex align-items-center text-lh-1 py-1 px-3 mr-md-2 mb-2 mb-md-0 mb-lg-2 mb-xl-0">
                                    <span class="font-weight-normal text-white font-size-14">Newly renovated</span>
                                </li>
                                <li
                                    class="border border-maroon bg-maroon rounded-xs d-flex align-items-center text-lh-1 py-1 px-3 mr-md-2 mb-2 mb-md-0 mb-lg-2 mb-xl-0 mb-md-0">
                                    <span class="font-weight-normal font-size-14 text-white">Free Wi-Fi</span>
                                </li>
                            </ul>
                            <div class="d-block d-md-flex flex-horizontal-center mb-2 mb-md-0">
                                <h4 class="font-size-23 font-weight-bold mb-1">{{ $hotel->name }}</h4>
                                <div class="ml-3 font-size-10 letter-spacing-2">
                                    <span class="d-block green-lighter ml-1">
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="d-block d-md-flex flex-horizontal-center font-size-14 text-gray-1">
                                <i class="icon flaticon-placeholder mr-2 font-size-20"></i> {{ $hotel->address }}
                                <a href="#" class="ml-1 d-block d-md-inline"> - View on map</a>
                            </div>
                        </div>
                    </div>
                    <div id="stickyBlockStartPoint" class="mb-4">
                        <div class="border rounded-pill js-sticky-block p-1 border-width-2 z-index-4 bg-white"
                            data-parent="#stickyBlockStartPoint" data-offset-target="#logoAndNav" data-sticky-view="lg"
                            data-start-point="#stickyBlockStartPoint" data-end-point="#stickyBlockEndPoint"
                            data-offset-top="30" data-offset-bottom="30">
                            <ul class="js-scroll-nav nav tab-nav-pill flex-nowrap tab-nav">
                                <li class="nav-item">
                                    <a class="nav-link font-weight-medium" href="#scroll-description">
                                        <div
                                            class="d-flex flex-column flex-md-row  position-relative text-dark align-items-center">
                                            <span class="tabtext font-weight-semi-bold">Description</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-weight-medium" href="#scroll-rooms">
                                        <div
                                            class="d-flex flex-column flex-md-row  position-relative text-dark align-items-center">
                                            <span class="tabtext font-weight-semi-bold">Rooms</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-weight-medium" href="#scroll-amenities">
                                        <div
                                            class="d-flex flex-column flex-md-row  position-relative text-dark align-items-center">
                                            <span class="tabtext font-weight-semi-bold">Amenities</span>
                                        </div>
                                    </a>
                                </li>
                                
                                
                            </ul>
                        </div>
                    </div>
                    <div class="border-bottom position-relative">
                        <h5 id="scroll-description" class="font-size-21 font-weight-bold text-dark">
                            Description
                        </h5>
                        <p>{{ $hotel->description }}</p>

                        <div class="collapse" id="collapseLinkExample">
                            <p>Once inside the historic palace located on the Right Bank of the Seine, see unmissable and
                                iconic sights Once inside the historic palace located on the Right Bank of the Seine, see
                                unmissable and iconic sights such as the Mona Lisa and Venus de Milo. Discover masterpieces
                                of the Renaissance and ancient Egyptian relics, along with paintings from the 13th to 20th
                                centuries, prints from the Royal Collection, and much more such as the Mona Lisa and Venus
                                de Milo. Discover masterpieces of the Renaissance and ancient Egyptian relics, along with
                                paintings from the 13th to 20th centuries, prints from the Royal Collection, and much more.
                            </p>
                        </div>

                        <a class="link-collapse link-collapse-custom gradient-overlay-half mb-5 d-inline-block border-bottom border-primary"
                            data-toggle="collapse" href="#collapseLinkExample" role="button" aria-expanded="false"
                            aria-controls="collapseLinkExample">
                            <span class="link-collapse__default font-size-14">View More <i
                                    class="flaticon-down-chevron font-size-10 ml-1"></i></span>
                            <span class="link-collapse__active font-size-14">View Less <i
                                    class="flaticon-arrow font-size-10 ml-1"></i></span>
                        </a>
                    </div>

                    
                    <div class="border-bottom py-4">
                        <h5 id="scroll-rooms" class="font-size-21 font-weight-bold text-dark mb-4">
                            Select Your Room
                        </h5>

                        @forelse($rooms as $room)
                        <div class="card border-color-7 mb-5 overflow-hidden">
                            <div class="position-absolute top-0 right-0 mr-md-1 mt-md-1">
                                <div
                                    class="border border-brown bg-brown rounded-xs d-flex align-items-center text-lh-1 py-1 px-3 mr-2 mt-2">
                                    <span class="font-weight-normal text-white font-size-14">Today's best offer</span>
                                </div>
                            </div>
                            <div class="product-item__outer w-100">
                                <div class="row">
                                    <div class="col-md-5 col-lg-5 col-xl-3dot5">
                                        <div class="pt-5 pb-md-5 pl-4 pr-4 pl-md-5 pr-md-2 pr-xl-2">
                                            <div class="product-item__header mt-2 mt-md-0">
                                                <div class="position-relative">
                                                    <img class="img-fluid rounded-sm"
                                                        src="{{ asset($room->images->first()->image_path) }}" 
                                                        alt="Image Description">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col col-md-7 col-lg-7 col-xl-5 flex-horizontal-center pl-xl-0">
                                        <div class="w-100 position-relative m-4 m-md-0">
                                            <a href="../hotels/hotel-booking.html" class="mb-2 d-inline-block">
                                                <span class="font-weight-bold font-size-17 text-dark text-dark">{{$room->name}}</span>
                                            </a>
                                            <div class="mt-1 pt-2">
                                                <div class="d-flex mb-1">
                                                    <div class="ml-0">
                                                        <ul class="list-unstyled mb-0">
                                                            <li class="media mb-3 text-gray-1">
                                                                <small class="mr-2">
                                                                    <small
                                                                        class="flaticon-wifi-signal font-size-17 text-primary"></small>
                                                                </small>
                                                                <div class="media-body font-size-1 ml-1">
                                                                    Free Wi-Fi
                                                                </div>
                                                            </li>
                                                            <li class="media mb-3 text-gray-1">
                                                                <small class="mr-2">
                                                                    <small
                                                                        class="flaticon-plans font-size-17 text-primary"></small>
                                                                </small>
                                                                <div class="media-body font-size-1 ml-1">
                                                                    15 m²
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="ml-7">
                                                        <ul class="list-unstyled mb-0">
                                                            <li class="media mb-3 text-gray-1">
                                                                <small class="mr-2">
                                                                    <small
                                                                        class="flaticon-bed-1 font-size-17 text-primary"></small>
                                                                </small>
                                                                <div class="media-body font-size-1 ml-1">
                                                                    2 single beds
                                                                </div>
                                                            </li>
                                                            <li class="media mb-3 text-gray-1">
                                                                <small class="mr-2">
                                                                    <small
                                                                        class="flaticon-bathtub font-size-17 text-primary"></small>
                                                                </small>
                                                                <div class="media-body font-size-1 ml-1">
                                                                    Shower and bathtub
                                                                </div>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                                <a href="#" class="text-underline font-size-14">Room photos and
                                                    details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col col-xl-3dot5 align-self-center py-4 py-xl-0 border-top border-xl-top-0">
                                        <div
                                            class="flex-content-center border-xl-left py-xl-5 ml-4 ml-xl-0 justify-content-start justify-content-xl-center">
                                            <div class="text-center my-xl-1">
                                                <div class="mb-2 pb-1">
                                                    <span class="font-size-14">From </span>
                                                    <span class="font-weight-bold font-size-22 ml-1"> ${{number_format($room->price_per_night, 2)}}</span>
                                                    <span class="font-size-14"> / night</span>
                                                </div>
                                                <a href="{{route('home.booking', ['hotel' => slug($hotel->name), 'room' => slug($room->name)])}}"
                                                    class="btn btn-outline-primary border-radius-3 border-width-2 px-4 font-weight-bold min-width-200 py-2 text-lh-lg">Book
                                                    Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="alert alert-warning" role="alert">
                            No rooms available
                        </div>
                        @endforelse

                        
                        <h5 id="scroll-amenities" class="font-size-21 font-weight-bold text-dark mb-4">
                            Amenities
                        </h5>
                        <ul class="list-group list-group-borderless list-group-horizontal list-group-flush no-gutters row">
                            <li class="col-md-4 list-group-item"><i
                                    class="flaticon-wifi-signal mr-3 text-primary font-size-24"></i>Wifi</li>
                            <li class="col-md-4 list-group-item"><i
                                    class="flaticon-alarm mr-3 text-primary font-size-24"></i>Wake-up call</li>
                            <li class="col-md-4 list-group-item"><i
                                    class="flaticon-bathrobe mr-3 text-primary font-size-24"></i>Bathrobes</li>
                            <li class="col-md-4 list-group-item"><i
                                    class="flaticon-weightlifting mr-3 text-primary font-size-24"></i>Fitness center</li>
                            <li class="col-md-4 list-group-item"><i
                                    class="flaticon-phone-call mr-3 text-primary font-size-24"></i>Telephone</li>
                            <li class="col-md-4 list-group-item"><i
                                    class="flaticon-folded-towel mr-3 text-primary font-size-24"></i>Dry cleaning</li>
                            <li class="col-md-4 list-group-item"><i
                                    class="flaticon-wine-glass mr-3 text-primary font-size-24"></i>Mini bar</li>
                            <li class="col-md-4 list-group-item"><i
                                    class="flaticon-hair-dryer mr-3 text-primary font-size-24"></i>Hair dryer</li>
                            <li class="col-md-4 list-group-item"><i
                                    class="flaticon-desk-chair mr-3 text-primary font-size-24"></i>High chair</li>
                            <li class="col-md-4 list-group-item"><i
                                    class="flaticon-hamburger mr-3 text-primary font-size-24"></i>Restaurant</li>
                            <li class="col-md-4 list-group-item"><i
                                    class="flaticon-air-conditioner mr-3 text-primary font-size-24"></i>Air Conditioning
                            </li>
                            <li class="col-md-4 list-group-item"><i
                                    class="flaticon-slippers mr-3 text-primary font-size-24"></i>Slippers</li>
                        </ul>
                    </div>
                    

                </div>
                <div class="col-lg-4 col-xl-3">
                        <div class="mb-4">
                            <div class="flex-horizontal-center">
                                <ul class="ml-n1 list-group list-group-borderless list-group-horizontal custom-social-share">
                                    <li class="list-group-item px-1 py-0">
                                        <a href="#" class="height-45 width-45 border rounded border-width-2 flex-content-center">
                                            <i class="flaticon-like font-size-18 text-dark"></i>
                                        </a>
                                    </li>
                                    <li class="list-group-item px-1 py-0">
                                        <a href="#" class="height-45 width-45 border rounded border-width-2 flex-content-center">
                                            <i class="flaticon-share font-size-18 text-dark"></i>
                                        </a>
                                    </li>
                                </ul>
                                <div class="flex-horizontal-center ml-2">
                                    <div class="badge-primary rounded-xs px-1">
                                        <span class="badge font-size-19 px-2 py-2 mb-0 text-lh-inherit">4.6 /5 </span>
                                    </div>

                                    <div class="ml-2 text-lh-1">
                                        <div class="ml-1">
                                            <h4 class="text-primary font-size-17 font-weight-bold mb-0">Excellent</h4>
                                            <span class="text-gray-1 font-size-14">(1,186 Reviews)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="list-unstyled d-md-flex mb-5">
                            <li class="border border-violet-1 bg-violet-1 rounded-xs d-flex align-items-center text-lh-1 py-1 px-3 mb-2 mb-md-0">
                                <span class="font-weight-normal font-size-14 text-white">Lowest price includes</span>
                            </li>
                            <li class="border border-violet-1 rounded-xs d-flex align-items-center text-lh-1 py-1 px-4 ml-md-n1 mb-2 mb-md-0">
                                <span class="font-weight-normal font-size-14 text-violet-1">Free breakfast</span>
                            </li>
                        </ul>
                        <div class="mb-4">
                            <div id="stickyBlockStartPoint1" style="">
                                <div class="js-sticky-block border border-color-7 rounded mb-5 bg-white" data-parent="#stickyBlockStartPoint1" data-offset-target="#logoAndNav" data-sticky-view="lg" data-start-point="#stickyBlockStartPoint1" data-end-point="#stickyBlockEndPoint1" data-offset-top="30" data-offset-bottom="30" style="">
                                    <div class="border-bottom">
                                        <div class="p-4">
                                            <span class="font-size-14">From</span>
                                            <span class="font-size-24 text-gray-6 font-weight-bold ml-1">${{ $hotel->rooms->min('price_per_night') }}</span>
                                            <span class="font-size-14"> / night</span>
                                        </div>
                                    </div>
                                    <div class="p-4">
                                        <!-- Input -->
                                        <span class="d-block text-gray-1 font-weight-normal mb-0 text-left">Check In - Out</span>
                                        <div class="mb-4">
                                            <div class="border-bottom border-width-2 border-color-1">
                                                <div id="datepickerWrapperPick" class="u-datepicker input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="d-flex align-items-center mr-2 font-size-21">
                                                          <i class="flaticon-calendar text-primary font-weight-semi-bold"></i>
                                                        </span>
                                                    </div>
                                                    <input class="js-range-datepicker font-size-lg-16 ml-1 shadow-none font-weight-bold form-control hero-form bg-transparent border-0 flatpickr-input p-0" type="text" placeholder="July 7/2019" aria-label="July 7/2019" data-rp-wrapper="#datepickerWrapperPick" data-rp-type="range" data-rp-date-format="M d / Y" data-rp-default-date="[&quot;Jul 7 / 2020&quot;, &quot;Aug 25 / 2020&quot;]" readonly="readonly" fdprocessedid="qmnnvq" style="width: 217.5px;">
                                                <div class="flatpickr-calendar rangeMode animate showTimeInput" tabindex="-1"><div class="flatpickr-months"><span class="flatpickr-prev-month"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z"></path></svg></span><div class="flatpickr-month"><div class="flatpickr-current-month"><span class="cur-month">July </span><div class="numInputWrapper"><input class="numInput cur-year" type="text" pattern="\d*" tabindex="-1" aria-label="Year"><span class="arrowUp"></span><span class="arrowDown"></span></div></div></div><span class="flatpickr-next-month"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z"></path></svg></span></div><div class="flatpickr-innerContainer"><div class="flatpickr-rContainer"><div class="flatpickr-weekdays"><div class="flatpickr-weekdaycontainer">
      <span class="flatpickr-weekday">
        Mo</span><span class="flatpickr-weekday">Tu</span><span class="flatpickr-weekday">We</span><span class="flatpickr-weekday">Th</span><span class="flatpickr-weekday">Fr</span><span class="flatpickr-weekday">Sa</span><span class="flatpickr-weekday">Su
      </span>
      </div></div><div class="flatpickr-days" tabindex="-1"><div class="dayContainer"><span class="flatpickr-day prevMonthDay" aria-label="June 29, 2020" tabindex="-1">29</span><span class="flatpickr-day prevMonthDay" aria-label="June 30, 2020" tabindex="-1">30</span><span class="flatpickr-day " aria-label="July 1, 2020" tabindex="-1">1</span><span class="flatpickr-day " aria-label="July 2, 2020" tabindex="-1">2</span><span class="flatpickr-day " aria-label="July 3, 2020" tabindex="-1">3</span><span class="flatpickr-day " aria-label="July 4, 2020" tabindex="-1">4</span><span class="flatpickr-day " aria-label="July 5, 2020" tabindex="-1">5</span><span class="flatpickr-day " aria-label="July 6, 2020" tabindex="-1">6</span><span class="flatpickr-day selected startRange" aria-label="July 7, 2020" tabindex="-1">7</span><span class="flatpickr-day inRange" aria-label="July 8, 2020" tabindex="-1">8</span><span class="flatpickr-day inRange" aria-label="July 9, 2020" tabindex="-1">9</span><span class="flatpickr-day inRange" aria-label="July 10, 2020" tabindex="-1">10</span><span class="flatpickr-day inRange" aria-label="July 11, 2020" tabindex="-1">11</span><span class="flatpickr-day inRange" aria-label="July 12, 2020" tabindex="-1">12</span><span class="flatpickr-day inRange" aria-label="July 13, 2020" tabindex="-1">13</span><span class="flatpickr-day inRange" aria-label="July 14, 2020" tabindex="-1">14</span><span class="flatpickr-day inRange" aria-label="July 15, 2020" tabindex="-1">15</span><span class="flatpickr-day inRange" aria-label="July 16, 2020" tabindex="-1">16</span><span class="flatpickr-day inRange" aria-label="July 17, 2020" tabindex="-1">17</span><span class="flatpickr-day inRange" aria-label="July 18, 2020" tabindex="-1">18</span><span class="flatpickr-day inRange" aria-label="July 19, 2020" tabindex="-1">19</span><span class="flatpickr-day inRange" aria-label="July 20, 2020" tabindex="-1">20</span><span class="flatpickr-day inRange" aria-label="July 21, 2020" tabindex="-1">21</span><span class="flatpickr-day inRange" aria-label="July 22, 2020" tabindex="-1">22</span><span class="flatpickr-day inRange" aria-label="July 23, 2020" tabindex="-1">23</span><span class="flatpickr-day inRange" aria-label="July 24, 2020" tabindex="-1">24</span><span class="flatpickr-day inRange" aria-label="July 25, 2020" tabindex="-1">25</span><span class="flatpickr-day inRange" aria-label="July 26, 2020" tabindex="-1">26</span><span class="flatpickr-day inRange" aria-label="July 27, 2020" tabindex="-1">27</span><span class="flatpickr-day inRange" aria-label="July 28, 2020" tabindex="-1">28</span><span class="flatpickr-day inRange" aria-label="July 29, 2020" tabindex="-1">29</span><span class="flatpickr-day inRange" aria-label="July 30, 2020" tabindex="-1">30</span><span class="flatpickr-day inRange" aria-label="July 31, 2020" tabindex="-1">31</span><span class="flatpickr-day nextMonthDay inRange" aria-label="August 1, 2020" tabindex="-1">1</span><span class="flatpickr-day nextMonthDay inRange" aria-label="August 2, 2020" tabindex="-1">2</span><span class="flatpickr-day nextMonthDay inRange" aria-label="August 3, 2020" tabindex="-1">3</span><span class="flatpickr-day nextMonthDay inRange" aria-label="August 4, 2020" tabindex="-1">4</span><span class="flatpickr-day nextMonthDay inRange" aria-label="August 5, 2020" tabindex="-1">5</span><span class="flatpickr-day nextMonthDay inRange" aria-label="August 6, 2020" tabindex="-1">6</span><span class="flatpickr-day nextMonthDay inRange" aria-label="August 7, 2020" tabindex="-1">7</span><span class="flatpickr-day nextMonthDay inRange" aria-label="August 8, 2020" tabindex="-1">8</span><span class="flatpickr-day nextMonthDay inRange" aria-label="August 9, 2020" tabindex="-1">9</span></div></div></div></div></div></div>
                                                <!-- End Datepicker -->
                                            </div>
                                        </div>
                                        <!-- End Input -->
                                        <!-- Input -->
                                        <span class="d-block text-gray-1 font-weight-normal mb-0 text-left">Guests</span>
                                        <div class="mb-4 position-relative">
                                            <div class="border-bottom border-width-2 border-color-1">
                                                <a id="basicDropdownClickInvoker" class="dropdown-nav-link dropdown-toggle flex-horizontal-center pt-3 pb-2" href="javascript:;" role="button" aria-controls="basicDropdownClick" aria-haspopup="true" aria-expanded="false" data-unfold-event="click" data-unfold-target="#basicDropdownClick" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300" data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                                                    <i class="flaticon-add-group d-flex align-items-center mr-3 font-size-20 text-primary font-weight-semi-bold"></i>
                                                    <span class="text-black font-size-16 font-weight-semi-bold mr-auto">2 Rooms - 3 Guests</span>
                                                </a>
                                                <div id="basicDropdownClick" class="dropdown-menu dropdown-unfold col m-0 u-unfold--css-animation u-unfold--hidden fadeOut" aria-labelledby="basicDropdownClickInvoker" style="animation-duration: 300ms;">
                                                    <div class="w-100 py-2 px-3 mb-3">
                                                        <div class="js-quantity mx-3 row align-items-center justify-content-between">
                                                            <span class="d-block font-size-16 text-secondary font-weight-medium">Rooms</span>
                                                            <div class="d-flex">
                                                                <a class="js-minus btn btn-icon btn-medium btn-outline-secondary rounded-circle" href="javascript:;">
                                                                    <small class="fas fa-minus btn-icon__inner"></small>
                                                                </a>
                                                                <input class="js-result form-control h-auto border-0 rounded p-0 max-width-6 text-center" type="text" value="1">
                                                                <a class="js-plus btn btn-icon btn-medium btn-outline-secondary rounded-circle" href="javascript:;">
                                                                    <small class="fas fa-plus btn-icon__inner"></small>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="w-100 py-2 px-3 mb-3">
                                                        <div class="js-quantity mx-3 row align-items-center justify-content-between">
                                                            <span class="d-block font-size-16 text-secondary font-weight-medium">Adults</span>
                                                            <div class="d-flex">
                                                                <a class="js-minus btn btn-icon btn-medium btn-outline-secondary rounded-circle" href="javascript:;">
                                                                    <small class="fas fa-minus btn-icon__inner"></small>
                                                                </a>
                                                                <input class="js-result form-control h-auto border-0 rounded p-0 max-width-6 text-center" type="text" value="1">
                                                                <a class="js-plus btn btn-icon btn-medium btn-outline-secondary rounded-circle" href="javascript:;">
                                                                    <small class="fas fa-plus btn-icon__inner"></small>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="w-100 py-2 px-3">
                                                        <div class="js-quantity mx-3 row align-items-center justify-content-between">
                                                            <span class="d-block font-size-16 text-secondary font-weight-medium">Child</span>
                                                            <div class="d-flex">
                                                                <a class="js-minus btn btn-icon btn-medium btn-outline-secondary rounded-circle" href="javascript:;">
                                                                    <small class="fas fa-minus btn-icon__inner"></small>
                                                                </a>
                                                                <input class="js-result form-control h-auto border-0 rounded p-0 max-width-6 text-center" type="text" value="1">
                                                                <a class="js-plus btn btn-icon btn-medium btn-outline-secondary rounded-circle" href="javascript:;">
                                                                    <small class="fas fa-plus btn-icon__inner"></small>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="w-100 text-right py-1 pr-5">
                                                        <a class="text-primary font-weight-semi-bold font-size-16" href="#">Done</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Input -->

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary height-60 w-100 mb-xl-0 mb-lg-1 transition-3d-hover" fdprocessedid="bsdb5n"><i class="flaticon-magnifying-glass mr-2"></i>Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>

            </div>

            <!-- End Product Cards Ratings With carousel -->
        </div>
    </main>


@endsection
