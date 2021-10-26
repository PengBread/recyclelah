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
                                <table class="table" name='affiliateTable'>
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
                                    @foreach($usersOrg as $user)
                                        <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td name='name{{ $loop->iteration }}'>{{ $user->name }}</td>
                                        <td>{{ $user->phoneNumber }}</td>
                                        <td>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#kickUserModal">Kick User</button>
                                        </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.organizationModal')
</div>

@endsection