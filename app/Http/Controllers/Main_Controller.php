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
            ->select('activities.id','users.first_name','users.last_name','users.position','users.bio','users.avatar','updates.created_at')
            ->get();

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

    public function search_details(Request $request){
        $output = "";
        $activity_id = $request->get('activity_id');
        $details = DB::table('updates')
        ->join('activities','activities.id','=','updates.activity_id')
        ->join('users','users.id','=','updates.user_id')
        ->where('updates.activity_id','=',$activity_id)
        ->get();

        if($details){
            foreach($details as $detail){
                $output.=
                '<tr>'.
                '<td>'.$detail->first_name.' '.$detail->last_name.'</td>'.    
                '<td>'.$detail->activity_status.'</td>'.
                '<td>'.$detail->created_at.'</td>'.
                '</tr>';
            }
            return Response($output);

        }
    }

    public function query(Request $request){
        $output = "";
        $beginning_date = $request->get('beg_date');
        $ending_date = $request->get('end_date');

        $query = Activity::whereBetween('created_at', [$beginning_date, $ending_date])->get();
        if($query){
            foreach($query as $data){
                $output.=
                '<tr>'.
                '<td>'.User::find($data->user_id)->first_name .' '. User::find($data->user_id)->last_name .'</td>'.    
                '<td>'.$data->created_at.'</td>'.
                '<td>'.$data->activity_status.'</td>'.
                '</tr>';
            }
            return Response($output);

        }
    }

    public function change_avatar(Request $request){
        $this->validate($request,[
            'picture' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $image = $request->file( 'picture');
        $image_name = $image->getClientOriginalName();
        DB::table('users')
            ->where('id','=',Auth::user()->id)
            ->update([
                'avatar' => $image_name,
            ]);
        $image->move(public_path("img"),$image_name);
        return back()
            ->with('message','Image uploaded successfully');
    }
}
