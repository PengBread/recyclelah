@extends('layouts.navfoot2')

@section('navfoot2')
<link rel="stylesheet" href="{{ asset('css/supportFaqProfile.css') }}">

<div style="height: 100%">
    <div id="" class="container mx-auto">
        <div class="row">
            <div class="profile-sidebar p-5">
                <div class="border justify-content-center align-items-center">
                    <div class="profile-sidebar-container">
                        <div class="pt-3 px-3">
                            Account Management
                            <hr>
                        </div>
                        <div class="profile-sidebar-items">
                            <a href="{{ route('authProfile') }}">Account Information</a>
                        </div>
                        <div class="profile-sidebar-items">
                            <a href="{{ route('organization') }}">Organization Information</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-content col col-sm pt-5 pb-5">
                <!--Members List Container -->
                <div class="profile-content-container border">
                    <div class="pt-3 px-3">
                        <h4>Members List</h4>
                        <hr>
                        <div>
                            <p>Edit kick or whatever</p>
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="border">
                            <div>
                                <table class="table" id="affiliateTable">
                                    @csrf
                                    
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Tel No.</th>
                                        <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($userOrg as $target)
                                        {{-- <form class="form" method="POST" action="{{ route('profile.kickUser') }}"> --}}
                                            <tr>
                                            <th scope="row" style="width: 5%">
                                                {{ $loop->iteration }}
                                                {{-- <input name="user_userID" value="{{ $user->userID }}" style="width: 20px" readonly> --}}
                                            </th>
                                            <td>{{ $target->name }}</td>
                                            <td>{{ $target->phoneNumber }}</td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#kickUserModal{{ $target->userID }}">Kick User</button>
                                                @include('components.ownerViewModal', ['target' => $target])
                                                    {{-- @csrf
                                                    @method('put')
                                                    <div style="text-align: right;">
                                                    <button type="submit" class="thisUser btn btn-danger" value="GET VALUE">Kick User</button>
                                                    </div>
                                                    @include('components.organizationModal') --}}
                                                </div>
                                            </td>
                                            </tr>
                                        {{-- </form> --}}
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-end px-3">
                                    <nav aria-label="Page navigation">
                                        <div class="d-flex justify-content-end">
                                            <p id="pageInfo">Page: {{ $page }}</p>
                                        </div>
                                        <ul class="pagination">
<<<<<<< HEAD
                                            @if($page > 1)
                                                <li class="page-item"><a class="page-link" href="{{ route('memberList', ['page' => $page-1]) }}">Previous</a></li>
                                            @endIf
                                            @for($i = 0; $i < $total/8; $i++)
                                                <li class="page-item"><a class="page-link" href="{{ route('memberList', ['page' => $i+1]) }}">{{ $i+1 }}</a></li>
                                            @endfor
                                            @if($page < $total/8)
                                                <li class="page-item"><a class="page-link" href="{{ route('memberList', ['page' => $page+1]) }}">Next</a></li>
                                            @endif
=======
                                            <li class="page-item"><a class="page-link" href="{{ route('memberList', ['page' => $page-1]) }}">Previous</a></li>
                                            @for($i = 0; $i < $total/1; $i++)
                                                <li class="page-item"><a class="page-link" href="{{ route('memberList', ['page' => $i+1]) }}">{{ $i+1 }}</a></li>
                                            @endfor
                                            <li class="page-item"><a class="page-link" href="{{ route('memberList', ['page' => $page+1]) }}">Next</a></li>
>>>>>>> b59783a (User Profile System)
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection