<!-- Organization Schedules Create Modal -->
<div class="modal fade bd-example-modal-lg" id="createScheduleModal" tabindex="-1">     
    <div class="modal-dialog modal-lg">
        <div class="modal-content">     
            <div class="modal-header">                                      
                <h5 class="modal-title" id="scheduleModel">Create Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action=" {{ route('orgSchedule.createSchedule') }}">
                @csrf
                
                <div class="modal-body">
                    <div class="form-group row p-2">
                        <label for="scheduleName" class="col-md-3 col-form-label text-md-right">Title: </label>

                        <div class="col-md-9">
                            <input id="scheduleName" type="text" class="form-control @error('scheduleName') is-invalid @enderror" name="scheduleName" value="" required>
                        </div>

                        @error('scheduleName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group row p-2">
                        <label for="stateName" class="col-md-3 col-form-label text-md-right">State: </label>
                        <div class="col-md-9">

                            <select class="form-select @error('stateName') is-invalid @enderror" id="stateName" name="stateName">
                                {{-- <option value="Select a State">Select a state</option> --}}
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
                        <label for="recyclingCategory" class="col-md-3 col-form-label text-md-right">Category: </label>
                        <div class="col-md-9">

                            <select class="form-select" id="recyclingCatagory" name="recyclingCategory">
                                {{-- <option value="Select a Category">Select a category</option> --}}
                                <option value="Plastic">Plastic</option>
                                <option value="Metal">Metal</option>
                                <option value="Paper">Paper</option>
                            </select>

                            @error('recyclingCategory')
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
                                <input class="date form-control @error('scheduleDateStart') is-invalid @enderror" type="text" placeholder="Select a date" id="scheduleDateStart" name="scheduleDateStart" data-bs-target=".date" value="" required>
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
                        <label for="scheduleDateEnd" class="col-md-3 col-form-label text-md-right">Date End: </label>
                        <div class="col-md-9">
                            <div class="md-form">
                                <input class="date form-control @error('scheduleDateEnd') is-invalid @enderror" type="text" placeholder="Select a date" id="scheduleDateEnd" name="scheduleDateEnd" data-bs-target=".date" value="" required>
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
                        <label for="scheduleContent" class="col-md-3 col-form-label text-md-right">Post: </label>

                        <div class="col-md-9">
                            <textarea id="scheduleContent" type="text" class="form-control @error('scheduleContent') is-invalid @enderror" style="resize: none"  name="scheduleContent" rows='5' required></textarea>
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
                    <button type="submit" class="btn btn-primary">Create Schedule</button>
                </div>
            </form>
        </div>
    </div>
</div>   