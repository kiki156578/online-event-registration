<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect,Response;
use App\Models\events;
use App\Models\eventStatus;
use App\Models\User;
use Carbon\Carbon;

class EventController extends Controller
{
    //
    public function index(){
        // $data['events']=events::orderby('id','asc')->paginate(8);
        // return view('pages/eventList',$data);
        $events=events::all();
        return view('pages/eventList',compact('events'));
    }
    public function view(Request $request){
        $events=events::find($request->id);
        $countOfRow = eventStatus::where('eventId',$events->eventId)->count();
        $ppl = eventStatus::where('eventId',$events->eventId)->pluck('uid');
        return view('pages/eventView',compact('events','countOfRow','ppl'));
       
    }
    public function join(Request $request){
        //  dd($request->session()->all());
        $events=events::find($request->id);
        $user = $request->session()->all();
        $userid = User::find($user['loginId']);

        $existingJoin = eventStatus::where('eventId', $events->eventId)
            ->where('uid', $userid->uid)
            ->first();

    if ($existingJoin) {
        // User has already joined the event, return an error
        return back()->with('joined', 'You have already joined this event.');
    }

        $newJoin = new eventStatus;
        $newJoin->eventId=$events->eventId;
        $newJoin->uid=$userid->uid;
       $res =  $newJoin->save();
       if($res){
        return redirect('eventList')->with('success','success');
    }else{
        return back()->with('fail','failed to join');
    }
        
        
    }
    public function create(){
        return view("pages/eventCreate");
    }
    public function createHandler(Request $request){
        $request->validate([
            'eventName'=>'required|min:3|max:40',
            'eventTime'=>'required|date_format:H:i:s',
            'eventDate'=>'required',
            'eventDescription'=>'required',
            'eventVenue'=>'required'
        ]);
        $user = User::find($request->session()->all()['loginId']);
        $eventId = sprintf("%06d", mt_rand(1, 999999));
        $event = new events();
        $event->eventName = $request->eventName;
        $event->eventDescription = $request->eventDescription;
        $event->eventTime = $request->eventTime;
        $event->eventVenue = $request->eventVenue;
        $event->eventId = $eventId;
        $event->eventDate = $request->eventDate;
        $event->uid=$user->uid;
        $res = $event->save();
        if($res){
            return redirect("/dashboard")->with('success','created');
        }else{
            return back()->with('fail','failed to create');
        }
    }
}
