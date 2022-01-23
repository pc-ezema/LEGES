@extends('layouts.frontend')

@section('header')
@includeIf('layouts.header')
@endsection

@section('breadcrumb')
@includeIf('layouts.breadcrumb', ['title' => 'Privacy Policy', 'subtitle' => "Privacy Policy"])
@endsection

@section('footer')
@includeIf('layouts.footer')
@endsection

@section('page-content')
    <section class="privacy-area">
        <div class="container">
            <div class="privacy-item">
                <h2>1. What is Terms & Conditions?</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
            <div class="privacy-item">
                <h2>2. How do we apply our Terms & Conditions?</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
            </div>
            <div class="privacy-item">
                <h2>3. What personal data can you use?</h2>
                <ul>
                    <li><i class="fas fa-chevron-right" style="margin-right: 6px; position: relative; top: 2px;"></i> Name, email address and/or your photo when you visit our exhibitions and make use of the technologies we offer to you to receive a Good GIF</li>
                    <li><i class="fas fa-chevron-right" style="margin-right: 6px; position: relative; top: 2px;"></i> Personal data obtained through or generated on our website, newsletters, commercial emails</li>
                    <li><i class="fas fa-chevron-right" style="margin-right: 6px; position: relative; top: 2px;"></i> IP address</li>
                    <li><i class="fas fa-chevron-right" style="margin-right: 6px; position: relative; top: 2px;"></i> Your browsing behaviour on the website such as information on your first visit</li>
                    <li><i class="fas fa-chevron-right" style="margin-right: 6px; position: relative; top: 2px;"></i> Whether you open a newsletter of email and what sections you select</li>
                    <li><i class="fas fa-chevron-right" style="margin-right: 6px; position: relative; top: 2px;"></i> Personal data obtained through or generated on our website, newsletters, commercial emails</li>
                    <li><i class="fas fa-chevron-right" style="margin-right: 6px; position: relative; top: 2px;"></i> Your browsing behaviour on the website such as information on your first visit</li>
                    <li><i class="fas fa-chevron-right" style="margin-right: 6px; position: relative; top: 2px;"></i> Whether you open a newsletter of email and what sections you select</li>
                </ul>
            </div>
        </div>
    </section>
@endsection