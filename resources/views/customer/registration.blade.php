<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Ecomsite Registration</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet"/>
</head>
<body style="background-color: #eee;">
    <section class="mt-4 mb-4">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px;">
              <div class="card-body p-md-5">
                <div class="row justify-content-center">
                  <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                    <form action="{{route('customerRegistration')}}" method="post" name="form" enctype="multipart/form-data" class="mx-1 mx-md-4">
                    {{csrf_field()}}
                        <div class="mb-3">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input type="text" name="name" class="form-control" placeholder="Full name">
                        </div> 
                        <span class="text-danger"> @error('name') {{ $message }}@enderror</span>
                        </div>
                        
                        <div class="mb-3">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-venus-mars"></i> </span>
                            </div>
                            <select class="form-select form-select-sm" name="gender"  style="font-size: 16px;" >
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                            </select>
                        </div> 
                        <span class="text-danger"> @error('gender') {{ $message }}@enderror</span>
                        </div>

                        <div class="mb-3">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
                            </div>
                            <input type="date" name="dob" class="form-control">
                        </div> 
                        <span class="text-danger"> @error('dob') {{ $message }}@enderror</span>
                        </div>

                        <div class="mb-3">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-map-marker"></i> </span>
                            </div>
                            <textarea name="permanentadd" class="form-control" placeholder="Permanent address"></textarea>
                        </div> 
                        <span class="text-danger"> @error('permanentadd') {{ $message }}@enderror</span>
                        </div>

                        <div class="mb-3">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-map-marker"></i> </span>
                            </div>
                            <textarea name="presentadd" class="form-control" placeholder="Present address" ></textarea>
                        </div> 
                        <span class="text-danger"> @error('presentadd') {{ $message }}@enderror</span>
                        </div>

                        <div class="mb-3">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                            </div>
                            <select class="form-select form-select-sm" style="max-width: 100px; font-size: 16px;" name="digit">
                                <option selected="880">+880</option>
                                <option value="972">+972</option>
                                <option value="198">+198</option>
                                <option value="701">+701</option>
                            </select>
                            <input name="phone" class="form-control" placeholder="Phone number" type="text">
                        </div> 
                        <span class="text-danger"> @error('phone') {{ $message }}@enderror</span>
                        </div>

                        <div class="mb-3">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                            </div>
                            <input name="email" class="form-control" placeholder="Email address" type="email">
                        </div>
                        <span class="text-danger"> @error('email') {{ $message }}@enderror</span>
                        </div>

                        <div class="mb-3">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input class="form-control" name="password" placeholder="Create password" type="password">
                        </div> 
                        <span class="text-danger"> @error('password') {{ $message }}@enderror</span>
                        </div>

                        <div class="form-group input-group  mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input class="form-control" name="cpassword" placeholder="Repeat password" type="password">
                        </div>   

                        <div class="form-check d-flex mb-5 mt-4">
                            <input class="form-check-input me-2" type="checkbox" value="" id="terms" required/>
                            <label class="form-check-label" for="terms">
                              I agree all statements in <a href="#!">Terms of service</a>
                          </label>
                      </div>

                      <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <input type="submit" class="btn btn-primary btn-lg" value="Create Account">
                    </div>

                </form>

            </div>
            <div class="col-md-10 col-lg-6 col-xl-7 order-1 order-lg-2">
                <h4 style="text-align: center;">Ecomsite.com</h4>
                <img src="https://img.freepik.com/free-vector/online-wishes-list-concept-illustration_114360-3900.jpg?w=740&t=st=1681843419~exp=1681844019~hmac=b7560b680f75ea84e100e4742b337399dac6500185624a690f2b71f6dd1a62ba"
                class="img-fluid mt-4" alt="Sample image" style="max-height: 650px;">
                <a href="{{route('customerLogin')}}" class="d-flex justify-content-center" style="text-decoration: underline;">I am already member</a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</section>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
</body>
</html>