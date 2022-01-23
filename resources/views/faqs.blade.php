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
                    <div class="faq-head">
                        <h2>Criminal Law</h2>
                    </div>
                    <div class="faq-item">
                        <ul class="accordion">
                            <li class="wow fadeInUp" data-wow-delay=".3s">
                                <a>What is criminal law?</a>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi quis modi ullam amet debitis libero veritatis enim repellat optio natus eum delectus deserunt, odit expedita eos molestiae ipsa totam quidem? Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel, quos mollitia voluptatum aliquam repellendus similique iure fuga aspernatur amet odit! At vitae dicta excepturi quasi? Veritatis, pariatur excepturi! Illum, ut?</p>
                            </li>
                            <li class="wow fadeInUp" data-wow-delay=".4s">
                                <a>What is the purpose of a search warrant?</a>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi quis modi ullam amet debitis libero veritatis enim repellat optio natus eum delectus deserunt, odit expedita eos molestiae ipsa totam quidem? Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel, quos mollitia voluptatum aliquam repellendus similique iure fuga aspernatur amet odit! At vitae dicta excepturi quasi? Veritatis, pariatur excepturi! Illum, ut?</p>
                            </li>
                            <li class="wow fadeInUp" data-wow-delay=".5s">
                                <a>How long does a criminal case take?</a>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi quis modi ullam amet debitis libero veritatis enim repellat optio natus eum delectus deserunt, odit expedita eos molestiae ipsa totam quidem? Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel, quos mollitia voluptatum aliquam repellendus similique iure fuga aspernatur amet odit! At vitae dicta excepturi quasi? Veritatis, pariatur excepturi! Illum, ut?</p>
                            </li>
                            <li class="wow fadeInUp" data-wow-delay=".6s">
                                <a>Should I waive time?</a>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi quis modi ullam amet debitis libero veritatis enim repellat optio natus eum delectus deserunt, odit expedita eos molestiae ipsa totam quidem? Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel, quos mollitia voluptatum aliquam repellendus similique iure fuga aspernatur amet odit! At vitae dicta excepturi quasi? Veritatis, pariatur excepturi! Illum, ut?</p>
                            </li>
                            <li class="wow fadeInUp" data-wow-delay=".7s">
                                <a>Can a defendant be convicted based only on a confession?</a>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi quis modi ullam amet debitis libero veritatis enim repellat optio natus eum delectus deserunt, odit expedita eos molestiae ipsa totam quidem? Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel, quos mollitia voluptatum aliquam repellendus similique iure fuga aspernatur amet odit! At vitae dicta excepturi quasi? Veritatis, pariatur excepturi! Illum, ut?</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection 