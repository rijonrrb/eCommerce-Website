<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>OTP Check</title>
        <!-- Bootstrap 5 CDN Link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <!-- Custom CSS Link -->
        <style type="text/css">
            /* Google Poppins Font CDN Link */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

    *{
        margin:0;
        padding:0;
        box-sizing: border-box;
    }

    /* Variables */
    :root{
        --primary-font-family: 'Poppins', sans-serif;
        --light-white:#f5f8fa;
        --gray:#5e6278;
        --gray-1:#e3e3e3;
    }
    body{
        font-family:var(--primary-font-family);
        font-size: 14px;
    } 

    /* Main CSS OTP Verification New Changing */ 
    .wrapper{
        padding:0 0 100px;
        background-image:url("images/bg.png");
        background-position:bottom center;
        background-repeat: no-repeat;
        background-size: contain;
        background-attachment: fixed;
        min-height: 100%;
        /* height:100vh;
        display:flex;
        align-items:center;
        justify-content:center; */
    }
    .wrapper .logo img{
        max-width:40%;
    }
    .wrapper input{
        background-color:var(--light-white);
        border-color:var(--light-white);
        color:var(--gray);
    }
    .wrapper input:focus{
        box-shadow: none;
    }
    .wrapper .password-info{
        font-size:10px;
    }
    .wrapper .submit_btn{
        padding:10px 15px;
        font-weight:500;
    }
    .wrapper .login_with{
        padding:8px 15px;
        font-size:13px;
        font-weight: 500;
        transition:0.3s ease-in-out;
    }
    .wrapper .submit_btn:focus,
    .wrapper .login_with:focus{
        box-shadow: none;
    }
    .wrapper .login_with:hover{
        background-color:var(--gray-1);
        border-color:var(--gray-1);
    }
    .wrapper .login_with img{
        max-width:7%;
    } 

    /* OTP Verification CSS */
    .wrapper .otp_input input{
        width:35%;
        height:70px;
        text-align: center;
        font-size: 20px;
        font-weight: 600;
    }

    @media (max-width:1200px){
        .wrapper .otp_input input{ 
            height:50px; 
        }
    }
    @media (max-width:767px){
        .wrapper .otp_input input{ 
            height:40px; 
        }
    }
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Firefox */
    input[type=number] {
      -moz-appearance: textfield;
    }        
          
        </style>
    </head>
    <body style="background-image: radial-gradient( circle 975px at 2.6% 48.3%,  rgba(0,8,120,1) 0%, rgba(95,184,224,1) 99.7% );"> 
        <section class="wrapper">
            <div class="container">
                <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3 text-center">
                 <form action="{{route('customerOtp')}}" method="post" class="rounded bg-white shadow p-5" style="margin-top: 150px;" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <h3 class="text-dark fw-bolder fs-4 mb-2">Email Verification</h3>

                        <div class="fw-normal text-muted mb-4">
                            Enter the verification code we sent to {{Session::get('email')}}
                        </div>  

                        <div class="otp_input text-start mb-2">
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <input type="number" name="otp" id="otp" onKeyPress="if(this.value.length==5) return false;" class="form-control" placeholder="">
                            </div> 
                        </div>  
                        <input type="submit" value="Submit" class="btn btn-primary submit_btn my-4">

                                <div class="text-center ">
              <span class="d-block mobile-text" id="countdown"></span>
              <span class="d-block mobile-text" id="resend"></span>
            </div>
                    </form>
                </div>
            </div>
        </section>

        <script type="text/javascript">
            let timerOn = true;
    function timer(remaining) {
      var m = Math.floor(remaining / 60);
      var s = remaining % 60;
      m = m < 10 ? "0" + m : m;
      s = s < 10 ? "0" + s : s;
      document.getElementById("countdown").innerHTML = `Time left: ${m} : ${s}`;
      remaining -= 1;
      if (remaining >= 0 && timerOn) {
        setTimeout(function () {
          timer(remaining);
        }, 1000);
        document.getElementById("resend").innerHTML = `
        `;
        return;
      }
      if (!timerOn) {
        return;
      }
      document.getElementById("resend").innerHTML = `<div class="fw-normal text-muted mb-2">Didn’t get the code ? <a href="{{route('otpresend')}}" class="text-primary fw-bold text-decoration-none" onclick="timer(10)">Resend</a></div>`;
      document.getElementById("countdown").innerHTML = `
        `;
    }
    timer(10);
        </script>
    </body>
    </html>