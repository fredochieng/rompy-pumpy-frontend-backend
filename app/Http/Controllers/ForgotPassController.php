<?php

namespace App\Http\Controllers;

use App\Api\Models\ModelsApi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ForgotPassController extends Controller
{
    public function show_password_reset_form(Request $request){
        $auth_id = Auth::id();

        $data['session_available'] = ModelsApi::CheckSession($auth_id);
        if($data['session_available'] == "Y"){
            $data['name'] = User::where('id', $auth_id)->first()->name;
            $model_no = DB::table('models')->select(DB::raw('models.m_model_id'), DB::raw('models.model_no'))
                ->where('m_model_id', $auth_id)
                ->first()->model_no;

            return view('website.auth.forgot-password')->with($data);
        }else{

            //dd($session_available);
            return view('website.auth.forgot-password')->with($data);
        }
    }

    public function reset_password(Request $request)
    {
        $email = $request->email;

        Log::info("Email is ". $email);

        $user = User::where('email', $email)->first();

        if (empty($user)) {
            $data['message'] = "The email address you entered is not registered. Please try again";
            return view('authentication.success')->with($data);
        } else {

            $reset_token = sha1(time());
            dd($reset_token);
            $save_reset_array = array(
                'email' => $email,
                'token' => $reset_token
            );

            $save = DB::table('password_resets')->insert($save_reset_array);
            $reset_token = sha1(time());
            $save_reset_array = array(
                'email' => $email,
                'token' => $reset_token
            );

            $save = DB::table('password_resets')->insert($save_reset_array);

            $app_url = ENV('APP_URL');

            $name = $user->name;
            $email = $user->email;
            $title = 'Reset Password';
            $message_body = $app_url . ('/reset-my-password/&token=' . $reset_token);

            $send_mail = Mail::to($email)->send(new ResetPassword($name, $title, $message_body));
            $data['icon'] = "check";
            $data['status'] = "thank";
            $data['title'] = 'Password Reset';
            $data['message'] = "We have sent the password reset instructions to your email address. Kindly check your email address and reset your password";
            $app_url = ENV('APP_URL');

            $name = $user->name;
            $email = $user->email;
            $title = 'Reset Password';
            $message_body = $app_url . ('/reset-my-password/&token=' . $reset_token);

            $send_mail = Mail::to($email)->send(new ResetPassword($name, $title, $message_body));
            $data['icon'] = "check";
            $data['status'] = "thank";
            $data['title'] = 'Password Reset';
            $data['message'] = "We have sent the password reset instructions to your email address. Kindly check your email address and reset your password";

            return view('authentication.success')->with($data);
        }
    }
}
