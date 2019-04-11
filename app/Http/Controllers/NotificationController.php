<?php

namespace App\Http\Controllers;

use App\Location;
use App\Notification;
use App\Resident;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    function addNotification(){
        $locations=Location::all();
        return view('admin.notification.add_notification',compact('locations'));
    }

    function saveNotification(Request $request){
        $notification=new Notification();
        $notification->notification=$request->notification;
        $notification->location=$request->location;
        $notification->addedBy=auth()->user()->employee_id;
        if($notification->save()){
            $residents=Resident::where('location',$request->location)->get();
            foreach ($residents as $resident){
                $username = 'wmoswa';

                // Webservices token for above Webservice username
                $token = '0317f8b9c5247edb427102b3845dadaf';

                // BulkSMS Webservices URL
                $bulksms_ws = 'http://portal.bulksmsweb.com/index.php?app=ws';

                // destination numbers, comma seperated or use #groupcode for sending to group
                // $destinations = '#devteam,263071077072,26370229338';
                // $destinations = '26300123123123,26300456456456';  for multiple recipients
                $destinations = $resident->phonenumber;

                // SMS Message to send
                $message = $request->notification.' Regards City Council for '.$request->location;

                // send via BulkSMS HTTP API

                $ws_str = $bulksms_ws . '&u=' . $username . '&h=' . $token . '&op=pv';
                $ws_str .= '&to=' . urlencode($destinations) . '&msg='.urlencode($message);
                $ws_response = @file_get_contents($ws_str);

                //echo $ws_response;
            }
            return redirect()->route('view_notifications')->with('message','Notification successfully send');
        }
        else{
            return back()->with('error','Failed to send notification');
        }
    }

    function viewNotifications(){
        $notifications=Notification::all();
        return view('admin.notification.view_notifications',compact('notifications'));
    }
}
