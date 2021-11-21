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
 
    <div style="background-image: url({{asset('/images/bulbBG.png')}})">
        <div id="support-formArea" class="container mx-auto">
            <form method="POST" action="{{ route("support.sendMail") }}">
                @csrf
                <div class="row">
                    <div class="col">
                        @if(!auth()->user())
                            <div class="input-group">
                                <input type="text" id="nameInput" name="nameInput" class="form-control @error('nameInput') is-invalid @enderror" placeholder="Name *" aria-label="Name" required>
                                @error('nameInput')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }} </strong>
                                    </span>
                                @enderror
                                
                            </div>
                            <div class="input-group">
                                <input type="text" id="emailInput" name="emailInput" class="form-control @error('emailInput') is-invalid @enderror" placeholder="E-mail *" aria-label="E-mail" required>
                                @error('emailInput')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }} </strong>
                                    </span>
                                @enderror
                            </div>
                        @else
                            <div class="input-group">
                                <input type="text" name="nameInput" id="nameInput" class="form-control" placeholder="Name *" aria-label="Name" value="{{ $userInfo->name }}" readonly="readonly" required>
                            </div>
                            <div class="input-group">
                                <input type="text" name="emailInput" id="emailInput" class="form-control" placeholder="E-mail *" aria-label="E-mail" value="{{ $userInfo->email }}" readonly="readonly" required>
                            </div>
                        @endIf
                        <div class="input-group">
                            <span class="input-group-text">
                                <span class="mdi mdi-recycle-variant"></span>
                            </span>
                            <select name="categoryInput" id="categoryInput" class="form-select @error('categoryInput') is-invalid @enderror" value="{{ old('categoryInput') }}">
                                <option value="Support">Support</option>
                                <option value="Suggestion">Suggestion</option>
                                <option value="Report">Report</option>
                            </select>
                            @error('categoryInput')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }} </strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                    </div>
                </div>
                <div class="input-group">
                    <input type="text" name="titleInput" id="titleInput" class="form-control @error('titleInput') is-invalid @enderror" placeholder="Title *" aria-label="Title" value="{{ old('titleInput') }}">
                    @error('titleInput')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }} </strong>
                        </span>
                    @enderror
 
                </div>
                <div class="mb-3">
                    <div class="p-1 d-flex justify-content-center" style="background-color: rgba(128, 128, 128, 0.5); width: 120px; border-radius: 10px 10px 0px 0px;">
                        <label class="form-label" style="font-weight: bold;">Description*</label>
                    </div>
                    <textarea name="descriptionInput" class="form-control @error('descriptionInput') is-invalid @enderror" id="descriptionInput" name="description" placeholder="Enter your message here (max 1500 words)" maxlength="1500" style="resize: none; height: 500px" value="{{ old('descriptionInput') }}"></textarea>
                    @error('descriptionInput')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }} </strong>
                        </span>
                    @enderror
                </div>
                <div class="d-flex justify-content-center p-3">
                    <button name="sendBtn" id="sendBtn" type="submit" class="btn btn-primary" style="width: 250px; height: 80px;">SEND</button>
                </div>
            </form>
        </div>
    </div>
</div>
 
@endsection