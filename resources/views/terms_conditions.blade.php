@extends('layouts.frontend')

@section('header')
@includeIf('layouts.header')
@endsection

@section('breadcrumb')
@includeIf('layouts.breadcrumb', ['title' => 'Terms & Conditions', 'subtitle' => "Terms & Conditions"])
@endsection

@section('footer')
@includeIf('layouts.footer')
@endsection

@section('page-content')
    <section class="privacy-area">
        <div class="container">
            <div class="privacy-item">
                <h2>1. The Agreement</h2>
                <p>By using this website, you agree to be bound by these terms and conditions (“Terms”) and our Privacy Policy (Insert Hyperlink). By clicking “I Agree” you agree that you become a client of {{config('app.name')}}. These Terms and the Privacy Policy may change from time to time and you will be bound by those changes. We recommend you refer to the Terms and Privacy Policy regularly to remain informed of the latest documents and content therein.</p>
            </div>
            <div class="privacy-item">
                <h2>2. Using The Website</h2>
                <p>2.1. {{config('app.name')}} provides various services via the website pursuant to the terms of this User Agreement.</p>
                <p>2.2. By continuing to access the website, you agree to be bound by the terms outlined below and any additional terms relating to any additional services that you may access.</p>
                <p>2.3. If you do not agree with any of the terms of this User Agreement, you must discontinue to access the website and its services.</p>
            </div>
            <div class="privacy-item">
                <h2>3. Site Content</h2>
                <p>3.1. you may read and copy the information on {{config('app.name')}} for your own needs but you may not publish, resell or sub-licence it. {{config('app.name')}} makes no guarantees, representations or warranties about the accuracy or legal correctness of any of the information on {{config('app.name')}}.</p>
                <p>3.2. {{config('app.name')}} links to and advertise several partners and affiliates whose websites are displayed on {{config('app.name')}} website and are controlled by parties other than {{config('app.name')}} (each being a “Third Party Site”).
                {{config('app.name')}} is not responsible for and does not endorse or accept any responsibility for the availability, contents, products, services or use of any Third Party Site, any website accessed from a Third Party Site or any changes or updates to such sites.
                {{config('app.name')}} makes no guarantees about the content or quality of the products or services provided by such sites.</p>
                <p>3.3. Certain services made available on {{config('app.name')}} website are delivered by third parties. By using any product, service, or functionality originating from {{config('app.name')}} website, you are allowing {{config('app.name')}} to share information with any third party with whom {{config('app.name')}} has a relationship – any information necessary to facilitate its provisions of products, services, or functionality to you.</p>
            </div>
            <div class="privacy-item">
                <h2>4. Services Available</h2>
                <p>4.1. The website is an online marketplace / platform for you to provide or access various services relating to legal information, professional legal services, contacting lawyers, and such other services that {{config('app.name')}} may decide to make available to you from time to time.</p>
                <p>4.2. Any legal services facilitated by the website are between clients and lawyers directly and their relationship is bound by the terms the lawyer sees fit to impose. {{config('app.name')}} is not a party to any transaction between a client and a lawyer. {{config('app.name')}} is a market place which may facilitate a separate relationship formed between lawyers and clients only.</p>
                <p>4.3. {{config('app.name')}} does not own, acquire, sell, licence or sub-licence any interest in any legal services facilitated by the website.</p>
                <p>4.4. Any lawyer using the website is an independent agent, not employed by {{config('app.name')}}. Any statements, representations, opinions or advice of a lawyer made via the website are the lawyer’s own and do not necessarily represent the views or opinions of {{config('app.name')}}.
            </div>
            <div class="privacy-item">
                <h2>5. Registration As Lawyer</h2>
                <p>5.1. A person may apply (by creating an online account for lawyer) to be a lawyer registered with the website. A lawyer cannot transfer their registration with the website to another person.</p>
                <p>5.2. {{config('app.name')}} reserves the unrestricted right to reject any application to be a lawyer registered with the website and to suspend, terminate or limit a lawyer’s use of the website at any time without notice and for any reason, including breach of this User Agreement.</p>
                <p>5.3. Each lawyer is responsible for maintaining the accuracy or currency of their personal details that are registered with the website. {{config('app.name')}} is not liable for any loss or damage suffered as a result of the inaccuracy or otherwise of any information associated with a lawyers registered personal details.</p>    
            </div>
            <div class="privacy-item">
                <h2>6. Registration As Client</h2>
                <p>6.1. A person may apply (by creating an online account for “clients”) to be a client of the website. If {{config('app.name')}} accepts a person’s application to be a client, that person acquires an account. Accounts are not transferrable.</p>
                <p>6.2. {{config('app.name')}} reserves the unrestricted right to refuse an account to any person and to suspend, terminate or restrict a client’s use of the website at any time without notice for any reason, including breach of this User Agreement.</p>
                <p>6.3. Each client is responsible for maintaining the accuracy or currency of their account details via the website. {{config('app.name')}} is not liable for any loss or damage suffered as a result of the inaccuracy or otherwise of any information associated with a client’s account.</p>
            </div>
            <div class="privacy-item">
                <h2>7. Client Accounts</h2>
                <p>You must complete the registration process by providing {{config('app.name')}} with your name, email address, phone number and gender. you will also need to generate a password and username. you are responsible for maintaining the confidentiality of your client account and all the activities under your account.</p>
                <p>You agree to notify {{config('app.name')}} immediately following any unauthorised use of your account.</p>    
            </div>
            <div class="privacy-item">
                <h2>8. Competitors</h2>
                <p>Competitors, including companies offering online legal services or documents of any kind, are not permitted to access or use any services, information or documents on our {{config('app.name')}} website.</p>
            </div>
            <div class="privacy-item">
                <h2>9. Engaging A Lawyer For Legal Services </h2>
                <p>9.1. A lawyer who prepares an estimated quote or otherwise tenders for, to avail their legal services to the prospective client using the website. The lawyer is responsible for undertaking their own conflict check with respect to any potential client. {{config('app.name')}} is not responsible for any Loss incurred for failing to recognise a conflict of interest between any client and any lawyer or potential client of the lawyer chosen by the client.</p>
                <p>9.2. A client may engage a lawyer who has an estimated quote for the provision of legal services. {{config('app.name')}} does not regularly check or amend any information that a client provides to lawyers by way of information to lawyers for the provision of an estimated quote (other than as to assist in any dispute resolution, or to assist clients in obtaining an estimated quote from lawyers). lawyers must assess the case of the client and provide an estimated quote based on that information.</p>
                <p>9.3. A client’s engagement of a lawyer via the website is a direct contractual relationship between the client and the lawyer, to the exclusion of {{config('app.name')}}.</p>
                <p>9.4. All retainers or contractual agreements established between a client and a lawyer as a result of accepting a working agreement between a client and a lawyer through the use of the website exists independent of {{config('app.name')}} and the website has no legal effect on this User Agreement or the Terms and Conditions of use.</p>
            </div>
            <div class="privacy-item">
                <h2>10. Features For Lawyers</h2>
                <p>10.1. Subject to clause 3, a lawyer may access any paid or unpaid features that are available on the website from time to time.</p>
                <p>10.2. {{config('app.name')}} reserves the right to change, suspend or terminate any paid or unpaid features available to lawyers at any time without notice for any reason.</p>
            </div>
            <div class="privacy-item">
                <h2>11. Fees</h2>
                <p>11.1. {{config('app.name')}} may charge a fee to lawyers for access to the website and its features.</p>
                <p>11.2. {{config('app.name')}} may charge a fee to a lawyer who is chosen by a prospective client via the website to be engaged by a client to provide legal services. This fee is charged and deducted from the funds provided to {{config('app.name')}} by the client on acceptance of an estimated quote by a lawyer and prior to the lawyer receiving their share of such agreed estimated quote. The lawyer is then obliged to provide a no obligation consultation with the client via telephone, online video or in person (as can be mutually agreed between the client and the lawyer) prior to final agreement on the estimated quote and engagement of the lawyer by the client. The funds are then apportioned to the lawyer in the percentage of 90% to the lawyer and to {{config('app.name')}} in the percentage of 10%, as an administration fee.</p>
                <p>11.4. Should a prospective client not agree to engage with a lawyer who has provided an agreed estimated quote, after the initial consultation with the lawyer. {{config('app.name')}} reserves its right to charge an administrative fee.</p>
                <p>11.4. {{config('app.name')}} reserves the unrestricted right to determine and change any fees associated with usage of or access to the website and its features as it sees fit.</p>
            </div>
            <div class="privacy-item">
                <h2>12. Rules Of Use</h2>
                <p>12.1. You must comply, and procure that any person to whom you give access to the website complies, with this clause 18.</p>
                <p>12.2. You are responsible for ensuring your use of the website complies with all relevant laws and regulations.</p>
                <p>12.3. You must not disclose to any person any email or password that you may use to access the website. You must immediately notify {{config('app.name')}} of any unauthorised access to the website that you become aware of.</p>
                <p>12.4. You must not use the website to upload, post, transmit or otherwise make available any material (or hyperlinks to such material) that:</p>
                <p>• 12.4.1. infringes the Intellectual Property Rights of another person;</p>
                <p>• 12.4.2. Could reasonably be expected to be threatening, defamatory, abusive, indecent or otherwise unlawful; or</p>
                <p>• 12.4.3. You know or suspect (or ought reasonably to have known or suspected) is false, misleading or deceptive.</p>
                <p>12.5. By uploading, posting, transmitting or otherwise making available material via the website, you grant {{config('app.name')}} a non-exclusive, worldwide, royalty-free, perpetual licence to use, publish, reproduce and otherwise exploit the material in any form for any purpose and you unconditionally waive any moral rights that you might have in respect of the material.</p>
                <p>12.6. A client must not sell, re-sell, licence or sub-licence any information contained on the website.</p>
                <p>12.7. You will not use the website to send, allow to be sent, or assist in the sending of one or more unsolicited commercial electronic messages or otherwise breach the Spam Act 2003 and accompanying regulations.</p>
                <p>12.8. You will not distribute viruses or other malicious software to or through the website, impose an unreasonable load on the servers of the website, use a robot, spider or scraper to harvest material (including email addresses) from the website or bypass any measure used to prevent and control access to the website.</p>
                <p>12.9. You are responsible for all taxes or levies that arise as a result of using the website.</p>
            </div>
        </div>
    </section>
@endsection