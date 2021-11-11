<!-- Kick User Modal -->
<div class="modal fade" id="deleteScheduleModal{{ $data->scheduleID }}" tabindex="-1">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="kickUserModalLabel"></h5>
            </div>
            <div class="modal-body">
                <form class="form" method="POST" action="{{ route('orgSchedule.deleteSchedule', ['schedule' => $data->scheduleID]) }}">
                    @csrf
                    @method('put') 

                    <div class="container mx-auto">
                        <div class="d-flex align-items-center p-3">
                            
                            <h5>Are you sure you want to delete this schedule?</h5>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">YES</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- -->