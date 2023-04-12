<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerRegMail;
use DateTime;

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
          $code = rand(1000,9000);
          $details = [
              'name' => $Customer->name,
              'code' => $code
          ];
          $Customer->otp = $code;

          Mail::to($request->email)->send(new CustomerRegMail($details));
          $result = $Customer->save();
          if($result){
              return redirect()->route('CustomerOtp');
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
        return  redirect()->route('CustomerLogin');
    }
    else{
        return redirect()->back()->with('failed', 'Wrong OTP');
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
            return  redirect()->route('CustomerDash');
        }
        else{
            return redirect()->back()->with('failed', 'This Email is not verified yet...');
        }
    }
    else{
        return redirect()->back()->with('failed', 'Invalid Login Information');
    }
    }

    public function logout(){
        session()->forget('id');
        session()->forget('name');
        session()->forget('gender');
        session()->forget('dob');
        session()->forget('phone');
        session()->forget('email');
        session()->forget('peraddress');
        session()->forget('preaddress');
        session()->forget('nid');
        session()->forget('dlic');
        session()->forget('username');
        session()->forget('password');
        session()->forget('image');
        return redirect()->route('CustomerLogin');
    }
}