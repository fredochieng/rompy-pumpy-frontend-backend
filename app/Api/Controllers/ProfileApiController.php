<?php

namespace App\Api\Controllers;

use App\Api\Models\ModelsApi;
use App\Http\Controllers\Controller;
use App\Models\Api\Models\ModelAPI;
use App\Models\User;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Modules\Models\Entities\ModelAvailability;
use Modules\Models\Entities\Models;
use Modules\Models\Entities\ModelServices;

class ProfileApiController extends Controller
{
    /** Fetch model profile */
    public function get_model_profile(Request $request, $model_no)
    {
        $model_no = $request->model_no;

        if (!empty($model_no) && (is_numeric($model_no))) {
            $model = ModelsApi::GetModel()->where('model_no', $model_no)->first();
           // if (count($model) > 0) {
                //return response()->json(
                    //'model' => $model, 'status' => 201
                //);

                // $model = array("model" => $model, "status" => 201);
                 return response()->json($model, 201);
            //} else {
               // $message = array("message" => "Invalid request", "status" => 400);
               // return response()->json($message, 400);
           // }
        } else {
            $message = array("message" => "Invalid request", "status" => 400);
            return response()->json($message, 400);
        }
    }

    /** Model update profile */
    public function model_update_profile(Request $request, $model_no)
    {
        dd($model_no);

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
                $message = array("message" => "Profile updated successfully", "status" => 201);
                return response()->json($message, 201);
            } catch (\Throwable $e) {
                DB::rollBack();
                \Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());

                $message = array("message" => "An error occured. Try again", "status" => 400);
                return response()->json($message, 400);
            }
        } else {
            $message = array("message" => "Invalid request", "status" => 400);
            return response()->json($message, 400);
        }
    }

    /** Model add images */
    public function model_add_pictures(Request $request){

        $model_id = $request->model_id;
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

         $message = array("message" => "Picture uploaded successfully", "status" => 201);
        return response()->json($message, 201);
    }

    /** Get model pictures */
    public function model_get_pictures(Request $request, $model_id){

        $model_id = $request->model_id;
        $model_pics = ModelsApi::GetModelPictures($model_id);

        if(count($model_pics) > 0){
            return response()->json($model_pics, 201);
        }else{
            $message = array("message" => "No pictures found", "status" => 400);
            return response()->json($message, 400);
        }


    }

    /** Add model services */
    public function add_model_services(Request $request)
    {
        $model_id = $request->model_id;
        $service_id = $request->service_id;
        /** add model services in m_services table */
        $count = count($service_id);

        /** Remove exisiting service first */
       // $delete_services = ModelServices::destroy($model_id);

        for ($i = 0; $i < $count; $i++) {
            $data = array(
                'ms_model_id' => $model_id,
                'ms_service_id' => $service_id[$i]
            );

            $insertServices[] = $data;
        }

        ModelServices::insert($insertServices);

        $message = array("message" => "Services added successfully", "status" => 201);
        return response()->json($message, 201);
    }

    /** Add model availabiltiy */
    public function add_model_availability(Request $request)
    {
        $model_id = $request->model_id;
        $availability_id = $request->service_id;
        /** add model availabilities in m_availability table */
        $count = count($availability_id);

          /** Remove exisiting service first */
         // $delete_services = ModelAvailability::destroy($model_id);

        for ($i = 0; $i < $count; $i++) {
            $data1 = array(
                'ma_model_id' => $model_id,
                'ma_availability_id' => $availability_id[$i]
            );

            $insertAvailability[] = $data1;
        }

        ModelAvailability::insert($insertAvailability);

        $message = array("message" => "Availability added successfully", "status" => 201);
        return response()->json($message, 201);
    }

    /** Model change password */

    public function change_password(Request $request)
    {
        $model_id = $request->model_id;
        if (!empty($model_id) && is_numeric($model_id)) {
            $current_pass = $request->current_password;
            $new_pass = $request->new_password;
            // $confirm_pass = $request->confirm_password;
            $user = User::find($model_id);

            try {
                if (Hash::check($current_pass, $user->password)) {

                    // if ($new_pass == $confirm_pass) {
                        $user_pass = array(
                            'password' => Hash::make($new_pass)
                        );

                        $update_password = User::where('id', $model_id)->update($user_pass);

                        $message = array("message" => "Password changed successfully", "status" => 201);
                        return response()->json($message, 201);
                    // } else {

                    //     $message = array("message" => "Confirm password does not match", "status" => 400);
                    //     return response()->json($message, 400);
                   //}
                } else {
                    $message = array("message" => "Current password is incorrect", "status" => 400);
                    return response()->json($message, 400);
                }
            } catch (\Exception $e) {
                \Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());
            }
        } else {
            $message = array("message" => "Invalid request", "status" => 400);
            return response()->json($message, 400);
        }
    }

    /** Get model subscriptions */
    public function get_model_subscriptions(Request $request, $model_no)
    {
        $model_no = $request->model_no;

        if (!empty($model_no) && is_numeric($model_no)) {
            $model_subs = ModelsApi::GetModelSubs()->where('model_no', $model_no);

            return response()->json([
                'model' => $model_subs, 'status' => 201,
                'success' => 'Model subscription packages retrieved',
            ]);
        } else {
            $message = array("message" => "Invalid request", "status" => 400);
            return response()->json($message, 400);
        }
    }

    /** Get model services */
    public function get_model_services(Request $request, $model_no)
    {
        $model_no = $request->model_no;
        if (!empty($model_no) && is_numeric($model_no)) {
            $model_services = ModelsApi::GetModelServicesApi($model_no);

            return response()->json([
                'model' => $model_services, 'status' => 201,
                'success' => 'Model services retrieved',
            ]);
        }else{
            $message = array("message" => "Invalid request", "status" => 400);
            return response()->json($message, 400);
        }
    }

      /** Get model availabiltiies API */
      public function get_model_availabilities(Request $request, $model_no)
      {
          $model_no = $request->model_no;
          if (!empty($model_no) && is_numeric($model_no)) {
              $model_ava = ModelsApi::GetModelAvailabilityApi($model_no);

              return response()->json([
                  'model' => $model_ava, 'status' => 201,
                  'success' => 'Model availabilties retrieved',
              ]);
          }else{
              $message = array("message" => "Invalid request", "status" => 400);
              return response()->json($message, 400);
          }
      }

      /** Get services that a model is eligble to add */
    public function get_model_available_services(Request $request, $model_no)
    {
        $model_no = $request->model_no;
        if (!empty($model_no) && is_numeric($model_no)) {
            $model_services = ModelsApi::GetModelServicesApi($model_no);

            return response()->json([
                'model' => $model_services, 'status' => 201,
                'success' => 'Model services retrieved',
            ]);
        }else{
            $message = array("message" => "Invalid request", "status" => 400);
            return response()->json($message, 400);
        }
    }
}
