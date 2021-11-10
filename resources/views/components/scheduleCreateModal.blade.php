<!-- Organization Schedules Create Modal -->
<div class="modal fade bd-example-modal-lg" id="makeSchedule" tabindex="-1">     
    <div class="modal-dialog modal-lg">
        <div class="modal-content">     
            <div class="modal-header">                                      
                <h5 class="modal-title" id="scheduleModel">Create Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ url('/profile/organization') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group row p-2">
                        <label for="scheduleName" class="col-md-3 col-form-label text-md-right">{{ __('Schedule Title') }}</label>

                        <div class="col-md-9">
                            <input id="scheduleName" type="text" class="form-control @error('scheduleName') is-invalid @enderror" name="scheduleName" value="{{ old('scheduleName') }}" required>
                        </div>

                        @error('scheduleName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group row p-2">
                        <label for="stateName" class="col-md-3 col-form-label text-md-right">{{ __('State') }}</label>
                        <div class="col-md-9">

                            <select class="form-select @error('stateName') is-invalid @enderror" id="stateName" name="stateName">
                                <option value="Select a State">Select a State</option>
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

                            @error('stateName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>
                    <div class="form-group row p-2">
                        <label for="recyclingCatagory" class="col-md-3 col-form-label text-md-right">{{ __('Catagory') }}</label>
                        <div class="col-md-9">

                            <select class="form-select" id="recyclingCatagory" name="recyclingCatagory">
                                <option value="Select a Catagory">Select a Catagory</option>
                                <option value="Plastic">Plastic</option>
                                <option value="Metal">Metal</option>
                                <option value="Paper">Paper</option>
                            </select>

                            @error('recyclingCatagory')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>
                    <div class="form-group row p-2">
                        <label for="scheduleDate" class="col-md-3 col-form-label text-md-right">{{ __('Date') }}</label>
                        <div class="col-md-9">
                            <div class="md-form">
                                <input class="date form-control @error('scheduleDate') is-invalid @enderror" type="text" placeholder="Select a date" id="scheduleDate" name="scheduleDate" data-bs-target=".date" value="{{ old('scheduleDate') }}" required>
                            </div>
                            
                            <script type="text/javascript">
                                $('.date').datetimepicker({  
                                    defaultDate: new Date(),
                                    minDate: new Date(),
                                    format:'DD/MM/YYYY'
                                });  
                            </script>

                            @error('scheduleDate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>          
                    <div class="form-group row p-2">
                        <label for="scheduleTimeStart" class="col-md-3 col-form-label text-md-right">{{ __('Time') }}</label>

                        <div class="col-md-9">
                            <div class="form-group col-sm d-flex justify-content-center align-items-center">
                                <input class="time form-control @error('scheduleTimeStart') is-invalid @enderror" type="text" placeholder="Set time" id="scheduleTimeStart" name="scheduleTimeStart" data-bs-target=".time" value="{{ old('scheduleTimeStart') }}" required>
                            </div>

                            <script type="text/javascript">
                                $('.time').datetimepicker({ 
                                    format: 'hh:mm a'
                                });  
                            </script>

                            @error('scheduleTimeStart')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row p-2">
                        <label for="scheduleContent" class="col-md-3 col-form-label text-md-right">{{ __('Content') }}</label>

                        <div class="col-md-9">
                            <input id="scheduleContent" type="text" class="form-control @error('scheduleContent') is-invalid @enderror" name="scheduleContent" value="{{ old('scheduleContent') }}" required>
                        </div>

                        @error('scheduleContent')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>                                      
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create Schedule</button>
                </div>
            </form>
        </div>
    </div>
</div>   