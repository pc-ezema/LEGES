@extends('layouts.frontend')

@section('header')
@includeIf('layouts.header')
@endsection

@section('breadcrumb')
@includeIf('layouts.breadcrumb', ['title' => 'FAQS', 'subtitle' => "FAQs"])
@endsection

@section('footer')
@includeIf('layouts.footer')
@endsection

@section('page-content')
    <section class="faq-area pt-100">
        <div class="container">
            <div class="row faq-wrap">
                <div class="col-lg-12">
                    <!-- <div class="faq-head">
                        <h2>Criminal Law</h2>
                    </div> -->
                    <div class="faq-item">
                        <ul class="accordion">
                            <li class="wow fadeInUp" data-wow-delay=".3s">
                                <a>How long does it take to get solution?</a>
                                <p>The Leges team ensures that every service is completed before 24 hrs. from the time of request.</p>
                            </li>
                            <li class="wow fadeInUp" data-wow-delay=".4s">
                                <a>How expenses are your services?</a>
                                <p>We pride ourselves in providing affordable legal services to our client. The average benchmark fee for each service in Leges is below 100 dollars.</p>
                            </li>
                            <li class="wow fadeInUp" data-wow-delay=".5s">
                                <a>As a lawyer, how complex is the process of registration?</a>
                                <p>Leges has ensured that the registration process for lawyers are just in 2 folds: (i) Filling of relevant information and (ii) submission of relevant documents.
                                    Leges team will do the due diligence and successful shall be contacted.</P>
                            </li>
                            <li class="wow fadeInUp" data-wow-delay=".6s">
                                <a>How long does it take to get a solution?</a>
                                <p>Every service to be rendered on Leges takes approximately 24 hrs. from the point of receipt for solution to be given to the user.</p>
                            </li>
                            <li class="wow fadeInUp" data-wow-delay=".7s">
                                <a>Can I get legal representation for my case in court from Leges?</a>
                                <p>We are working towards providing legal representation services to user and will unveil the product soon.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection 