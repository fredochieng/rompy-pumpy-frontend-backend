<?php

namespace App\Http\Controllers;

use App\Api\Models\ModelsApi;
use App\Models\Selector;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    public function homepage(){
        $data['vip_models'] = ModelsApi::GetModels()->where('sub_pkg_id', 1);
        $data['prem_models'] = ModelsApi::GetModels()->where('sub_pkg_id', 3);
        $data['reg_models'] = ModelsApi::GetModels()->wherein('sub_pkg_id', [1, 2]);

        //dd($data['vip_models']);
        $data['cities'] = Selector::GetCities();
        //dd($data['cities']);
        $auth_id = Auth::id();

        $data['model'] = DB::table('models')->select(
            DB::raw('models.m_model_id'),
            DB::raw('models.model_no')
        )   ->where('m_model_id', $auth_id)
            ->first();

        if($auth_id > 0){

            $data['name'] = User::where('id', $auth_id)->first()->name;
            $data['model_no'] = $data['model']->model_no;
            $data['session_available'] = "Y";

        }else{
            $data['session_available'] = "N";
        }

        return view('website.homepage')->with($data);
    }

    /** Filtered city models */
    public function models_city_search(Request $request){
        $city_id = $request->city_id;
        $city = Selector::GetCities()->where('c_city_id', $city_id)->first();
        $data['city_name'] = $city->city_name;
       // dd($city_id);
        $data['vip_models'] = ModelsApi::GetModels()->where('sub_pkg_id', 1)->where('c_city_id', $city_id);
        $data['prem_models'] = ModelsApi::GetModels()->where('sub_pkg_id', 3)->where('c_city_id', $city_id);
        $data['reg_models'] = ModelsApi::GetModels()->wherein('sub_pkg_id', [1, 2])->where('c_city_id', $city_id);
        $data['cities'] = Selector::GetCities();
        //dd($data['cities']);
        $auth_id = Auth::id();

        $data['model'] = DB::table('models')->select(
            DB::raw('models.m_model_id'),
            DB::raw('models.model_no')
        )   ->where('m_model_id', $auth_id)
            ->first();

        if($auth_id > 0){

            $data['name'] = User::where('id', $auth_id)->first()->name;
            $data['model_no'] = $data['model']->model_no;
            $data['session_available'] = "Y";

        }else{
            $data['session_available'] = "N";
        }

        return view('website.models-filter')->with($data);
    }

    /** Get model profile for the website */
    public function profile(Request $request, $model_no)
    {
        $auth_id = Auth::id();

        $data['session_available'] = ModelsApi::CheckSession($auth_id);
        if($data['session_available'] == "Y"){
            $data['name'] = User::where('id', $auth_id)->first()->name;

            $data['model_no'] = $model_no;
        }
        $model_no = $request->model_no;

        if (!empty($model_no) && (is_numeric($model_no))) {
            $data['model'] = ModelsApi::GetModel()->where('model_no', $model_no)->first();

            /** Get model services and availability */
            $data['model_services'] = ModelsApi::GetModelServicesApi($model_no);
            $data['model_availabilities'] = ModelsApi::GetModelAvailabilityApi($model_no);

            /** Get model subscription details @var  $model_subs */
            $data['model_subs'] = ModelsApi::GetModelSubsWebsite()->where('model_no', $model_no)->first();

            /** Get model other pictures */
            $data['model_other_pics'] = ModelsApi::GetModelPictures($data['model']->m_model_id);

            return view('website.profile')->with($data);
        } else {
            $message = array("message" => "Invalid request", "status" => 400);
            return response()->json($message, 400);
        }
    }

    /** Model login form */
    public function login(){
        $auth_id = Auth::id();

        $data['session_available'] = ModelsApi::CheckSession($auth_id);
        if($data['session_available'] == "Y"){
            $data['name'] = User::where('id', $auth_id)->first()->name;
            $model_no = DB::table('models')->select(DB::raw('models.m_model_id'), DB::raw('models.model_no'))
                ->where('m_model_id', $auth_id)
                ->first()->model_no;

            return redirect('/account/'.$model_no);
        }else{

            //dd($session_available);
            return view('website.auth.login')->with($data);
        }

    }

    /** Process model login */
    public function process_login(Request $request)
    {
        $remember = ($request->has('remember')) ? true : false;

        $userdata = array(
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        );

        // attempt to do the login
        if (Auth::attempt($userdata, $remember)) {
            $user = auth()->user();
            /** Get the user role for redirection */
            $user = User::where('email', '=', $request->input('email'))->first();
            $user_id = $user->id;

            $user_role = DB::table('model_has_roles')->where('model_id', '=', $user_id)->first();
            $role_id = $user_role->role_id;

            /** Check role ids - if it is one (Admin) redirect to admin page otherwise redirect to model dashboard */
            if($role_id == 1){
                return redirect('/home');
            }elseif($role_id == 2){
                /** check if account is deactivated */
                $account_status = User::where('id', $user_id)->first()->account_status;

                if($account_status == 1){

                    $model_no = DB::table('models')->select(DB::raw('models.m_model_id'), DB::raw('models.model_no'))
                        ->where('m_model_id', $user_id)
                        ->first()->model_no;
                    return redirect('/account/'.$model_no);
                }else{
                  
                    toastr()->error('Account has been deactivated');
                    return back();
                }

            }

            //toastr()->success('Login successful');

        } else {

            toastr()->error('Incorrect email or password');
            return back();
        }
    }
}
