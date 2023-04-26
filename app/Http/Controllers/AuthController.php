<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerRegMail;
use App\Mail\PasswordResetMail;
use DateTime;
use Socialite;
use Auth;
use Cookie;

class AuthController extends Controller
{
 
    public function CustomerCreateSubmit(Request $request){

        $validate = $request->validate([
              "name"=>'required|max:20',
              "gender"=>"required",
              'dob'=>'required|date',
              "permanentadd"=>"required",
              "presentadd"=>"required",
              'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|digits:10',
              'email'=>'required|email',
              'password'=>'required|min:5',
              
          ],
          ['name.required'=>"Name field is required.",
          'permanentadd.required'=>"Permanent Address field is required.",
          'presentadd.required'=>"Present Address field is required.",
          'phone.required'=>"Phone Number field is required.",
          'email.required'=>"Email Address field is required.",
          'password.required'=>"Password field is required.",
          'phone.regex'=>"Please valid phone number format."]
      );
      $pass=$request->password;
      $cpass=$request->cpassword;

      if ($cpass == $pass)  
      {
  
      $userCheck = Customer::where('email',$request->email)->first();
      if($userCheck){
  
          return redirect()->back()->with('failed', 'Email already exist');
      }
      else{
  
        $Customer = new Customer();
          $Customer->name = $request->name;
          $Customer->gender = $request->gender;
          $Customer->dob = $request->dob;
          $Customer->permanentadd = $request->permanentadd;
          $Customer->presentadd = $request->presentadd;
          $Customer->phone = $request->digit.$request->phone;
          $Customer->email = $request->email;
          $request->session()->put('email',$request->email);
          $Customer->password = md5($request->password);
          $code = rand(10000,90000);
          $details = [
              'name' => $Customer->name,
              'code' => $code
          ];
          $Customer->otp = $code;
          Mail::to($request->email)->send(new CustomerRegMail($details));
          $result = $Customer->save();
          if($result){
              return redirect()->route('customerOtp');
          }
          else{
              return redirect()->back()->with('failed', 'Registration Failed');
          }
      }
  
      }
      else{
        return redirect()->back()->with('failed', 'Your Password doesnt matched');
    }
    }


    public function otpsend (Request $request){
        $validate = $request->validate([
            'otp'=>'required',
        ]);

    $user = Customer::where('email',session()->get('email'))->first();

    if($user->otp === $request->otp){
        $user->otp = "Approved";
        $user->save();
        return  redirect()->route('customerLogin');
    }
    else{
        return redirect()->back()->with('failed', 'Wrong OTP');
    }

    }

    public function otpresend (){
    $user = Customer::where('email',session()->get('email'))->first();
    $code = rand(10000,90000);
    $user->otp = $code;
    $details = [
        'name' => $user->name,
        'code' => $code
    ];
    Mail::to($user->email)->send(new CustomerRegMail($details));
    $result = $user->save();
    if($result){
        return redirect()->back();
    }

    }

    public function CustomerLoginSubmit(Request $request){

    $loginCheck = Customer::where('email',$request->email)->where('password',md5($request->password))->first();

    if($loginCheck){
        if($loginCheck->otp == "Approved")
        {
            $request->session()->put('id',$loginCheck->id);
            $request->session()->put('name',$loginCheck->name);
            $request->session()->put('gender',$loginCheck->gender);
            $request->session()->put('dob',$loginCheck->dob);
            $request->session()->put('phone',$loginCheck->phone);
            $request->session()->put('email',$loginCheck->email);
            $request->session()->put('permanentadd',$loginCheck->permanentadd);
            $request->session()->put('presentadd',$loginCheck->presentadd);
            $request->session()->put('password',$loginCheck->password);
            if($request->has('rememberme'))
            {
                Cookie::queue('customer_email',$request->email, 1440);
                Cookie::queue('customer_password',$request->password, 1440);
            }
            return  redirect()->route('dashboard');
        }
        else{
            return redirect()->back()->with('failedotp', 'This Email is not verified yet...');
        }
    }
    else{
        
        return redirect()->back()->with('failed', 'Invalid Login Information');
    }
    }

    public function customerlogout(){
        session()->forget('id');
        session()->forget('name');
        session()->forget('gender');
        session()->forget('dob');
        session()->forget('phone');
        session()->forget('email');
        session()->forget('permanentadd');
        session()->forget('presentadd');
        session()->forget('password');
        Cookie::queue(Cookie::forget('customer_email'));
        Cookie::queue(Cookie::forget('customer_password'));
        return redirect()->route('customerLogin');
    }

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $exist_user = Customer::where('google_id',$user->id)->first();

            if($exist_user){
                return redirect('/dashboard');
            }
            else{
                $newUser = Customer::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                ]);
                return redirect('/dashboard');
            }
        }
        catch (Exception $e) 
        {
             dd($e->getMessage());
        }
    }

    public function forgetPasswordSubmit(Request $request){

        $validate = $request->validate([
              'email'=>'required|email',  
          ],
          [
          'email.required'=>"Email Address field is required.",
          ]
      );

      $userCheck = Customer::where('email',$request->email)->first();
      if($userCheck){
  
          $details = [
              'name' => $userCheck->name,
              'email' => $userCheck->email
          ];
          $result= Mail::to($request->email)->send(new PasswordResetMail($details));
          if($result) {
            return redirect()->back()->with('success', 'Success! password reset link has been sent to your email');
        }
        else{
            return redirect()->back()->with('failed', 'Failed! there is some issue with email provider');
        }
        
      }
      else{

        return redirect()->back()->with('failed', 'Email not registered');
    }

   }

   public function resetpassword($email){
      
    return view('customer.resetpassword')->with('email', $email);
   }

   public function resetpasswordSubmit(Request $request){
    $validate = $request->validate([
        'password'=>'required|min:5',
        'confirm_password'=>'required|min:5',
        
    ],
    [
        'password.required'=>"Password field is required.",
        'confirm_password.required'=>"Confirm Password field is required."
    ]
 );
 $pass=$request->password;
 $cpass=$request->confirm_password;

 if ($cpass == $pass)  
 {
 $user = Customer::where('email',$request->email)->first();
 $user->password = md5($request->password);
 $result = $user->save();
 if($result){

    return redirect()->back()->with('success', 'Success! password has been changed');
}
else{
    return redirect()->back()->with('failed', 'Failed! something went wrong');
 }
 }
 else
 {
    return redirect()->back()->with('failed', 'Both of the Password doesnt matched'); 
 }
 }

}
