@extends('layouts.navfoot')

@section('navfoot')
<body>
   
    {{-- <div class="container my-5"> --}}
        
        <div class="container-fluid mx-auto justify-content-center align-items-center" style="height: 60vh;" >

        

            <form method="POST" action="verify" style="border: 1px solid #000000; margin-left:20vw; margin-right:20vw; margin-top:20vh; margin-bottom:20vh">

                {{-- <div class="d-flex-column align-items-center"></div> --}}

                <div class="container-fluid mx-auto justify-content-centre">
                    <p class="text-center" style="margin-top:10vh; font-size:20px">
                        Reset Password
                    </p>
                </div>

                <div class="container-fluid d-flex justify-content-center">
                    <input type="text" class="form-control" placeholder="New Password" name="Password" style="margin-top:30px; margin-left:10vw; margin-right:10vw;">
                </div>

                <div class="d-grid gap-2">
                    <button class="btn btn-outline-success btn-lg" style="margin-top: 20px; margin-bottom:10vh; margin-left:24vh; margin-right:24vh;" type="submit" >Reset</button>
                </div>

                {{-- <div class="container my-5" ></div> --}}

            </form> 

        </div>

            

       

    {{-- </div> --}}


</body>    
@endsection

{{-- test test --}}
