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
                    <form class="form" method="POST" action="{{ route('profile.editName', $userInfo) }}">
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