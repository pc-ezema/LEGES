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
                                <li>[Location]</li>
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
                                    <a href="tel:+0755543332322">[Telephone]</a>
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
                                    <a href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#d9b1bcb5b5b699b5a0a3b6f7bab6b4"><span class="__cf_email__" data-cfemail="94fcf1f8f8fbd4f8edeefbbaf7fbf9">[email&#160;protected]</span></a>
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
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.15830869428!2d-74.119763973046!3d40.69766374874431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1587550284019!5m2!1sen!2sbd"></iframe>
    </div>
@endsection