@extends('layouts.navfoot2')

@section('navfoot2')
<link rel="stylesheet" href="{{ asset('css/supportFaqProfile.css') }}">

    <div>
        <div id="faqTitle" class="pt-5 pb-5">
            <div id="pageTitle-Container" class="row">
                <div class="d-flex justify-content-center align-content-center">
                    <h3>Frequently Ask Questions</h3>
                </div>
                <div class="d-flex justify-content-center align-content-center" style="text-align: center;">
                    <p class="p-3">Confused about something? Looking for an answer? You might be able to find your answers here!</p>
                </div>
            </div>
        </div>

        <div style="min-height: 54vh">
            <div id="faq-Main" class="container mx-auto">
                <!-- 1 -->
                <div class="faq-panels accordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                                What is Recycle-Lah?
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <p>
                                    Recycle-Lah is a brand new website that was developed by BirdBird Group that ventures into the recycling business. 
                                    Mother Nature is reaching it's breaking point at an unprecidented rate, therefore, with it's best interest in mind, 
                                    Recycle-Lah is an initiative that aims to help promote recyling by making it more accessable to the masses.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 2 -->
                <div class="faq-panels accordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                What can I Recycle?
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                <p>
                                    Everything! From Paper, metals, plastic, glass, Recycle-Lah links you to a recyclers 
                                    that will accept whatever you have to throw at them AS LONG AS THEY ARE DOMESTIC WASTE.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 3-->
                <div class="faq-panels accordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                How does the service work?
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                                <p>
                                    Once registered, you can create a request by choosing the type of material you would like to recycle and drop a pin at your current location. 
                                    Soon after, a recycler will drop by to pick up your recyclyables. 
                                    Busy today but still want to do your part? No problem! You can schedule a pick up anytime you want. 
                                    Once collected, both you and the recycler must verify that the recycleables have been picked up and your request will be treated as complete.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 4 -->
                <div class="faq-panels accordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                                I am a recyling business, how can we be partners? 
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
                            <div class="accordion-body">
                                <p>
                                    Firstly, all employees must be a registered user. A representative (Owner/ HR) may create an organization and add your employees into to that organization using a generated code. 
                                    From there you will have privileges such as managing your organization, creating schedules and more.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 5 -->
                <div class="faq-panels accordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
                                Can I make multiple requests?
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
                            <div class="accordion-body">
                                <p>
                                    No. Every user can only make one (1) request at a time. 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="faq-panelsLast accordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false" aria-controls="panelsStayOpen-collapseSix">
                                Report an organization/ service error. 
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSix">
                            <div class="accordion-body">
                                <p>
                                    Kindly make your report at the report/feedback page and we will look into it soon. 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection