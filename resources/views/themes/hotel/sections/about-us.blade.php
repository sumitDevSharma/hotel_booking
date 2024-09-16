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
        <div class="row clearfix">
            <!--Text Column-->
            <div class="text-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <div class="sec-title">
                        <h2>Quality <br>Holidays With Us</h2>
                    </div>
                    <div class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                    <div class="link-box">
                        <a href="about.html" class="theme-btn btn-style-one"><span class="btn-title">Read
                                More</span></a>
                    </div>
                </div>
            </div>
            <!--Image Column-->
            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="image-box">
                        <span class="dotted-pattern dotted-pattern-2"></span>
                        <figure class="image"><img src="{{ asset($themeTrue . 'images/resource/featured-image-0.jpg')}}" alt="" title="">
                        </figure>
                        <div class="cap"><span class="txt">25 <br>Years <br>of <br>Exp.</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>