<section class="about-section">
    <div class="pattern-bottom"></div>
    <span class="dotted-pattern dotted-pattern-1"></span>
    <span class="tri-pattern tri-pattern-1"></span>
    <div class="auto-container">
        <!--Filters Section-->
        <div class="filters-section">
            <div class="form-box default-form filter-form wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                <form method="post" action="room-single.html">
                    <div class="row clearfix">
                        <div class="form-group col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <div class="field-label">Arrival</div>
                            <div class="field-inner">
                                <input id="arrival-date" class="date-picker" type="text" name="field-name"
                                    value="Nov 02. 2019" placeholder="">
                                <label for="arrival-date" class="icon flaticon-down-arrow"></label>
                            </div>
                        </div>
                        <div class="form-group col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <div class="field-label">Departure</div>
                            <div class="field-inner">
                                <input id="depart-date" class="date-picker" type="text" name="field-name"
                                    value="Nov 12. 2019" placeholder="">
                                <label for="depart-date" class="icon flaticon-down-arrow"></label>
                            </div>
                        </div>
                        <div class="form-group col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <div class="field-label">Guests</div>
                            <div class="field-inner">
                                <div class="check-sel-box">
                                    <div class="check-sel-btn">
                                        <span class="adult-info">2 Adults.</span>
                                        <span class="child-info">1 Children</span>
                                    </div>
                                    <ul class="check-sel-droplist">
                                        <li>
                                            <div class="sel-title">Select Adults:</div>
                                            <div class="clearfix">
                                                <div class="radio-block adult-block"><input type="radio"
                                                        name="adult-group" id="radio-1" value="1 Adults."><label
                                                        for="radio-1">1</label></div>
                                                <div class="radio-block adult-block"><input type="radio"
                                                        name="adult-group" id="radio-2" value="2 Adults."
                                                        checked=""><label for="radio-2">2</label></div>
                                                <div class="radio-block adult-block"><input type="radio"
                                                        name="adult-group" id="radio-3" value="3 Adults."><label
                                                        for="radio-3">3</label></div>
                                                <div class="radio-block adult-block"><input type="radio"
                                                        name="adult-group" id="radio-4" value="4 Adults."><label
                                                        for="radio-4">4</label></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sel-title">Select Children:</div>
                                            <div class="clearfix">
                                                <div class="radio-block child-block"><input type="radio"
                                                        name="child-group" id="radio-5" value="1 Children"
                                                        checked=""><label for="radio-5">1</label></div>
                                                <div class="radio-block child-block"><input type="radio"
                                                        name="child-group" id="radio-6" value="2 Children"><label
                                                        for="radio-6">2</label></div>
                                                <div class="radio-block child-block"><input type="radio"
                                                        name="child-group" id="radio-7" value="3 Children"><label
                                                        for="radio-7">3</label></div>
                                                <div class="radio-block child-block"><input type="radio"
                                                        name="child-group" id="radio-8" value="4 Children"><label
                                                        for="radio-8">4</label></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <div class="field-label e-label">&nbsp;</div>
                            <div class="field-inner">
                                <button class="theme-btn btn-style-one"><span class="btn-title">Check
                                        Availability</span></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            @forelse($hotels as $hotel)
                <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                    <div class="card transition-3d-hover shadow-hover-2 tab-card h-100">
                        <div class="position-relative">
                            <a href="{{ route('home.hotel', slug($hotel->name)) }}"
                                class="d-block gradient-overlay-half-bg-gradient-v5">
                                <img class="card-img-top" src="{{ asset($hotel->images->first()->image_path) }}"
                                    alt="img">
                            </a>
                            <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                <button type="button" class="btn btn-sm btn-icon text-white rounded-circle"
                                    data-toggle="tooltip" data-placement="top" title="{{ __('Save for later') }}"
                                    data-original-title="Save for later">
                                    <span class="flaticon-valentine-heart"></span>
                                </button>
                            </div>
                            <div class="position-absolute bottom-0 left-0 right-0 pb-3">
                                <div class="col">
                                    <a href="{{ route('home.hotel', slug($hotel->name)) }}" class="d-block">
                                        <div class="d-flex align-items-center font-size-14 text-white">
                                            <i class="icon flaticon-pin-1 mr-2 font-size-20"></i> <span
                                                class="font-weight-bold">{{ $hotel->address }}</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-4 py-3">
                            <div class="mb-2">
                                <div
                                    class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                    <div class="green-lighter">
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('home.hotel', slug($hotel->name)) }}"
                                class="card-title font-size-17 font-weight-medium text-dark">{{ $hotel->name }}</a>
                            <div class="mt-2 mb-3">
                                <span
                                    class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                <span class="font-size-14 text-gray-1 ml-2">(166 reviews)</span>
                            </div>
                            <div class="mb-0">
                                <span class="mr-1 font-size-14 text-gray-1">From</span>
                                <span class="font-weight-bold">${{ $hotel->rooms->min('price_per_night') }}</span>
                                <span class="font-size-14 text-gray-1"> / night</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-danger">No hotels found</div>
                </div>
            @endforelse
        </div>
    </div>
</section>
