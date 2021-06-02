<?php

namespace App\Http\Controllers;

use App\Models\Race;
use App\Models\Round;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rounds=Round::all();
        $pageTitle = 'Rounds';
        $page_description = 'View Rounds';
        return view('admin.round.view_rounds', compact('pageTitle', 'page_description', 'rounds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Add New Round';
        $page_description = 'New Round';
        $races = Race::where('status','1')->get();
        return view('admin.round.add_round', compact('pageTitle', 'page_description','races'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Round $round)
    {
        $fileNameToStore='';
        $rules = [
            'race_id' => 'required',
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        $customMessages = [
            'name|required' => 'you forgot  name'
        ];
    
        $validate = Validator::make($request->all(), $rules, $customMessages);
        $messages = $validate->messages();
        if ($validate->fails()) {
            return redirect()->back()->withErrors($messages);
        }
        if ($request->has('race_id')) {
            $round->race_id = $request->race_id;
             
        }
        if ($request->has('name')) {
            $round->name = $request->name; 
        }
        if ($request->has('status')) {
            $round->status = $request->status; 
        }
        if ($request->has('details')) {
            $round->details = $request->details;
          
        }
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName ();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename. '_'. time().'.'.$extension;
          
            $round->map_image = $request->file('image')->storeAs('public/image', $fileNameToStore);
        }
        if ($request->has('start_date')) {
            $round->start_date = $request->start_date; 
        }
        if ($request->has('end_date')) {
            $round->end_date = $request->end_date;
        }
        if ($request->has('image')) {
            $round->map_image = $request->image;
        }
        if (!$round->isDirty()) {
            return redirect()->back()->withErrors(['Nothing inserted']);
        }
        $round = Round::create([
            'name' => $request['name'],
            'status' => $request['status'] ,
            'details' => $request['details'],
            'map_image' => $fileNameToStore,
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date'],
            'race_id' => $request['race_id'],
        ]);
        return redirect()->route('listrounds');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Round  $round
     * @return \Illuminate\Http\Response
     */
    public function show(Round $round)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Round  $round
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Round $round)
    {
        //
        $round = Round::findOrFail($request->id);
        $race = Race::select('*')->where('status', '=','1')->where('id', '=',$round->race_id)->get();
        $another_races = Race::select('*')->where('status', '=','1')->where('id', '!=', $round->race_id)->get();
        $pageTitle =  'Edit Round : ' ; 
        $page_description = $round->name;
       return view('admin.round.edit_round', compact('pageTitle', 'page_description','round','race','another_races'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Round  $round
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Round $round)
    {
        $round = Round::findOrFail($request->id);
        $fileNameToStore='';
        $rules = [
            'race_id' => 'required',
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        $customMessages = [
            'name|required' => 'you forgot  name'
        ];

        $validate = Validator::make($request->all(), $rules, $customMessages);
        $messages = $validate->messages();
        if ($validate->fails()) {
            return redirect()->back()->withErrors($messages);
        }
        if ($request->has('race_id')) {
            $round->race_id = $request->race_id; 
        }

        if ($request->has('name')) {
            $round->name = $request->name;
        }
        if ($request->has('status')) {
            $round->status = $request->status;
        }
        if ($request->has('details')) {
            $round->details = $request->details;
          
        }
        if ($request->hasFile('image')) {
           // dd($request);
            $filenameWithExt = $request->file('image')->getClientOriginalName ();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename. '_'. time().'.'.$extension;
          
            $round->map_image = $request->file('image')->storeAs('public/image', $fileNameToStore);



        }
        if ($request->has('start_date')) {
            $round->start_date = $request->start_date;
           
        }
        if ($request->has('end_date')) {
            $round->end_date = $request->end_date;
          
        }
        if ($request->has('image')) {
            $round->image = $request->image;
          
        }

        if (!$round->isDirty()) {
            return redirect()->back()->withErrors(['Nothing to update']);
        }

        $round->save();
        return redirect()->route('listrounds');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Round  $round
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Round $round)
    {
        $round = Round::findOrFail($request->id);
        $round->delete();
        return redirect()->back();
    }
}
