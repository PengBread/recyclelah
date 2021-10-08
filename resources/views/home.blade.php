@extends('layouts.navfoot')

@section('navfoot')
    <div id="section1-div" style="height: 65vh; background-image: url('{{asset('/images/bg.png')}}');">
        <div class="container h-100">
            <div class="row h-auto">
                <div id="section1-Description" class=" wordColor col-sm d-flex justify-content-center align-items-center">
                    <div class="wordColor">
                        <h1>Welcome to Recycle-Lah!</h1>
                        <p>
                            Your one and only recycling platform stop you need to use!
                            <br>Start recycling today!
                        </p>
                    </div>
                </div>
                <div class="col-sm d-flex justify-content-center align-items-center ">
                    <img id="section1-Image" class="img-fluid" src="{{asset('/images/RecycleSector.png')}}" alt="" width="796" height="450">
                </div>
            </div>
        </div>
    </div>
    <div style="background: #aee8e2; box-shadow: 0 -5px 50px 50px #aee8e2;">
        <div class="container mx-auto" style="height: 55vh;">
            <div class="container h-100">
                <div class="row h-auto">
                    <div class="col-sm d-flex justify-content-center align-items-center ">
                        <img id="section2-Image" class="img-fluid" src="{{asset('/images/truck.png')}}" alt="" width="500" height="417">
                    </div>
                    <div id="section2-DescriptionDiv" class="wordColor col-sm d-flex justify-content-center align-items-center">
                        <div id="section2-Description" class="wordColor">
                            <h1 id="section2-h1">What is Recycle-Lah?</h1>
                            <p>
                                Recycle-Lah is a Recycle webpage that allows recycling companies to search for their potential households that are looking to
                                recycle instead of wandering around random areas.
                                Our goal is to enhance everyone's reclcing experience with ease
                                to encourage and spread recycling habits to people in the world.
                            </p>
                            <p>Save time, less vehicles. More Recycling!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="height: 10vh; width: 100%; background-color: #018891">
            <h2 style="font-size: 25px; color: white; text-align: center; padding: 30px 0px 30px;">Why Recycle-Lah?</h2>
        </div>
        <div class="container mx-auto" style="height: auto; margin: 40px 0 0 0;">
            <div class="container h-50">
                <div class="row">
                    <div id="section3-Boxes" class="section3-Columns d-flex justify-content-center align-items-center col-12 col-lg-4">
                        <div class="section3-BoxItems">
                            <div style="padding: 20px 20px 40px; text-align: center;">
                                <img class="img-fluid" src="{{asset('/images/energysaving.png')}}" alt="Image1" width="130" height="130">
                            </div>
                            <div class="text-center p-2">
                                <h4>SIMPLE & EASY</h4>
                            </div>
                            <div class="text-center">
                                Content words etc etc
                            </div>
                        </div>
                    </div>
                    <div id="section3-Boxes" class="section3-Columns d-flex justify-content-center align-items-center col-12 col-lg-4">
                        <div class="section3-BoxItems">
                            <div style="padding: 20px 20px 40px; text-align: center;">
                                <img class="img-fluid" src="{{asset('/images/earthvector.png')}}" alt="Image1" width="130" height="130">
                            </div>
                            <div class="text-center" style="padding: 10px;">
                                <h5>ECO-FRIENDLY</h5>
                            </div>
                            <div class="text-center">
                                <p>Reduces the amount of vehicles.</p>
                            </div>
                        </div>
                    </div>
                    <div id="section3-Boxes" class="section3-Columns d-flex justify-content-center align-items-center col-12 col-lg-4">
                        <div class="section3-BoxItems">
                            <div style="padding: 20px 20px 40px; text-align: center;">
                                <img class="img-fluid" src="{{asset('/images/EncourageRecycle.png')}}" alt="Image1" width="130" height="130">
                            </div>
                            <div class="text-center" style="padding: 10px;">
                                <h5>ENCOURAGES RECYCLING</h5>
                            </div>
                            <div class="text-center">
                                Content words etc etc
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mx-auto" style="margin: 60px 0 40px 0;">
            <div class="d-flex justify-content-center align-items-center mt-0">
                <div id="section3-Interested" class="wordColor">
                    <h1>Interested?</h1>
                    <p style="font-size: 20px;">
                        You can view all the schedules available created by recycling organizations
                        <br>that use our website here!
                    </p>
                </div>
            </div>
            <div id="section3-Btn" class="d-flex justify-content-center align-items-center">
                <div>
                    <button id="viewScheduleBtn" type="button" class="btn btn-success">VIEW ALL SCHEDULES</button>
                </div>
            </div>
        </div>
        <div id="Carousel" style=" background-color: white; box-shadow: 0 0px 30px 15px rgba(0, 107, 107, 0.3);">
            <div id="carouselIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active" style="text-align: center;">
                    <img class="img-fluid" src="{{asset('/images/poster1.jpg')}}" class="d-block w-100" alt="..." width="600" height="auto">
                  </div>
                  <div class="carousel-item">
                    <img class="img-fluid" src="{{asset('/images/poster1.jpg')}}" class="d-block w-100" alt="..." width="600" height="auto">
                  </div>
                  <div class="carousel-item">
                    <img class="img-fluid" src="{{asset('/images/poster1.jpg')}}" class="d-block w-100" alt="..." width="600" height="auto">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="container mx-auto" style="height: 60vh;">
            <div class="container h-100">
                <div id="section4-row" class="row h-75">
                    <div class="col-sm d-flex justify-content-center align-items-center ">
                        <img id="section4-Image" class="img-fluid" src="{{asset('/images/car.png')}}" alt="" width="618" height="366">
                    </div>
                    <div id="section4-Description" class="col-sm d-flex justify-content-center align-items-center">
                        <div class="wordColor">
                            <h2>Let's save the world together!</h2>
                            <p>
                                Our mother earth is currently slowly collapsing day by day.
                                Do mother earth a favor, start recycling today!
                            </p>
                            <button id="startRecyclingBtn" type="button" class="btn btn-success">Start Recycling</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

