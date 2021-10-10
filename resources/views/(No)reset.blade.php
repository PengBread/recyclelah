@extends('layouts.navfoot')

@section('navfoot')
<body>
   
    <div class="container my-5">
        
        <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 55vh">

        

            <form method="POST" action="verify" style="border: 1px solid #000000">

                <div class="d-flex-column align-items-center"></div>

                <div class="container-fluid d-flex justify-content-centre">
                    <p>
                        Reset Password
                    </p>
                </div>

                <div>
                    <input type="text" class="form-control" placeholder="New Password" name="Password" style="margin-top: 20px">
                </div>

                <div class="d-flex justify-content-center">
                    <button class="btn btn-outline-success btn-lg" style="margin-top: 20px; padding: 10px 10px 10px 10px;" type="submit" >Reset</button>
                </div>

                <div class="container my-5" ></div>

            </form> 

        </div>

            

       

    </div>


</body>    
@endsection