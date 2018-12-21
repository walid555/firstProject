<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\PushNotification;
use App\FileData;
use DB;
use Session;
session_start();

class guzzleController extends Controller
{
    public function getData($iemi = null , $device_token = null)
    {
    	$pushNotification=new PushNotification();
    	$dataNotification=PushNotification::all();
    	foreach ($dataNotification as $not) {
    		$notIemi=$not->iemi;
        $notToken=$not->deviceToken;
        if($iemi == $notIemi)
         {
           PushNotification::where('iemi',$iemi)->update(['deviceToken' =>$device_token]);
           Session::put('message','Device Token updated successfully');
              return Redirect::to('adminHome');
         }
       }
        
          $pushNotification->iemi=$iemi;
          $pushNotification->deviceToken=$device_token;
          $pushNotification->save();
          Session::put('message','Device Token inserted successfully');
          return Redirect::to('adminHome');
    	 
    }
    public function sendNotification($fileId)
    {
      
            $allToken=PushNotification::all()->pluck('deviceToken');
          
        $fcmUrl = 'https://android.googleapis.com/gcm/send';
            $notificData=FileData::where('fileId',$fileId)->first();
            $notification = [
                              'body' => $notificData,
                              'sound' => true,
                            ];
    
           $extraNotificationData = ["message" => $notification,"moredata" =>'dd'];
           $tokenId='dDySmWDbrrQ:APA91bH3I-R5zx8bcAFngrZ1PhHjH4vpp5PIetIJSdQ7R7GjI3nvU-YduJ6e_bqluZpATw8neey0fXPnC_N-RqWZ7uZ0N70VT6i0ueVwh9mk-hDhCglDQ8Zizdmf0Oxt8fXzF8n7jqGs';
            $fcmNotification = [
            'registration_ids' => $allToken ,
              'notification' => $notification,
             'data' => $extraNotificationData
                ];

           $headers = [
         'Authorization:key=AAAABsx-6vk:APA91bG_5FuD4kLp9Ow7R62ubNW5fUsr7sF1LgiTymh7H410PRS5WPt2U5HWEDtPpkmidDtvzk8tmVF33YObTWpg9EDAP_elgusGFmFfqEqnHo6Bt3ZKyAK2hpBz8sy2ys8C53PDiVbg',
        'Content-Type: application/json'
            ];
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL,$fcmUrl);
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
          $result = curl_exec($ch);
          curl_close($ch);
          dd($result);
        }
        
    }

