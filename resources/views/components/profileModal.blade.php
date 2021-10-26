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