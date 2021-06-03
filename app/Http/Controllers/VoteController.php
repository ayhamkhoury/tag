<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Round;
use App\Models\UserVote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        $votes=Vote::all();
        $pageTitle = 'Add New Vote';
        $page_description = 'New Vote';      
        return view('admin.vote.view_votes', compact('pageTitle', 'page_description','votes'));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $round=Round::where('status','=','2')->limit(1)->get();
        $pageTitle = 'Add New Vote';
        $page_description = 'New Vote';
        return view('admin.vote.add_vote', compact('pageTitle', 'page_description','round'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Vote $vote)
    {
        $fileNameToStore='';
        $rules = [
            'round_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
        ];
        $customMessages = [
            'name|required' => 'you forgot  name'
        ];
    
        $validate = Validator::make($request->all(), $rules, $customMessages);
        $messages = $validate->messages();
        if ($validate->fails()) {
            return redirect()->back()->withErrors($messages);
        }
        if ($request->has('round_id')) {
            $vote->name = $request->name;
        }
        if ($request->has('status')) {
            $vote->status = $request->status;
        }

        if ($request->has('details')) {
            $vote->details = $request->details;
          
        }
         
        if ($request->has('start_date')) {
            $vote->start_date = $request->start_date; 
        }
        if ($request->has('end_date')) {
            $vote->end_date = $request->end_date;
        }
         
        if (!$vote->isDirty()) {
            return redirect()->back()->withErrors(['Nothing inserted']);
        }
        $vote = Vote::create([
            'round_id' => $request['round_id'],
            'status' => $request['status'],
            'details' => $request['details'],
             'start_date' => $request['start_date'],
            'end_date' => $request['end_date'],
        ]);
        return redirect()->route('listvotes');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function show(Vote $vote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function edit(Vote $vote,Request $request)
    {
        $round=Round::where('status','=','2')->limit(1)->get();
        $vote = Vote::findOrFail($request->id);
        $pageTitle =  'Edit Vote : ' ; 
        $page_description = $vote->name;
        return view('admin.vote.edit_vote', compact('pageTitle', 'page_description','vote','round'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vote $vote)
    {
        $vote = Vote::findOrFail($request->id);
        $rules = [
            'round_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
        ];
        $customMessages = [
            'name|required' => 'you forgot  name'
        ];
    
        $validate = Validator::make($request->all(), $rules, $customMessages);
        $messages = $validate->messages();
        if ($validate->fails()) {
            return redirect()->back()->withErrors($messages);
        }
        if ($request->has('round_id')) {
            $vote->round_id = $request->round_id;
             
        }
       
        if ($request->has('status')) {
            $vote->status = $request->status; 
        }
        if ($request->has('details')) {
            $vote->details = $request->details;
          
        }
        
        if ($request->has('start_date')) {
            $vote->start_date = $request->start_date; 
        }
        if ($request->has('end_date')) {
            $vote->end_date = $request->end_date;
        }
        
        if (!$vote->isDirty()) {
            return redirect()->back()->withErrors(['Nothing Updated']);
        }
       

        $vote->save();
        return redirect()->route('listvotes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vote $vote,Request $request)
    {
        $race = Vote::findOrFail($request->id);
        $race->delete();
        return redirect()->back();
    }

    public function UserVote(Request $request) {
        
        $user = Auth::user()->id;
        $driver = $request->driver;
        $round = $request->round;
      
        $vote_id=Vote::where('status',1)->first()->id;
       
        // DONT LET USER VOTE TWICE FOR DRIVER
        $has_vote = UserVote::where('user_id',$user)->where('driver_id',$driver)->where('round_id',$round)->first();
      
        if (!$has_vote) {
            $vote = UserVote::create([
                'user_id' => $user,
                'driver_id' => $driver,
                'round_id' => $round,
                'vote_id' => $vote_id
            ]);

            
            return redirect()->route('voted');
 
        }
        else{
            
        }
    }
}
