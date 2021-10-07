<?php

namespace App\Http\Controllers;

use App\Api\Models\ModelsApi;
use App\Mail\ResetPassword;
use App\Models\Selector;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Modules\Models\Entities\Models;
use Modules\Models\Entities\ModelServices;
use Session;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /** Load account infotmation */
    public function account($model_no){
        $auth_id = Auth::id();

        $model = DB::table('models')->select(
            DB::raw('models.m_model_id'),
            DB::raw('models.model_no')
        )->where('m_model_id', $auth_id)
            ->first();
        $model_no = $model->model_no;


        $data['session_available'] = ModelsApi::CheckSession($auth_id);
        if($data['session_available'] == "Y"){
            $data['name'] = User::where('id', $auth_id)->first()->name;
            $data['model_no'] = $model_no;
        }

        $data['model'] = ModelsApi::GetModel()->where('model_no', $model_no)->first();


        return view('website.auth.account')->with($data);
    }

    /** Model update profile */
    public function model_update_profile(Request $request, $model_no)
    {

        $model_no = $request->model_no;

        if (!empty($model_no) && is_numeric($model_no)) {
            $name = ucwords($request->name);
            $email = $request->email;
            $phone_no = $request->phone_no;
            $real_phone_no = $request->real_phone_no;
            $gender = $request->gender;
            $dob = $request->dob;
            //$age = Carbon::parse($dob)->diffInYears(Carbon::now());
            $country_id = $request->country_id;
            $city_id = $request->city_id;
            $ethnicity_id = $request->ethnicity_id;
            $build_id = $request->build_id;
            $service_id = $request->service_id;
            $availability_id = $request->availability_id;
            $about = $request->about;

            $model = ModelsApi::GetModel()->where('model_no', $model_no)->first();

            DB::beginTransaction();
            try {
                /** update user data */
                $user = array(
                    'name' => empty($name) ? $model->name : $name,
                    'email' => empty($email) ? $model->email : $email
                );

                $update_profile = User::where('id', $model->user_id)->update($user);

                /** Update model details */
                $model_details = array(
                    'phone_no' => empty($phone_no) ? $model->phone_no : $phone_no,
                    'real_phone_no' => empty($real_phone_no) ? $model->real_phone_no : $real_phone_no,
                    'gender' => empty($gender) ? $model->gender : $gender,
                    'country_id' => empty($country_id) ? $model->country_id : $country_id,
                    'city_id' => empty($city_id) ? $model->city_id : $city_id,
                    'ethnicity_id' => empty($ethnicity_id) ? $model->ethnicity_id : $ethnicity_id,
                    'build_id' => empty($build_id) ? $model->build_id : $build_id,
                    'about' => empty($about) ? $model->about : $about
                );

                $update_model_details = Models::where('m_model_id', $model->user_id)->update($model_details);

                DB::commit();

                toastr()->success("Profile updated successfully");
                return back();
            } catch (\Throwable $e) {
                DB::rollBack();
                \Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());

                toastr()->error("An error occurred. Try again");
                return back();
            }
        } else {

            toastr()->error("Invalid request");
            return back();
        }
    }

    /** Get model subs */
    public function get_model_subs($model_no){
        $auth_id = Auth::id();
        $data['model'] = ModelsApi::GetModel($model_no)->first();

        $data['session_available'] = ModelsApi::CheckSession($auth_id);
        if($data['session_available'] == "Y"){
            $data['name'] = User::where('id', $auth_id)->first()->name;
            $data['model_no'] = $model_no;
        }
        $data['model_subs'] = ModelsApi::GetModelSubs($model_no)->first();
        //dd($data['model_subs']);

        return view('website.auth.my-subscriptions')->with($data);
    }

    /** Get model services */
    public function get_model_services($model_no){
        $auth_id = Auth::id();
        $data['model'] = ModelsApi::GetModel($model_no)->first();

        $data['session_available'] = ModelsApi::CheckSession($auth_id);
        if($data['session_available'] == "Y"){
            $data['name'] = User::where('id', $auth_id)->first()->name;
            $data['model_no'] = $data['model']->model_no;
        }

        $data['model_services'] = ModelsApi::GetModelServicesApi($model_no);
        $data['services'] = Selector::GetServices();
        //$data['availabilities'] = Selector::GetAvailabilities();

        return view('website.auth.my-services')->with($data);
    }

    /** Model add new service */
    public function add_model_services(Request $request){
        $model_id = Auth::id();
        //$model_id = $request->model_id;
        $service_id = $request->service_id;
        /** add model services in m_services table */
        $count = count($service_id);

        /** Remove exisiting service first */
        $delete_services = DB::table('model_services')->where('ms_model_id', $model_id)->delete();

        for ($i = 0; $i < $count; $i++) {
            $data = array(
                'ms_model_id' => $model_id,
                'ms_service_id' => $service_id[$i]
            );

            $insertServices[] = $data;
        }

        ModelServices::insert($insertServices);
        toastr()->success("Service added successfully");
        return back();
    }

    /** Get model pics */
    public function get_model_pics($model_no){
        $auth_id = Auth::id();
        $data['model'] = ModelsApi::GetModel($model_no)->first();

        $data['session_available'] = ModelsApi::CheckSession($auth_id);
        if($data['session_available'] == "Y"){
            $data['name'] = User::where('id', $auth_id)->first()->name;
            $data['model_no'] = $data['model']->model_no;
        }

        $data['model_pics'] = ModelsApi::GetModelPictures($auth_id);

        $extra_pics_count = count($data['model_pics']);

        if($extra_pics_count < 4){
            $data['pic_upload'] = "Y";
        }else{
            $data['pic_upload'] = "N";
        }

        //dd($data['extra_pics_count']);
       //dd($data['model_pics']);

        return view('website.auth.my-pictures')->with($data);

}

