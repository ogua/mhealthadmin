<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\User;
use App\Models\Support;
use App\Models\Activity;
use App\Models\Symptoms;
use App\Models\Medication;
use App\Models\Measurement;
use App\Models\Appointments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Apicontroller extends Controller
{
    public function regsiteruser(Request $request ) {
        
        $fullname = $request->post('fullname');
        $password = $request->post('password');
        $email = $request->post('email');
        $phone = $request->post('phone');
        
        if ($request->has('doc')) {
            
            // $ext = pathinfo($_FILES['doc']['name'],PATHINFO_EXTENSION);
            // $destination = 'storage/files/'.time().'.'.$ext;
            
            // if (move_uploaded_file($_FILES['doc']['tmp_name'], $destination)) {
                
                //     $imagepath = 'files/'.time().'.'.$ext;
                // }
                
                $imagepath = $request->doc->store('files','public');
                
            }else{
                $imagepath = "";
            }
            
            $data = [
                'name' => $fullname,
                'password' => Hash::make($password),
                'email' => $email,
                'phone' => $phone,
                'avatar' => $imagepath
            ];
            
            $user = new User($data);
            $user->save();
            
            $response = [
                'error' => false,
                'message' => 'Account created successfully',
                'user' => $user,
            ];
            
            return response($response, 200);
            
        }
        
        public function updateuser(Request $request ) {
            
            $id = $request->post('userid');
            $fullname = $request->post('fullname');
            $password = $request->post('password');
            $email = $request->post('email');
            $phone = $request->post('phone');
            
            $data = [
                'name' => $fullname,
                'email' => $email,
                'phone' => $phone,
            ];
            
            User::where('id',$id)->update($data);
            
            $user = User::where('id',$id)->first();
            
            if ($request->has('password')) {
                $user->password = Hash::make($password);
            }
            
            if ($request->has('doc')) {
                $user->password =  $request->doc->store('files','public');
            }
            
            $user->save();
            
            $response = [
                'error' => false,
                'message' => 'Account updated successfully',
                'user' => $user,
            ];
            
            return response($response, 200);
            
        }
        
        
        public function addsupportappointment(Request $request) {
            
            $date = date("Y-m-d", strtotime($request->date));
            
            $data = [
                'support_id' => $request->supportid,
                'app_date' => $date,
                'app_time' => $request->time,
                'note' => $request->note,
                'remainder' => 0,
                
            ];
            
            $new = new Appointments($data);
            $new->save();
            
            $response = [
                'error' => false,
                'message' => 'Appointment added successfully!',
            ];
            
            return response($response, 200);
            
        }
        
        
        public function loginuser(Request $request) {
            
            $user = User::firstWhere('email', $request->email);
            
            if (!$user || !Hash::check($request->password, $user->password)) {
                
                return response([
                    'error' => true,
                    'message' => 'These credentials do not match our records.'
                ]);
            }
            
            $response = [
                'error' => false,
                'user' => $user,
            ];
            
            return response($response, 200);
            
        }
        
        public function users() {
            
            $response = [
                'error' => false,
            ];
            
            return response($response, 200);
        }
        
        public function allrecords($userid) {
            
            $response = [
                'error' => false,
                'userid' => $userid
            ];
            
            return response($response, 200);
        }
        
        public function allsupports($userid) {
            
            $data = Support::where('user_id',$userid)->get();
            
            $response = [
                'error' => false,
                'data' => $data
            ];
            
            return response($response, 200);
        }
        
        
        public function addsupports(Request $request) {
            
            $data = [
                'name' => $request->post('fullname'),
                'speciality' => $request->post('speciality'),
                'street' => $request->post('street'),
                'zipcode' => $request->post('zipcode'),
                'city' => $request->post('city'),
                'phone' => $request->post('phone'),
                'email' => $request->post('email'),
                'website' => $request->post('website'),
                'utype' => $request->post('utype'),
                'user_id' => $request->post('userid'),
            ];
            
            $new = new Support($data);
            $new->save();
            
            $response = [
                'error' => false,
                'message' => "Saved successfully!",
            ];
            
            return response($response, 200);
            
        }
        
        
        public function updatesupports(Request $request) {
            
            $data = [
                'name' => $request->post('fullname'),
                'speciality' => $request->post('speciality'),
                'street' => $request->post('street'),
                'zipcode' => $request->post('zipcode'),
                'city' => $request->post('city'),
                'phone' => $request->post('phone'),
                'email' => $request->post('email'),
                'website' => $request->post('website'),
                'utype' => $request->post('utype'),
                'user_id' => $request->post('userid'),
            ];
            
            Support::where('id',$request->id)->update($data);
            
            $response = [
                'error' => false,
                'message' => "Updated successfully!",
            ];
            
            return response($response, 200);
            
        }
        
        
        public function supportinfo($id) {
            $data = Support::where('id',$id)->first();
            
            if (!$data) {
                
                $response = [
                    'error' => true,
                    'message' => "Failed",
                    "data" => null
                ];
            }
            
            $response = [
                'error' => false,
                'data' => $data,
            ];
            
            return response($response, 200);
        }
        
        public function supportappinfo($id) {
            
            $data = Appointments::where('support_id',$id)->latest()->get();
            
            $response = [
                'error' => false,
                'data' => $data,
            ];
            
            return response($response, 200);
        }
        
        
        public function supportdelete($id) {
            $data = Support::where('id',$id)->first();
            Appointments::where('support_id',$data->id)->delete();
            $data->delete();
            
            $response = [
                'error' => false,
                'message' => "Delected Successfully!",
            ];
            
            return response($response, 200);
        }
        
        
        public function addmedication(Request $request) {
            
            $date = date("Y-m-d", strtotime($request->date));
            
            $data = [
                'name' => $request->post('name'),
                'unit' => $request->post('unit'),
                'dose' => $request->post('dose'),
                'mtime' => $request->post('time'),
                'mdate' => $date,
                'user_id' => $request->post('userid')
            ];
            
            $new = new Medication($data);
            $new->save();
            
            $response = [
                'error' => false,
                'message' => "Added successfully!",
            ];
            
            return response($response, 200);
            
        }
        
        public function sendhealthcarereport(Request $request) {
            
            $userid = $request->userid;
            $healthid = $request->healthid;
            
            $personnel = Support::where('id',$healthid)->first();
            $phone = $personnel->phone;
            $name = $personnel->name;

            $link = route('healthcarereport',['userid' =>  $userid, 'healthid' => $healthid]);

            $user = User::where('id',$userid)->first();

            $msg = "Dear {$name}, i hope this message finds you well, kindly click on the link below to acccess {$user->name} health records. {$link}";

             $this->sendsms($phone,$msg,"");
            
            $response = [
                'error' => false,
                'message' => "Report Sent successfully!",
            ];
            
            return response($response, 200);
            
        }


         public function healthcarereport($userid,$healthid) {
            
            $personnel = Support::where('id',$healthid)->first();
            $user = User::where('id',$userid)->first();
            
            return view('health-report',compact('user'));
            
        }
        
        public function addmeasurement(Request $request) {
            
            $date = date("Y-m-d", strtotime($request->date));
            
            if ($request->unit == "Blood Pressure") {
                $value = "sys{$request->sysblood},dia{$request->diablood},pulse{$request->pulse}";
            }elseif ($request->unit == "Blood Sugar") {
                $value = "{$request->mvalue}(mg/dl)";
            }else{
                $value = "{$request->mvalue}(kg)";
            }
            
            $data = [
                'mtype' => $request->post('unit'),
                'mvalue' => $value,
                'mtime' => $request->post('time'),
                'mdate' => $date,
                'status' => $request->status,
                'user_id' => $request->post('userid')
            ];
            
            $new = new Measurement($data);
            $new->save();
            
            $response = [
                'error' => false,
                'message' => "Added successfully!",
            ];
            
            return response($response, 200);
            
        }
        
        
        public function addactivity(Request $request) {
            
            $date = date("Y-m-d", strtotime($request->date));
            
            
            $data = [
                'mvalue' => $request->post('mvalue'),
                'mdate' => $date,
                'mtime' => $request->post('time'),
                'atype' => $request->unit,
                'user_id' => $request->post('userid')
            ];
            
            $new = new Activity($data);
            $new->save();
            
            $response = [
                'error' => false,
                'message' => "Added successfully!",
            ];
            
            return response($response, 200);
            
        }
        
        
        public function addsymptoms(Request $request) {
            
            $date = date("Y-m-d", strtotime($request->date));
            
            $data = [
                'mode' => $request->post('unit'),
                'symptoms' => $request->post('symptoms'),
                'mdate' => $date,
                'mtime' => $request->post('time'),
                'user_id' => $request->post('userid')
            ];
            
            $new = new Symptoms($data);
            $new->save();
            
            $response = [
                'error' => false,
                'message' => "Added successfully!",
            ];
            
            return response($response, 200);
            
        }
        
        
        public function allmedication($userid) {
            
            $data = Medication::where('user_id',$userid)->latest()->get();
            
            $response = [
                'error' => false,
                'data' => $data
            ];
            
            return response($response, 200);
        }
        
        public function allmeasurement($userid) {
            
            $data = Measurement::where('user_id',$userid)->latest()->get();
            
            $response = [
                'error' => false,
                'data' => $data
            ];
            
            return response($response, 200);
        }
        
        public function alllab($userid) {
            
            $data = Lab::where('user_id',$userid)->latest()->get();
            
            $response = [
                'error' => false,
                'data' => $data
            ];
            
            return response($response, 200);
        }
        
        public function allactivity($userid) {
            
            $data = Activity::where('user_id',$userid)->latest()->get();
            
            $response = [
                'error' => false,
                'data' => $data
            ];
            
            return response($response, 200);
        }
        
        public function allsymptoms($userid) {
            
            $data = Symptoms::where('user_id',$userid)->latest()->get();
            
            $response = [
                'error' => false,
                'data' => $data
            ];
            
            return response($response, 200);
        }
        
        
        public function delmedication($id,$type) {
            
            if ($type == "medication") {
                Medication::where('id',$id)->delete();
            }
            
            if ($type == "measurement") {
                Measurement::where('id',$id)->delete();
            }
            
            if ($type == "activity") {
                Activity::where('id',$id)->delete();
            }
            
            $response = [
                'error' => false,
                'message' => "Delected Successfully!",
            ];
            
            return response($response, 200);
        }
        
        
        public function sendsms($phone,$msg,$sheduletime) {
            
            $senderid = "TASKNOTIFY";
            $apikeyv2 = "ajrBIS3SN5uaBntX2mjANLFMo";
            
            if (!empty($sheduletime)) {
                
                $endPoint = 'https://api.mnotify.com/api/sms/quick';
                $url = $endPoint.'?key='.$apikeyv2;
                $mdata = [
                    'recipient' => [$phone],
                    'sender' => $senderid,
                    'message' => $msg,
                    'is_schedule' => 'true',
                    'schedule_date' => $sheduletime
                ];
                
                $ch = curl_init();
                $headers = array();
                $headers[] = "Content-Type: application/json";
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($mdata));
                $result = curl_exec($ch);
                $data = json_decode($result,true);
                curl_close($ch);

                logger($data);
                
            }else{
                
                $endPoint = 'https://api.mnotify.com/api/sms/quick';
                $url = $endPoint.'?key='.$apikeyv2;
                $mdata = [
                    'recipient' => [$phone],
                    'sender' => $senderid,
                    'message' => $msg,
                ];
                
                $ch = curl_init();
                $headers = array();
                $headers[] = "Content-Type: application/json";
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($mdata));
                $result = curl_exec($ch);
                $data = json_decode($result,true);
                curl_close($ch);

                logger($data);
            }
            
            
        }



        public function reportdownload($from,$to,$reporttype) 
        {
            if ($reporttype == "Symptoms") {
                $data = Symptoms::whereBetween('created_at',[$from,$to])->latest()->get();
            }
            
            if ($reporttype == "Measurement") {
                $data = Measurement::whereBetween('created_at',[$from,$to])->latest()->get();
            }
            
            if ($reporttype == "Medication") {
                $data = Medication::whereBetween('created_at',[$from,$to])->latest()->get();
            }
            
            if ($reporttype == "Activities") {
                $data = Activity::whereBetween('created_at',[$from,$to])->latest()->get();
            }

            if ($reporttype == "Lab") {
                $data = Lab::whereBetween('created_at',[$from,$to])->latest()->get();
            }

            if ($reporttype == "Appointment") {
                $data = Appointments::whereBetween('created_at',[$from,$to])->latest()->get();
            }
            
            if ($reporttype == "Support") {
                $data = Support::whereBetween('created_at',[$from,$to])->latest()->get();
            }


            return view('report',compact('data','from','to','reporttype'));
            
            
        }
        
        
        
    }
    