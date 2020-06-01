<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Remark;
use App\Updates;
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
        $activities = DB::table('users')
            ->join('activities','activities.user_id','=','users.id')
            ->get();

        $remarks = DB::table('remarks')
            ->join('activities','activities.id','=','remarks.activity_id')
            ->join('users','users.id','=','remarks.user_id')
            ->get();

        $last_update = DB::table('updates')
            ->join('activities','activities.id','=','updates.activity_id')
            ->join('users','users.id','=','updates.user_id')
//            ->get();
            ->select('activities.id','users.first_name','users.last_name','users.position','users.bio','users.avatar','updates.created_at')
            ->get();

//        return $last_update;

        return view('pages/activities',compact('activities','remarks','last_update'));
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

        $update = new Updates;
        $update->user_id = Auth::user()->id;
        $update->activity_id = $request->post('activity_id');
        $update->save();
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

        $update = new Updates;
        $update->user_id = Auth::user()->id;
        $update->activity_id = $request->post('id');
        $update->save();

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

    public function give_remarks(Request $request, $id){
        $remarks = new Remark;
        $remarks->user_id = Auth::user()->id;
        $remarks->activity_id = $id;
        $remarks->remarks = $request->get('remarks');
        $remarks->save();
        return redirect()->back()->with('message','Your remarks have been saved');
    }
}
