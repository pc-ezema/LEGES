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
                <h2>Description:</h2> <p>This document is {{config('app.name')}} Privacy Policy and sets out how {{config('app.name')}} collects, stores, handles and uses personal information. “Personal information” is information we hold which may reasonably identify you and is information which is identifiable as being about you. Personal information collected by us will only be used in accordance with this Privacy Policy.</p>
                <br>
                <p>By using {{config('app.name')}} you acknowledge that you have read and understood this Privacy Policy and that you have had every opportunity to seek independent legal advice regarding the content within the document.</p>
            </div>
            <div class="privacy-item">
                <h2>1. What personal information we collect and use.</h2>
                <p>Personal information may be required to be provided by you from time to time when creating user accounts by either potential clients or lawyers using the website.</p>
                <br>
                <p>This may include:</p>
                <ul>
                    <li><i class="fas fa-chevron-right" style="margin-right: 6px; position: relative; top: 2px;"></i> Full Names;</li>
                    <li><i class="fas fa-chevron-right" style="margin-right: 6px; position: relative; top: 2px;"></i> Other information including email addresses, phone numbers, gender, user name or similar other information;</li>
                    <li><i class="fas fa-chevron-right" style="margin-right: 6px; position: relative; top: 2px;"></i> Information about your legal needs;</li>
                    <li><i class="fas fa-chevron-right" style="margin-right: 6px; position: relative; top: 2px;"></i> Communication between us;</li>
                    <li><i class="fas fa-chevron-right" style="margin-right: 6px; position: relative; top: 2px;"></i> Credit Card Information;</li>
                    <li><i class="fas fa-chevron-right" style="margin-right: 6px; position: relative; top: 2px;"></i> Any other information requested on this website or otherwise required by us or provided by you.</li>
                </ul>
                <br>
                <p>We may use your personal information to contact you by various means to seek your opinion or feedback about the website, our services or services of other users of the website. Whether you provide this information is optional however may affect your ability to access the services offered by the website. We may receive personal information from third parties. If we do, it will be protected as set out in this Privacy Policy.</p>
            </div>
            <div class="privacy-item">
                <h2>2. How we collect your personal information</h2> 

                <p>We collect personal information from you in a variety of ways, including: when you interact with us electronically or in person when you access our website and when we provide our services to you.</p>
            </div>
            <div class="privacy-item">
                <h2>3. Use of your personal information</h2> 

                <p>We may use your personal information to provide {{config('app.name')}} service to you and to provide you with information from us and our partners. We may use your personal information to better understand customer needs, improve our website and improve our service. We may use your personal information to respond to queries about our service and documents requests. We also use your personal information for marketing purposes, to improve our service and to notify you of opportunities that we think you might be interested in.</p>
            </div>
            <div class="privacy-item">
                <h2>4. Why we collect your personal information</h2> 

                <p>At {{config('app.name')}} our mission is to provide a comprehensive online marketplace to allow potential client and lawyers to engage in business as easily and cost effectively as possible. {{config('app.name')}} provides certain relevant personal information provided by you to your potential lawyer (and chosen lawyer once this stage is achieved) so that they are able to assess your legal situation and provide you with an estimated quote to undertake the necessary work to address your legal problem.</p>
            </div>
            <div class="privacy-item">
                <h2>5. How long does {{config('app.name')}} keep your personal information</h2> 
                <p>{{config('app.name')}} will hold your personal information whilst you remain a user of the website and may be required to hold your personal information for a significant period after such time. At such time you are no longer a user of the website and / or elect that your personal information be removed from the website, or {{config('app.name')}} no longer needs your information we will endeavour to remove any identifying information in our possession or control.</p>
            </div>
            <div class="privacy-item">
                <h2>6. Security of your personal information</h2> 

                <p>We take significant and reasonably foreseeable steps to protect your personal information. We are not liable for any unauthorised access to this information. The provision to {{config('app.name')}} and / or transmission and exchange of information is carried out at your own risk. We take steps to safeguard against unauthorised disclosures of information, however we cannot assure you that personal information will not be disclosed in a manner that is inconsistent with this Privacy Policy.</p>
            </div>
            <div class="privacy-item">
                <h2>7. Third party websites</h2> 

                <p>{{config('app.name')}} website has links to other websites not owned or controlled by us. We are not responsible for the activities of these websites or the consequences of you using the services of such websites.</p>
            </div>
            <div class="privacy-item">
                <h2>8. Changes</h2> 

                <p>We advise that we may amend this Privacy Policy in the future with changes, amendments, and additions at our discretion. Your continued use of the Website following any changes indicates that you accept the changes. It is your responsibility to remain apprised of any changes /amendments to {{config('app.name')}} Privacy Policy and we recommend you peruse the policy regularly to remain apprised of any alteration to the document.</p>
            </div>
        </div>
    </section>
@endsection