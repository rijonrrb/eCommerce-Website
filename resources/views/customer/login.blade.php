<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<!-- Loding font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,700" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Login</title>
    <style type="text/css">
      #h2 {
   text-align: center; 
   border-bottom: 1px solid #000; 
   line-height: 0.1em;
    } 

    #h2 span { 
        background:#fff; 
        padding:0 10px; 
    }

	body {
	font-family: 'Montserrat', sans-serif;
	text-rendering : optimizeLegibility;
	-webkit-font-smoothing : antialiased;
}

#login{
	padding-top: 10%;
	text-align: center;
	text-transform: uppercase;
}


.login {
	width: 100%;
	height: 500px;
	background-color: #fff;
	padding: 15px;
	padding-top: 30px;
}

.login h1 {
	margin-top: 30px;
	font-weight: bold;
	font-size: 60px;
	letter-spacing: 3px;
}

.login form {
	max-width: 420px;
	margin: 30px auto;
}

.login .btn {
	border-radius: 50px;
	text-transform: uppercase;
	font-weight: bold;
	letter-spacing: 2px;
	font-size: 20px;
	padding: 14px;
	background-color: #00B72E;
}

.form-group input {
	font-size: 20px;
	font-weight: lighter;
	border: none;
	background-color: #F0F0F0;
	color: #465347!important;
	padding: 26px 30px;
	border-radius: 50px;
	transition : 0.2s;
}




/* Form check styles*/

.form-check {
	padding: 0;
	text-align: left;
}

.form-check label {
	vertical-align: top;
	padding-top: 5px;
	padding-left: 5px;
	font-size: 15px;
	color: #606060;
	font-size: 14px;
}

.forgot-password {
	text-align: right;
	float: right;
	font-weight: bold;
}

.forgot-password a {
	color: #00B72E;
	opacity: 0.6;
}

.forgot-password a:hover {
	opacity: 1;
}


/* Switch styles */

.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 30px;
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #F0F0F0;
  -webkit-transition: .4s;
  transition: .4s;
  border-radius: 30px;
}

.slider:before {
  position: absolute;
  content: "";
  height: 22px;
  width: 22px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
  border-radius: 50%;
}

input:checked + .slider {
  background-color: #00B72E;
}

input:focus + .slider {
  box-shadow: 0 0 1px ##00B72E;
}

input:checked + .slider:before {
  -webkit-transform: translateX(30px);
  -ms-transform: translateX(30px);
  transform: translateX(30px);
}



/* Media queries */

@media(max-width: 500px) {
	.bg-img , .bg-color {
	min-width: 100%;
	height: 50%;
	margin: 0;
	}

	.forgot-password {
	text-align: right;
	float: left;
	padding: 20px 0;
	}


	#login {
		padding-top: 50px;
	}

}

    </style>
  </head>
<body style="background-color: #eee;">
    <section class="mt-4 mb-4">
      <div class="container h-100">	  
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-12 col-xl-11">	  
            <div class="card text-black" style="border-radius: 25px;">
              <div class="card-body p-md-5">
                <div class="row justify-content-center">
                  <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1 dfljustify-content-center">
                    <p class="h2 ml-1 mt-5">Welcome Back!</p>
                    <h6 class="ml-2 mb-5 font-weight-bold">login to continue</h6>
                  <form action="{{route('customerLogin')}}" method="post" name="form">
				  {{csrf_field()}}

						@if (Session::has('failedotp'))
						<script>
						Swal.fire({
						title: 'Unverified Account',
						html: 'Please verify your email address',
						icon: 'warning',
						showConfirmButton:false,
						timer: 5000,})
						</script>
						@endif

						@if (Session::has('failed'))
						<script>
						Swal.fire({
						title: 'Invalid Information!',
						html: 'Please login again with valid credentials',
						icon: 'question',
						showConfirmButton:false,
						timer: 5000,})
						</script>
						@endif

                    <div class="form-group">
                      <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter Email" @if(Cookie::has('customer_email')) value="{{Cookie::get('customer_email')}}" @endif>
                      
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control" placeholder="Password" @if(Cookie::has('customer_password')) value="{{Cookie::get('customer_password')}}" @endif>
                    </div>

                      <div class="form-check mt-4">

                      <label class="switch">
                      <input type="checkbox" name="rememberme" @if(Cookie::has('customer_email')) checked @endif>
                      <span class="slider round"></span>
                    </label>
                      <label class="form-check-label" for="exampleCheck1">Remember me</label>
                      <label class="forgot-password"><a href="{{route('forgetPassword')}}" target="_blank">Forgot Password?<a></label>

                    </div>
                  
                    <br>
                    <input type="submit" class="btn btn-lg btn-block btn-success" value="Sign in">
                 </form>
                 <p id="h2" class="mt-5 mb-5"><span>or</span></p>
                 <p class="ml-2 mb-4">Login with -<a href="{{url('/redirect')}}"><img style="max-width: 30px;" src="{{asset('image/google.png')}}" class="ml-3"></a></p>
            </div>
            <div class="col-md-10 col-lg-6 col-xl-7">
                            <img src="https://img.freepik.com/free-vector/flat-online-shopping-concept_52683-63899.jpg?w=740&t=st=1681982044~exp=1681982644~hmac=5a19dda5f843a994bcdfa4bb981ec1cbdf48f378ddda9acc5e126b1047c16c30"
                class="img-fluid " alt="Sample image" style="max-height: 650px;">
                <p class="d-flex justify-content-center">New User?<a href="{{route('customerRegistration')}}" class="ml-2">Sign Up</a></p>                  
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</section>
</body>
</html>