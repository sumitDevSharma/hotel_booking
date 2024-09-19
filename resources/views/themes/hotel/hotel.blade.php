@extends($theme . 'layouts.app')
@section('title', trans('Home'))
@section('content')
    <main id="content">
        <!-- Breadcrumb -->

        <!-- End Breadcrumb -->
        <div class="mt-8 mb-8">
            <!-- Images Carousel -->

            <!-- End Images Carousel -->
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
                                <h4 class="font-size-23 font-weight-bold mb-1">Park Avenue Baker Street London</h4>
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
                                <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Greater London, United Kingdom
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
                                <li class="nav-item">
                                    <a class="nav-link font-weight-medium" href="#scroll-rules">
                                        <div
                                            class="d-flex flex-column flex-md-row  position-relative text-dark align-items-center">
                                            <span class="tabtext font-weight-semi-bold">Rules</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-weight-medium" href="#scroll-reviews">
                                        <div
                                            class="d-flex flex-column flex-md-row  position-relative text-dark align-items-center">
                                            <span class="tabtext font-weight-semi-bold">Reviews</span>
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
                        <p>The 4-star Park Central Hotel offers comfort and convenience whether you're on business or
                            holiday in New York (NY). Featuring a complete list of amenities, guests will find their stay at
                            the property a comfortable one. Service-minded staff will welcome and guide you at the Park
                            Central Hotel. Air conditioning, heating, desk, alarm clock, iPod docking station can be found
                            in selected guestrooms. The hotel offers various recreational opportunities. Park Central Hotel
                            combines warm hospitality with a lovely ambiance to make your stay in New York (NY)
                            unforgettable.</p>

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
                                                        src="../../assets/img/200x154/img1.jpg" alt="Image Description">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col col-md-7 col-lg-7 col-xl-5 flex-horizontal-center pl-xl-0">
                                        <div class="w-100 position-relative m-4 m-md-0">
                                            <a href="../hotels/hotel-booking.html" class="mb-2 d-inline-block">
                                                <span class="font-weight-bold font-size-17 text-dark text-dark">Deluxe Twin
                                                    Room</span>
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
                                                    <span class="font-weight-bold font-size-22 ml-1"> £899.00</span>
                                                    <span class="font-size-14"> / night</span>
                                                </div>
                                                <a href="../hotels/hotel-booking.html"
                                                    class="btn btn-outline-primary border-radius-3 border-width-2 px-4 font-weight-bold min-width-200 py-2 text-lh-lg">Book
                                                    Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border-color-7 mb-5 overflow-hidden">
                            <div class="position-absolute top-0 right-0 mr-md-1 mt-md-1">
                                <div
                                    class="border border-maroon bg-maroon rounded-xs d-flex align-items-center text-lh-1 py-1 px-3 mr-2 mt-2">
                                    <span class="font-weight-normal text-white font-size-14">Save 13% Today</span>
                                </div>
                            </div>
                            <div class="product-item__outer w-100">
                                <div class="row">
                                    <div class="col-md-5 col-lg-5 col-xl-3dot5">
                                        <div class="pt-5 pb-md-5 pl-4 pr-4 pl-md-5 pr-md-2 pr-xl-2">
                                            <div class="product-item__header mt-2 mt-md-0">
                                                <div class="position-relative">
                                                    <img class="img-fluid rounded-sm"
                                                        src="../../assets/img/200x154/img2.jpg" alt="Image Description">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col col-md-7 col-lg-7 col-xl-5 flex-horizontal-center pl-xl-0">
                                        <div class="w-100 position-relative m-4 m-md-0">
                                            <a href="../hotels/hotel-booking.html" class="mb-2 d-inline-block">
                                                <span class="font-weight-bold font-size-17 text-dark text-dark">Deluxe Gold
                                                    Twin Room</span>
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
                                                    <span class="font-weight-bold font-size-22 ml-1"> £480.00</span>
                                                    <span class="font-size-14"> / night</span>
                                                </div>
                                                <a href="../hotels/hotel-booking.html"
                                                    class="btn btn-outline-primary border-radius-3 border-width-2 px-4 font-weight-bold min-width-200 py-2 text-lh-lg">Book
                                                    Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border-color-7 mb-5 overflow-hidden">
                            <div class="product-item__outer w-100">
                                <div class="row">
                                    <div class="col-md-5 col-lg-5 col-xl-3dot5">
                                        <div class="pt-5 pb-md-5 pl-4 pr-4 pl-md-5 pr-md-2 pr-xl-2">
                                            <div class="product-item__header mt-2 mt-md-0">
                                                <div class="position-relative">
                                                    <img class="img-fluid rounded-sm"
                                                        src="../../assets/img/200x154/img3.jpg" alt="Image Description">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col col-md-7 col-lg-7 col-xl-5 flex-horizontal-center pl-xl-0">
                                        <div class="w-100 position-relative m-4 m-md-0">
                                            <a href="../hotels/hotel-booking.html" class="mb-2 d-inline-block">
                                                <span class="font-weight-bold font-size-17 text-dark text-dark">Rock
                                                    Royalty Queen Room</span>
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
                                                    <span class="font-weight-bold font-size-22 ml-1"> £999.00</span>
                                                    <span class="font-size-14"> / night</span>
                                                </div>
                                                <a href="../hotels/hotel-booking.html"
                                                    class="btn btn-outline-primary border-radius-3 border-width-2 px-4 font-weight-bold min-width-200 py-2 text-lh-lg">Book
                                                    Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                    <div class="border-bottom py-4 position-relative">
                        <h5 id="scroll-specifications" class="font-size-21 font-weight-bold text-dark mb-4">
                            Nearest Essentials
                        </h5>
                        <ul class="list-group list-group-borderless list-group-horizontal list-group-flush no-gutters row">
                            <li class="col-md-4 mb-5 list-group-item py-0">
                                <div class="font-weight-bold text-dark mb-1">Airports</div>
                                <div class="text-gray-1">London City Airport (LCY)</div>
                                <div class="text-primary mb-2">14.4 km</div>
                                <div class="text-gray-1">Heathrow Airport (LHR)</div>
                                <div class="text-primary">21.2 km</div>
                            </li>
                            <li class="col-md-4 mb-5 list-group-item py-0">
                                <div class="font-weight-bold text-dark mb-1">Public transportation</div>
                                <div class="text-gray-1">Marble Arch Tube Station</div>
                                <div class="text-primary mb-2">40 m</div>
                                <div class="text-gray-1">Baker Street Tube Station</div>
                                <div class="text-primary">9 m</div>
                            </li>
                            <li class="col-md-4 mb-5 list-group-item py-0">
                                <div class="font-weight-bold text-dark mb-1">Hospital or clinic</div>
                                <div class="text-gray-1">The Wellington Hospital</div>
                                <div class="text-primary">2.1 km</div>
                            </li>
                            <li class="col-md-4 mb-5 list-group-item py-0">
                                <div class="font-weight-bold text-dark mb-1">Horsepower (hp)</div>
                                <div class="text-gray-1">200</div>
                            </li>
                            <li class="col-md-4 mb-5 list-group-item py-0">
                                <div class="font-weight-bold text-dark mb-1">Transmission</div>
                                <div class="text-gray-1">Manual</div>
                            </li>
                            <li class="col-md-4 mb-5 list-group-item py-0">
                                <div class="font-weight-bold text-dark mb-1">Condition</div>
                                <div class="text-gray-1">New</div>
                            </li>
                            <li class="col-md-4 mb-5 list-group-item py-0">
                                <div class="font-weight-bold text-dark mb-1">Drive</div>
                                <div class="text-gray-1">Rear</div>
                            </li>
                            <li class="col-md-4 mb-5 list-group-item py-0">
                                <div class="font-weight-bold text-dark mb-1">Warranty</div>
                                <div class="text-gray-1">Yes</div>
                            </li>
                            <li class="col-md-4 mb-5 list-group-item py-0">
                                <div class="font-weight-bold text-dark mb-1">Hospital or clinic</div>
                                <div class="text-gray-1">The Wellington Hospital</div>
                                <div class="text-primary">2.1 km</div>
                            </li>
                        </ul>
                        <div class="collapse" id="collapseLinkExample2">
                            <ul
                                class="list-group list-group-borderless list-group-horizontal list-group-flush no-gutters row">
                                <li class="col-md-4 mb-5 list-group-item py-0">
                                    <div class="font-weight-bold text-dark mb-1">Airports</div>
                                    <div class="text-gray-1">London City Airport (LCY)</div>
                                    <div class="text-primary mb-2">14.4 km</div>
                                    <div class="text-gray-1">Heathrow Airport (LHR)</div>
                                    <div class="text-primary">21.2 km</div>
                                </li>
                                <li class="col-md-4 mb-5 list-group-item py-0">
                                    <div class="font-weight-bold text-dark mb-1">Public transportation</div>
                                    <div class="text-gray-1">Marble Arch Tube Station</div>
                                    <div class="text-primary mb-2">40 m</div>
                                    <div class="text-gray-1">Baker Street Tube Station</div>
                                    <div class="text-primary">9 m</div>
                                </li>
                                <li class="col-md-4 mb-5 list-group-item py-0">
                                    <div class="font-weight-bold text-dark mb-1">Shopping</div>
                                    <div class="text-gray-1">Harrods</div>
                                    <div class="text-primary">1.5 km</div>
                                </li>
                            </ul>
                        </div>

                        <a class="link-collapse link-collapse-custom gradient-overlay-half mb-5 d-inline-block border-bottom border-primary"
                            data-toggle="collapse" href="#collapseLinkExample2" role="button" aria-expanded="false"
                            aria-controls="collapseLinkExample2">
                            <span class="link-collapse__default font-size-14">View More <i
                                    class="flaticon-down-chevron font-size-10 ml-1"></i></span>
                            <span class="link-collapse__active font-size-14">View Less <i
                                    class="flaticon-arrow font-size-10 ml-1"></i></span>
                        </a>
                    </div>
                    <div class="border-bottom py-4 position-relative">
                        <h5 id="scroll-specifications" class="font-size-21 font-weight-bold text-dark mb-4">
                            What's Nearby
                        </h5>
                        <ul class="list-group list-group-borderless list-group-horizontal list-group-flush no-gutters row">
                            <li class="col-md-4 list-group-item py-0">
                                <div class="font-weight-bold text-dark mb-2">Popular landmarks</div>
                                <div class="text-gray-1 mb-2 pt-1">Buckingham Palace - 1.84 km</div>
                                <div class="text-gray-1 mb-2 pt-1">St. James's Park - 2.09 km</div>
                                <div class="text-gray-1 mb-2 pt-1">British Museum - 2.32 km</div>
                                <div class="text-gray-1 mb-2 pt-1">Westminster Abbey - 2.65 km</div>
                                <div class="text-gray-1 mb-2 pt-1">Houses of Parliament - 2.78 km</div>
                                <div class="text-gray-1 mb-2 pt-1">Camden Market - 3.31 km</div>
                                <div class="text-gray-1 mb-2 pt-1">Tower Bridge - 5.85 km</div>
                                <div class="text-gray-1 mb-2 pt-1">Tower of London - 5.76 km</div>
                            </li>
                            <li class="col-md-4 list-group-item py-0">
                                <div class="font-weight-bold text-dark mb-2">Nearby landmarks</div>
                                <div class="text-gray-1 mb-2 pt-1">Marble Arch Tube Station - 40 m</div>
                                <div class="text-gray-1 mb-2 pt-1">Still Water Horse Head Statue - 70 m</div>
                                <div class="text-gray-1 mb-2 pt-1">Marble Arch - 80 m</div>
                                <div class="text-gray-1 mb-2 pt-1">Tyburn Tree - 140 m</div>
                                <div class="text-gray-1 mb-2 pt-1">Speakers’ Corner - 160 m</div>
                                <div class="text-gray-1 mb-2 pt-1">Homemade London - 220 m</div>
                                <div class="text-gray-1 mb-2 pt-1">Salt Whisky Bar - 240 m</div>
                                <div class="text-gray-1 mb-2 pt-1">Clarks - 280 m</div>
                            </li>
                        </ul>
                        <div class="collapse" id="collapseLinkExample3">
                            <ul
                                class="list-group list-group-borderless list-group-horizontal list-group-flush no-gutters row">
                                <li class="col-md-4 mb-2 list-group-item py-0">
                                    <div class="text-gray-1 mb-2 pt-1">Buckingham Palace - 1.84 km</div>
                                    <div class="text-gray-1 mb-2 pt-1">St. James's Park - 2.09 km</div>
                                    <div class="text-gray-1 mb-2 pt-1">British Museum - 2.32 km</div>
                                </li>
                                <li class="col-md-4 mb-2 list-group-item py-0">
                                    <div class="text-gray-1 mb-2 pt-1">Marble Arch Tube Station - 40 m</div>
                                    <div class="text-gray-1 mb-2 pt-1">Still Water Horse Head Statue - 70 m</div>
                                    <div class="text-gray-1 mb-2 pt-1">Marble Arch - 80 m</div>
                                </li>
                            </ul>
                        </div>

                        <a class="link-collapse link-collapse-custom gradient-overlay-half mb-5 d-inline-block border-bottom border-primary"
                            data-toggle="collapse" href="#collapseLinkExample3" role="button" aria-expanded="false"
                            aria-controls="collapseLinkExample3">
                            <span class="link-collapse__default font-size-14">View More <i
                                    class="flaticon-down-chevron font-size-10 ml-1"></i></span>
                            <span class="link-collapse__active font-size-14">View Less <i
                                    class="flaticon-arrow font-size-10 ml-1"></i></span>
                        </a>
                    </div>
                    <div class="border-bottom py-4 position-relative">
                        <h5 id="scroll-rules" class="font-size-21 font-weight-bold text-dark mb-4">
                            House Rules
                        </h5>
                        <ul class="list-group list-group-borderless list-group-horizontal list-group-flush no-gutters row">
                            <li class="col-md-4 list-group-item py-0">
                                <div class="font-weight-bold text-dark mb-2">Check-in/Check-out</div>
                                <div class="text-gray-1 mb-2 pt-1">Check-in from: 15:00</div>
                                <div class="text-gray-1 mb-4 pt-1">Check-out until: 11:00</div>
                                <div class="font-weight-bold text-dark mb-2">Getting around</div>
                                <div class="text-gray-1 mb-4 pt-1">Distance from city center: 0 km</div>
                                <div class="font-weight-bold text-dark mb-2">The property</div>
                                <div class="text-gray-1 mb-2 pt-1">Number of floors: 8</div>
                                <div class="text-gray-1 mb-2 pt-1">Number of rooms : 998</div>
                                <div class="text-gray-1 mb-4 pt-1">Most recent renovation: 2019</div>
                            </li>
                            </li>
                            <li class="col-md-4 list-group-item py-0">
                                <div class="font-weight-bold text-dark mb-2">Extras</div>
                                <div class="text-gray-1 mb-2 pt-1">Breakfast charge (unless included in room price): 20 GBP
                                </div>
                                <div class="text-gray-1 mb-4 pt-1">Still Water Horse Head Statue - 70 m</div>
                                <div class="font-weight-bold text-dark mb-2">The property</div>
                                <div class="text-gray-1 mb-2 pt-1">Number of floors: 8</div>
                                <div class="text-gray-1 mb-2 pt-1">Number of rooms : 998</div>
                                <div class="text-gray-1 mb-2 pt-1">Most recent renovation: 2019</div>
                            </li>
                        </ul>
                        <div class="collapse" id="collapseLinkExample4">
                            <ul
                                class="list-group list-group-borderless list-group-horizontal list-group-flush no-gutters row">
                                <li class="col-md-4 list-group-item py-0">
                                    <div class="font-weight-bold text-dark mb-2">Check-in/Check-out</div>
                                    <div class="text-gray-1 mb-2 pt-1">Check-in from: 15:00</div>
                                    <div class="text-gray-1 mb-4 pt-1">Check-out until: 11:00</div>
                                    <div class="font-weight-bold text-dark mb-2">Getting around</div>
                                    <div class="text-gray-1 mb-2 pt-1">Distance from city center: 0 km</div>
                                </li>
                                <li class="col-md-4 list-group-item py-0">
                                    <div class="font-weight-bold text-dark mb-2">Extras</div>
                                    <div class="text-gray-1 mb-2 pt-1">Breakfast charge (unless included in room price): 20
                                        GBP</div>
                                    <div class="text-gray-1 mb-4 pt-1">Still Water Horse Head Statue - 70 m</div>
                                    <div class="font-weight-bold text-dark mb-2">The property</div>
                                    <div class="text-gray-1 mb-2 pt-1">Number of floors: 8</div>
                                    <div class="text-gray-1 mb-2 pt-1">Number of rooms : 998</div>
                                    <div class="text-gray-1 mb-4 pt-1">Most recent renovation: 2019</div>
                                </li>
                            </ul>
                        </div>

                        <a class="link-collapse link-collapse-custom gradient-overlay-half mb-5 d-inline-block border-bottom border-primary"
                            data-toggle="collapse" href="#collapseLinkExample4" role="button" aria-expanded="false"
                            aria-controls="collapseLinkExample4">
                            <span class="link-collapse__default font-size-14">View More <i
                                    class="flaticon-down-chevron font-size-10 ml-1"></i></span>
                            <span class="link-collapse__active font-size-14">View Less <i
                                    class="flaticon-arrow font-size-10 ml-1"></i></span>
                        </a>
                    </div>
                    <div class="border-bottom py-4">
                        <h5 id="scroll-reviews" class="font-size-21 font-weight-bold text-dark mb-4">
                            Average Reviews
                        </h5>
                        <div class="row">
                            <div class="col-md-4 mb-4 mb-md-0">
                                <div class="border rounded flex-content-center py-5 border-width-2">
                                    <div class="text-center">
                                        <h2 class="font-size-50 font-weight-bold text-primary mb-0 text-lh-sm">
                                            4.2<span class="font-size-20">/5</span>
                                        </h2>
                                        <div class="font-size-25 text-dark mb-3">Very Good</div>
                                        <div class="text-gray-1">From 40 reviews</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <h6 class="font-weight-normal text-gray-1 mb-1">
                                            Cleanliness
                                        </h6>
                                        <div class="flex-horizontal-center mr-6">
                                            <div class="progress bg-gray-33 rounded-pill w-100" style="height: 7px;">
                                                <div class="progress-bar rounded-pill" role="progressbar"
                                                    style="width: 80%;" aria-valuenow="80" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                            <div class="ml-3 text-primary font-weight-bold">
                                                4.8
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6 class="font-weight-normal text-gray-1 mb-1">
                                            Facilities
                                        </h6>
                                        <div class="flex-horizontal-center mr-6">
                                            <div class="progress bg-gray-33 rounded-pill w-100" style="height: 7px;">
                                                <div class="progress-bar rounded-pill" role="progressbar"
                                                    style="width: 40%;" aria-valuenow="40" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                            <div class="ml-3 text-primary font-weight-bold">
                                                1.4
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6 class="font-weight-normal text-gray-1 mb-1">
                                            Value for money
                                        </h6>
                                        <div class="flex-horizontal-center mr-6">
                                            <div class="progress bg-gray-33 rounded-pill w-100" style="height: 7px;">
                                                <div class="progress-bar rounded-pill" role="progressbar"
                                                    style="width: 60%;" aria-valuenow="60" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                            <div class="ml-3 text-primary font-weight-bold">
                                                3.2
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6 class="font-weight-normal text-gray-1 mb-1">
                                            Service
                                        </h6>
                                        <div class="flex-horizontal-center mr-6">
                                            <div class="progress bg-gray-33 rounded-pill w-100" style="height: 7px;">
                                                <div class="progress-bar rounded-pill" role="progressbar"
                                                    style="width: 100%;" aria-valuenow="100" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                            <div class="ml-3 text-primary font-weight-bold">
                                                5.0
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="font-weight-normal text-gray-1 mb-1">
                                            Location
                                        </h6>
                                        <div class="flex-horizontal-center mr-6">
                                            <div class="progress bg-gray-33 rounded-pill w-100" style="height: 7px;">
                                                <div class="progress-bar rounded-pill" role="progressbar"
                                                    style="width: 86%;" aria-valuenow="86" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                            <div class="ml-3 text-primary font-weight-bold">
                                                4.8
                                            </div>
                                        </div>
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