/** Save model pic */
    public function model_add_pictures(Request  $request){
        $model_id = Auth::id();
        //$model_id = $request->model_id;
        /** Process the image */
        $file = $request->file('picture');
        $file_name = Models::GeneratePassword(30).$file->getClientOriginalName();
        $file->move('uploads/model_pictures', $file_name);
        $picture_url = 'uploads/model_pictures/' . $file_name;

        $pic_data = array(
            'mp_model_id' => $model_id,
            'model_pic_url' => $picture_url
        );

        $save_pic = DB::table('model_pictures')->insert($pic_data);
        toastr()->success("New picture uploaded successfully");
        return back();
}

/** Load change password form */
    public function show_change_password_form($model_no){
        $auth_id = Auth::id();
        $data['model'] = ModelsApi::GetModel($model_no)->first();

        $data['session_available'] = ModelsApi::CheckSession($auth_id);
        if($data['session_available'] == "Y"){
            $data['name'] = User::where('id', $auth_id)->first()->name;
            $data['model_no'] = $data['model']->model_no;
        }

        return view('website.auth.change-password')->with($data);
    }

    /** Model change password */

    public function change_password(Request $request)
    {
        $model_id = Auth::id();
        if (!empty($model_id) && is_numeric($model_id)) {
            $auth_id = Auth::id();

            $data['session_available'] = ModelsApi::CheckSession($auth_id);
            if($data['session_available'] == "Y"){
                $data['name'] = User::where('id', $auth_id)->first()->name;
            }

            $current_pass = $request->current_pass;
            $new_pass = $request->new_pass;
            $confirm_pass = $request->confirm_pass;
            $user = User::find($model_id);

            try {
                if (Hash::check($current_pass, $user->password)) {

                    if ($new_pass == $confirm_pass) {
                    $user_pass = array(
                        'password' => Hash::make($new_pass)
                    );

                    $update_password = User::where('id', $model_id)->update($user_pass);

                    toastr()->success("Password changed successfully");
                    return back();
                     } else {
                         toastr()->error('Confirm password does not match');
                         return back();
                    }
                } else {
                    toastr()->error('Current password is incorrect');
                    return back();
                }
            } catch (\Exception $e) {
                \Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());
            }
        } else {
            toastr()->error('Invalid request');
            return back();
        }
    }

    public function sign_out(Request $request)
    {
        Session::flush();
        Auth::logout();

        return redirect('/auth/login');
    }

}
