@extends('layouts.navfoot2')

@section('navfoot2')
<link rel="stylesheet" href="{{ asset('css/supportFaqProfile.css') }}">

<div>
    <div>
        <div id="supportTitle" class="pt-5 pb-5">
            <div id="pageTitle-Container" class="row">
                <div class="d-flex justify-content-center align-content-center">
                    <h3>SUPPORT PAGE</h3>
                </div>
                <div class="d-flex justify-content-center align-content-center p-2">
                    <p>Question? Suggestion? Report? Write your feedbacks here to send us a message!</p>
                </div>
            </div>
        </div>
    </div>

    <div id="support-formArea" class="container mx-auto">
        <div class="row">
            <div class="col">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Name *" aria-label="Name">
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="E-mail *" aria-label="E-mail">
                </div>
                <div class="input-group">
                    <span class="input-group-text">
                        <span class="mdi mdi-recycle-variant"></span>
                    </span>
                    <select class="form-select" id="catScheduleSelection">
                        <option selected>Select a Category *</option>
                        <option>Support</option>
                        <option>Suggestion</option>
                        <option>Report</option>
                    </select>
                </div>
            </div>
            <div class="col">
            </div>
        </div>
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Title *" aria-label="Title">
        </div>
        <div class="mb-3">
            <div class="p-1" style="background-color: rgba(128, 128, 128, 0.5); width: 120px;">
                <label class="form-label" style="font-weight: bold;">Description *</label>
            </div>
            <textarea class="form-control" id="descInput" name="description" placeholder="Enter your message here (max 1500 words)" maxlength="1500" style="resize: none; height: 500px"></textarea>
        </div>
        <div class="d-flex justify-content-center p-3">
            <button id="searchBtn" type="button" class="btn btn-primary" style="width: 250px; height: 80px;">SEND</button>
        </div>
    </div>
</div>

@endsection