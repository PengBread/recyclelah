<!-- Organization Schedules Create Modal -->

<script>
    function updateDate(val) {

        //var dateTime = document.getElementById("scheduleDateStart").value;
        var dateTime = val;
        var getDate = dateTime.split('-');
        var getTime = getDate[2].split(' ');
        var getHour = getTime[1].split(':');
        var hour = parseInt(getHour[0], 10) + 1;

        document.getElementById("scheduleEndDate").value = getDate[0] + '-' + getDate[1] + '-' + getTime[0] + ' ' + hour + ':' + getHour[1];
    }
</script>


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
                        <label for="scheduleTitle" class="col-md-3 col-form-label text-md-right">Title: </label>

                        <div class="col-md-9">
                            <input id="scheduleTitle" type="text" class="form-control @error('scheduleTitle') is-invalid @enderror" name="scheduleTitle" value="" required>
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
                                {{-- <option value="Select a Category">Select a category</option> --}}
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
                                <input class="form-control @error('scheduleDateStart') is-invalid @enderror" type="datetime-local" placeholder="Select a date" id="scheduleDateStart" name="scheduleDateStart" data-bs-target="#scheduleDateStart" onchange="updateDate(this.value)" required >
                            </div>
                            
                            <script type="text/javascript">

                                config = {
                                    enableTime: true,
                                    dateFormat: "Y-m-d H:i",
                                    altInput: true,
                                    minDate: Date.now(),
                                    defaultDate: Date.now(),
                                }

                                flatpickr("input[type=datetime-local]", config);
                           </script>

                            @error('scheduleDateStart')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>          
                    {{-- <div class="form-group row p-2">
                        <label for="scheduleDateEnd" class="col-md-3 col-form-label text-md-right">Date End: </label>
                        <div class="col-md-9">
                            <div class="md-form">
                                <input class="form-control @error('scheduleDateEnd') is-invalid @enderror" type="datetime-local" placeholder="Select a date" id="scheduleDateEnd" name="scheduleDateEnd" data-bs-target="#scheduleDateEnd" required>
                            </div>
                            <script type="text/javascript">

                                var dateTime = document.getElementById("scheduleDateStart").value;

                                var getDate = dateTime.split('-');
                                var getTime = getDate[2].split(' ');
                                var getHour = getTime[1].split(':');
                                var hour = parseInt(getHour[0], 10) + 1;

                                config = {
                                    enableTime: true,
                                    dateFormat: "Y-m-d H:i",
                                    altInput: true,
                                    minDate: getDate[0] + '-' + getDate[1] + '-' + getTime[0] + ' ' + hour + ':' + getHour[1],
                                    defaultDate: getDate[0] + '-' + getDate[1] + '-' + getTime[0] + ' ' + hour + ':' + getHour[1],
                                }

                                flatpickr("input[type=datetime-local]", config);
                            </script>
                            @error('scheduleDateEnd')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>           --}}
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
                            <textarea id="scheduleContent" type="text" class="form-control @error('scheduleContent') is-invalid @enderror" style="resize: none"  name="scheduleContent" rows='5' required></textarea>
                        </div>

                        @error('scheduleContent')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- <div class="form-group row p-2">
                        <label for="testing" class="col-md-3 col-form-label text-md-right">Date End: </label>
                        <div class="col-md-9">
                            <div class="md-form">
                                <input class="form-control" id="testing" name="testing" data-bs-target="#testing" required>
                            </div>
                            <script type="text/javascript">
                                var dateTime = document.getElementById("scheduleDateStart").value;

                                var getDate = dateTime.split('-');
                                var getTime = getDate[2].split(' ');
                                var getHour = getTime[1].split(':');
                                var hour = parseInt(getHour[0], 10) + 1;

                                document.getElementById("testing").value = getDate[0] + '-' + getDate[1] + '-' + getTime[0] + ' ' + hour + ':' + getHour[1];
                            </script>
                        </div>
                    </div>                                                          --}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create Schedule</button>
                </div>
            </form>
        </div>
    </div>
</div>   