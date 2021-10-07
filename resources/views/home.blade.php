@extends('layouts.navfoot')

@section('navfoot')
    <div style="height: 65vh">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-6 col-12 d-flex justify-content-center align-items-center">
                    test
                </div>
                <div class="col-lg-6 col-12 d-none d-lg-flex justify-content-center align-items-center">
                    image
                </div>
            </div>
            {{-- <div id="section1-Description" class="grid-item">
                <h1 style="color: #004b4d; margin-bottom: 20px;">Welcome to Recycle-Lah!</h1>
                <p style="color: #004b4d;">
                    Your one-stop recycling platform
                </p>
            </div>
            <div id="section1-Logo" class="grid-item">
                <img class="img-fluid" src="{{asset('/images/RecycleSector.png')}}" alt="" width="796" height="450" style="margin: 20px 0 20px;">
            </div> --}}
        </div>
    </div>
    <div style="background: #aee8e2; box-shadow: 0 -5px 50px 50px #aee8e2;">
        <div class="container mx-auto" style="height: 55vh;">
            <div class="grid-container2">
                <div id="section2-Logo" class="grid-item2">
                    <img class="img-fluid" src="{{asset('/images/truck.png')}}" alt="" width="500" height="417">
                </div>
                <div id="section2-Description" class="grid-item2">
                    <h2 style="margin-bottom: 20px;">What is Recycle-Lah?</h2>
                    <p>
                        Recycle-Lah is a Recycle webpage that allows recycling companies to search for their potential households that are looking to
                        recycle instead of wandering around random areas.
                        Our goal is to enhance everyone's reclcing experience with ease
                        to encourage and spread recycling habits to people in the world.
                    </p>
                    <p>
                        Save time, less vehicles. More Recycling!
                    </p>
                </div>
            </div>
        </div>
        <div style="height: 10vh; width: 100%; background-color: #018891">
            <h2 style="font-size: 25px; color: white; text-align: center; padding: 30px 0px 30px;">Why Recycle-Lah?</h2>
        </div>
        <div class="container mx-auto" style="height: 850px;">
            <div class="grid-container3">
                {{-- <div class="grid-item3">
                    <div style="padding: 20px 20px 40px; text-align: center;">
                        <img class="img-fluid" src="https://www.w3schools.com/images/lamp.jpg" alt="Image1" width="130" height="130">
                    </div>
                    <div class="text-center" style="padding: 10px;">
                        TITLE
                    </div>
                    <div class="text-center">
                        Content words etc etc
                    </div>
                </div>
                <div class="grid-item3">
                    <div style="padding: 20px 20px 40px; text-align: center;">
                        <img class="img-fluid" src="https://www.w3schools.com/images/lamp.jpg" alt="Image1" width="130" height="130">
                    </div>
                    <div class="text-center" style="padding: 10px;">
                        TITLE
                    </div>
                    <div class="text-center">
                        Content words etc etc
                    </div>
                </div>
                <div class="grid-item3">
                    <div style="padding: 20px 20px 40px; text-align: center;">
                        <img class="img-fluid" src="https://www.w3schools.com/images/lamp.jpg" alt="Image1" width="130" height="130">
                    </div>
                    <div class="text-center" style="padding: 10px;">
                        TITLE
                    </div>
                    <div class="text-center">
                        Content words etc etc
                    </div>
                </div> --}}
            </div>
            <div style="padding: 0 150px 0;">
                <div style="height: 230px; text-align: center; padding: 30px; background-color: rgba(255, 255, 255, 0.65); border-radius: 10px;">
                    <h1>Interested?</h1>
                    <p style="font-size: 20px; padding: 20px 0 20px;">You can view all the schedules available created by recycling organizations
                    <br>that use our website here!
                </p>
                </div>
            </div>
            <div class="scheduleBtn" style="text-align: center; margin-top: -24px; padding: 0 50px 50px;">
                <button type="button" class="btn btn-success">VIEW ALL SCHEDULES</button>
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
                  <div class="carousel-item active">
                    <img class="img-fluid" src="..." class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img class="img-fluid" src="..." class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img class="img-fluid" src="..." class="d-block w-100" alt="...">
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
            <div class="grid-container4">
                <div id="section4-leftImage" class="grid-item4">
                    <img class="img-fluid" src="{{asset('/images/car.png')}}" alt="" width="618" height="366" style="margin: 20px 0 20px;">
                </div>
                <div id="section4-Description" class="grid-item4">
                    <h2 style="margin-bottom: 20px;">Let's save the world!</h2>
                    <p>
                        Our mother earth is currently slowly collapsing day by day.
                        Do mother earth a favor, start recycling today!
                    </p>
                    <button type="button" class="btn btn-success">Start Recycling</button>
                </div>
            </div>
        </div>
    </div>
@endsection

