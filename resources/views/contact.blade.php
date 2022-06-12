@extends('layouts.frontend')

@section('header')
@includeIf('layouts.header')
@endsection

@section('breadcrumb')
@includeIf('layouts.breadcrumb', ['title' => 'Contact Us', 'subtitle' => "Contact Us"])
@endsection

@section('footer')
@includeIf('layouts.footer')
@endsection

@section('page-content')
    <div class="contact-form contact-form-four pb-100">

        <div class="loaction-area">
            <div class="container">
                <div class="row location-bg">
                    <div class="col-sm-6 col-lg-4">
                        <div class="location-item">
                            <div class="location-icon">
                                <i class="flaticon-pin"></i>
                            </div>
                            <h3>Location</h3>
                            <ul>
                                <li>[{{config('app.address')}}]</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="location-item">
                            <div class="location-icon">
                                <i class="flaticon-call"></i>
                            </div>
                            <h3>Phone</h3>
                            <ul>
                                <li>
                                    <a href="tel:">[Telephone]</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 offset-sm-3 offset-lg-0 col-lg-4">
                        <div class="location-item">
                            <div class="location-icon">
                                <i class="flaticon-email"></i>
                            </div>
                            <h3>Email</h3>
                            <ul>
                                <li>
                                    <a href="#"><span class="__cf_email__" data-cfemail="94fcf1f8f8fbd4f8edeefbbaf7fbf9">[{{config('app.email')}}], [{{config('app.email_2')}}]</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <form id="contactForm">
                <div class="row contact-wrap">
                    <div class="col-sm-6 col-lg-6">
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Your Full Name">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6">
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="Your Email">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6">
                        <div class="form-group">
                            <input type="text" name="phone_number" id="phone_number" required data-error="Please enter your number" class="form-control" placeholder="Your Phone">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6">
                        <div class="form-group">
                            <input type="text" name="msg_subject" id="msg_subject" class="form-control" required data-error="Please enter your subject" placeholder="Subject">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <textarea name="message" class="form-control" id="message" cols="30" rows="8" required data-error="Write your message" placeholder="Case Description"></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="text-center">
                            <button type="submit" class="contact-btn">Submit Case</button>
                        </div>
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="map-area">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1014756.6903063876!2d2.9765107751947335!3d6.535154906881565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103bf2bae227550d%3A0xe771ad7f1bbe89d6!2sLagos%2C%20Nigeria!5e0!3m2!1sen!2suk!4v1655018152646!5m2!1sen!2suk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
@endsection