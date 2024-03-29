<footer id="footer">
        <!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span>HUBZUH</span></h2>
                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p> --}}
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="address">
                            <img src="images/home/map.png" alt="" />
                            <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Service</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Online Help</a></li>
                                <li><a href="{{ url('page/contact') }}">Contact Us</a></li>
                                <li><a href="#">Order Status</a></li>
                                <li><a href="#">Change Location</a></li>
                                <li><a href="#">FAQ’s</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Quick Shop</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">T-Shirt</a></li>
                                <li><a href="#">Mens</a></li>
                                <li><a href="#">Womens</a></li>
                                <li><a href="#">Gift Cards</a></li>
                                <li><a href="#">Shoes</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Policies</h2>
                            <ul class="nav nav-pills nav-stacked">
                                    <li><a href="{{ url('page/terms-conditions') }}">Terms & Conditions</a></li>
                                    <li><a href="{{ url('page/privacy-policy') }}">Privacy Policy</a></li>
                                    <li><a href="{{ url('page/refund-policy') }}">Refund Policy</a></li>
                                    <li><a href="#">Billing System</a></li>
                                    <li><a href="#">Ticket System</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>About HUBZUH</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="{{ url('page/about-us') }}">About Us</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Store Location</a></li>
                                <li><a href="#">Affillate Program</a></li>
                                <li><a href="#">Copyright</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3" style ="margin-right: 0px">
                            <div class="contact-form">
                                {{--                            <h2 class="title text-center">Contact Us</h2>--}}
                                <div class="single-widget">
                                    <h2 style="">Contact Us</h2>
                                </div>
                                <div class="status alert alert-success" style="display: none"></div>
                                <form  class="contact-form row" action="{{ url('contact_us') }}"  >

                                    <div class="form-group col-md-12">
                                        <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
                                    </div>

                                </form>
                            </div>
                        </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2019 HUBZUH Inc. All rights reserved.</p>
                    {{-- <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p> --}}
                </div>
            </div>
        </div>

    </footer>
    <!--/Footer-->

