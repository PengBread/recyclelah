@extends('layouts.navfoot2')

@section('navfoot2')
<link rel="stylesheet" href="{{ asset('css/supportFaqProfile.css') }}">
<script type="text/javascript">
    function Validate() {
        var password = document.getElementById("passwordModalInput").value;
        var confirmPassword = document.getElementById("cfmpasswordModalInput").value;
        if (password != confirmPassword) {
            document.getElementById("matching").innerHTML = "Passwords do not match.";
            return false;
        }
        return true;
    }
</script>

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
                            <a href="/profile">Account Information</a>
                        </div>
                        <div class="profile-sidebar-items">
                            <a href="/profileOrg">Organization Information</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-content col col-sm pt-5 pb-5">
                <!--Account Details -->
                <div class="profile-content-container border">
                    <div class="pt-3 px-3">
                        <h4>Account Information</h4>
                        <hr>
                        <div>
                            <p>Edit whichever information you need</p>
                        </div>
                    </div>
                    
                    <div class="justify-content-center align-items-center pt-2 pb-2 px-4">
                        <div class="information-content">
                            <div class="row">
                                <div class="d-flex col-2 align-items-center">
                                    E-mail:
                                </div>
                                <div class="d-flex col-md-8 align-items-center">
                                    <input type="text" id="inputEmail" class="form-control" readonly="true" value="{{ $userInfo->email }}">
                                </div>
                            </div>
                        </div>
                        <div class="information-content pt-3">
                            <div class="row">
                                <div class="d-flex col-2 align-items-center">
                                    Name:
                                </div>
                                <div class="d-flex col-md-8 align-items-center">
                                    <input type="text" id="inputName" class="form-control" readonly="true" value="{{ $userInfo->name }}">
                                </div>
                                <div class="d-flex col-2 justify-content-center align-items-center">
                                    <button type="button" class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#nameModal">Edit</button>
                                </div>
                            </div>
                        </div>
                        <div class="information-content pt-3">
                            <div class="row">
                                <div class="d-flex col-2 align-items-center">
                                    Phone Number:
                                </div>
                                <div class="d-flex col-md-8 align-items-center">
                                    <input type="text" id="inputPhone" class="form-control" readonly="true" value="{{ $userInfo->phoneNumber }}">
                                </div>
                                <div class="d-flex col-2 justify-content-center align-items-center">
                                    <button type="button" class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#phoneModal">Edit</button>
                                </div>
                            </div>
                        </div>
                        <div class="information-content py-3">
                            <div class="row">
                                <div class="d-flex col-2 align-items-center">
                                    Password:
                                </div>
                                <div class="d-flex col-md-8 align-items-center">
                                    <input type="password" id="inputPassword" class="form-control" aria-describedby="passwordHelpBlock" readonly="true" value="0123456789">
                                </div>
                                <div class="d-flex col-2 justify-content-center align-items-center">
                                    <button type="button" class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#passwordModal">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="height: 19vh;">
    </div>

    <!-- MODAL BOXES HERE -->

    <!-- Name Modal -->
    <div class="modal fade" id="nameModal" tabindex="-1">
        @include('components.errors')

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="nameModalLabel">Change Name</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form" method="POST" action="{{ route('profile.editName') }}">
                        @csrf
                        @method('put') 

                        <p>Enter a new name to change your personal info name.</p>
                        <div class="d-flex align-items-center">
                            Name:
                        </div>
                        <div class="d-flex align-items-center">
                            <input type="text" id="nameModalInput" name="name" class="form-control" value="{{ $userInfo->name }}" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- -->

    <!-- Phone Modal -->
    <div class="modal fade" id="phoneModal" tabindex="-1">
        @include('components.errors')

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="phoneModalLabel">Change Phone Number</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form" method="POST" action="{{ route('profile.editPhone') }}">
                        @csrf
                        @method('put') 

                        <p>Enter a phone number to change your Phone Number. Please ensure that the phone number is real.</p>
                        <div class="d-flex align-items-center">
                            Phone Number:
                        </div>
                        <div class="d-flex align-items-center">
                            <input type="tel" id="phoneModalInput" name="phoneNumber" class="form-control" pattern="^(6?01)[0-9]{8,10}$" value="{{ $userInfo->phoneNumber }}" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- -->

    <!-- Password Modal -->
    <div class="modal fade" id="passwordModal" tabindex="-1">
        @include('components.errors')

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="passwordModalLabel">Change Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form" method="POST" action="{{ route('profile.editPassword') }}">
                        @csrf
                        @method('put') 

                        <p>Enter a new password.</p>
                        <div>
                            <p id="matching" style="color: red; font-size: 12px;"></p>
                            <label for="passwordModalInput">Password:</label>
                            <input type="password" id="passwordModalInput" name="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z]).{8,}" title="Must contain at least one number and one letter, and at least 8 or more characters" value="" required>
                        </div>
                        <div>
                            <label for="cfmpasswordModalInput">Confirm Password:</label>
                            <input type="password" id="cfmpasswordModalInput" class="form-control" aria-describedby="passwordHelpBlock" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" onclick="return Validate()">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- -->

</div>

@endsection