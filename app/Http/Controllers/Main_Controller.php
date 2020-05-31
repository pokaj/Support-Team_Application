<?php

namespace App\Http\Controllers;

use App\Activity;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Main_Controller extends Controller
{
    public function index(){
        $pending = count(DB::table('activities')
            ->where('activity_status', '=', 'pending')
            ->get());


        $complete = count(DB::table('activities')
            ->where('activity_status', '=', 'complete')
            ->get());

        return view('pages/dashboard',compact('pending','complete'));
    }

    public function profile(){
        return view('pages/profile');
    }

    public function activities(){
        $activities = DB::table('activities')
            ->get();

        return view('pages/activities',compact('activities'));
    }
    public function update_info(Request $request){

            $update = DB::table('Users')
            ->where('id','=',Auth::user()->id)
            ->update([
                'first_name' => $request->post('fname'),
                'last_name' => $request->post('lname'),
                'position' => $request->post('position'),
                'number' => $request->post('number'),
                'bio' => $request->post('bio'),
                'username' => $request->post('username'),
            ]);
            if($update) {
                return ['success' => true, 'data' => $update];
            }else{
                return ['success' => false, 'data' => $update];
            }
    }

    public function add_activity(Request $request){

            $activity = new Activity;
            $activity->activity_title = $request->post('title');
            $activity->activity_description = $request->post('description');
            $activity->activity_status = 'pending';
            $activity->user_id = Auth::user()->id;
            $activity->save();

            return ['success' => true, 'data' => 1];
    }

    public function complete(Request $request){
        $status = DB::table('activities')
            ->where('id','=',$request->post('activity_id'))
            ->update([
                'activity_status' => 'complete',
                ]);
        if($status) {
            return ['success' => true, 'data' => $status];
        }else{
            return ['success' => false, 'data' => $status];
        }
    }


    public function pending(Request $request){
        $status = DB::table('activities')
            ->where('id','=',$request->post('id'))
            ->update([
                'activity_status' => 'pending',
                ]);
        if($status) {
            return ['success' => true, 'data' => $status];
        }else{
            return ['success' => false, 'data' => $status];
        }
    }

    public function delete(Request $request){
        $activity_id = $request->post('id');
        $project = Activity::find($activity_id);
        $project->delete();

        return ['success' => true, 'data' => 1];
    }
}
