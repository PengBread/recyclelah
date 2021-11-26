<div class="modal fade bd-example-modal-lg" id="editScheduleModal{{ $data->scheduleID }}" tabindex="-1">     
    
    <div class="modal-dialog modal-lg">
        <div class="modal-content">     
            <div class="modal-header">                                      
                <h5 class="modal-title" id="scheduleModel">Edit Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('orgSchedule.updateSchedule', ['schedule' => $data->scheduleID]) }}">
                @csrf
                @method('put')

                <div class="modal-body">
                    <div class="form-group row p-2">
                        <label for="scheduleState" class="col-md-3 col-form-label text-md-right">Status: </label>
                        <div class="col-md-9">
                            <select class="form-select @error('scheduleStatus') is-invalid @enderror" id="scheduleState" name="scheduleStatus">
                                <option value="Ongoing" @if ($data->scheduleStatus == true) selected="selected" @endif>Ongoing</option>
                                <option value="Completed" @if ($data->scheduleStatus == false) selected="selected" @endif>Completed</option>
                            </select>

                            @error('scheduleStatus')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row p-2">
                        <label for="scheduleTitle" class="col-md-3 col-form-label text-md-right">Title: </label>

                        <div class="col-md-9">
                            <input id="scheduleTitle" type="text" class="form-control @error('scheduleTitle') is-invalid @enderror" name="scheduleTitle" value="{{ $data->scheduleName }}" required>
                        </div>

                        @error('scheduleTitle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group row p-2">
                        <label for="scheduleState" class="col-md-3 col-form-label text-md-right">State: </label>
                        <div class="col-md-9">
                            <select class="form-select @error('scheduleState') is-invalid @enderror" id="scheduleState" name="scheduleState">
                                <option value="{{ $data->stateName }}">Old Selection: {{ $data->stateName }}</option>
                                <option value="Johor">Johor</option>
                                <option value="Kedah">Kedah</option>
                                <option value="Kelantan">Kelantan</option>
                                <option value="Malacca">Malacca</option>
                                <option value="Negeri Sembilan">Negeri Sembilan</option>
                                <option value="Pahang">Pahang</option>
                                <option value="Penang">Penang</option>
                                <option value="Perak">Perak</option>
                                <option value="Perlis">Perlis</option>
                                <option value="Sabah">Sabah</option>
                                <option value="Sarawak">Sarawak</option>
                                <option value="Selangor">Selangor</option>
                                <option value="Terengganu">Terengganu</option>
                            </select>

                            @error('scheduleState')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>
                    <div class="form-group row p-2">
                        <label for="scheduleCategory" class="col-md-3 col-form-label text-md-right">Category: </label>
                        <div class="col-md-9">
                            <select class="form-select" id="scheduleCategory" name="scheduleCategory">
                                <option value="{{ $data->recyclingCategory }}">Old Selection: {{ $data->recyclingCategory }}</option>
                                <option value="Plastic">Plastic</option>
                                <option value="Metal">Metal</option>
                                <option value="Paper">Paper</option>
                            </select>

                            @error('scheduleCategory')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>
                    <div class="form-group row p-2">
                        <label for="scheduleDateStart" class="col-md-3 col-form-label text-md-right">Date Start: </label>
                        <div class="col-md-9">
                            <div class="md-form">
                                <input class="form-control @error('scheduleDateStart') is-invalid @enderror" type="datetime-local" placeholder="Select a date" id="scheduleDateStart" name="scheduleDateStart" data-bs-target="#scheduleDateStart" value="{{ $data->scheduleDateStart }}" required>
                            </div>
                            
                            <script type="text/javascript">
                                $('.date').datetimepicker({  
                                    defaultDate: new Date(),
                                    minDate: new Date(),
                                    format:'DD/MM/YYYY'
                                });  
                            </script>

                            @error('scheduleDateStart')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>          
                    <div class="form-group row p-2">
                        <label for="scheduleDateEnd" class="col-md-3 col-form-label text-md-right">Time Length: </label>
                        <div class="col-md-9">
                            <div class="md-form">
                                <select class="form-select" id="scheduleDateEnd" name="scheduleDateEnd">
                                    {{-- <option value="Select a Category">Select a category</option> --}}
                                    <option value="1">1 Hour</option>
                                    <option value="2">2 Hours</option>
                                    <option value="3">3 Hours</option>
                                    <option value="4">4 Hours</option>
                                    <option value="5">5 Hours</option>
                                    <option value="6">6 Hours</option>
                                    <option value="7">7 Hours</option>
                                    <option value="8">8 Hours</option>
                                    <option value="9">9 Hours</option>
                                    <option value="10">10 Hours</option>
                                    <option value="11">11 Hours</option>
                                    <option value="12">12 Hours</option>
                                </select>
                            </div>
                            @error('scheduleDateEnd')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>       
                    
                    <div class="form-group row p-2">
                        <label for="scheduleContent" class="col-md-3 col-form-label text-md-right">Post: </label>

                        <div class="col-md-9">
                            <textarea id="scheduleContent" type="text" class="form-control @error('scheduleContent') is-invalid @enderror" style="resize: none"  name="scheduleContent" rows='5' required>{{ $data->scheduleContent }}</textarea>
                        </div>

                        @error('scheduleContent')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>                                      
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>   