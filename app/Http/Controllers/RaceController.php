<?php

namespace App\Http\Controllers;

use App\Models\Race;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $races=Race::all();
        $pageTitle = 'Races';
        $page_description = 'View Races';
        return view('admin.race.view_races', compact('pageTitle', 'page_description', 'races'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Add New Race';
        $page_description = 'New Race';
        return view('admin.race.add_race', compact('pageTitle', 'page_description'));

       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Race $race)
    { 
  
        $fileNameToStore='';
        $rules = [
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
        if ($request->has('name')) {
            $race->name = $request->name;
        }
        if ($request->has('status')) {
            $race->status = $request->status;
        }

        if ($request->has('details')) {
            $race->details = $request->details;
          
        }
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName ();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename. '_'. time().'.'.$extension;
          
            $race->image = $request->file('image')->storeAs('public/image', $fileNameToStore);
        }
        if ($request->has('start_date')) {
            $race->start_date = $request->start_date; 
        }
        if ($request->has('end_date')) {
            $race->end_date = $request->end_date;
        }
        if ($request->has('image')) {
            $race->image = $request->image;
        }
        if (!$race->isDirty()) {
            return redirect()->back()->withErrors(['Nothing inserted']);
        }
        $race = Race::create([
            'name' => $request['name'],
            'status' => $request['status'],
            'details' => $request['details'],
            'image' => $fileNameToStore,
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date'],
        ]);
        return redirect()->route('listraces');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function show(Race $race)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Race $race)
    {
        //
        $race = Race::findOrFail($request->id);
        $pageTitle =  'Edit Race : ' ; 
        $page_description = $race->name;
        return view('admin.race.edit_race', compact('pageTitle', 'page_description','race'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $race = Race::findOrFail($request->id);
        $fileNameToStore='';
        $rules = [
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

        if ($request->has('name')) {
            $race->name = $request->name;
        }
        if ($request->has('status')) {
            $race->status = $request->status;
        }
        if ($request->has('details')) {
            $race->details = $request->details;
          
        }
        if ($request->hasFile('image')) {
           // dd($request);
            $filenameWithExt = $request->file('image')->getClientOriginalName ();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename. '_'. time().'.'.$extension;
          
            $race->image = $request->file('image')->storeAs('public/image', $fileNameToStore);



        }
        if ($request->has('start_date')) {
            $race->start_date = $request->start_date;
           
        }
        if ($request->has('end_date')) {
            $race->end_date = $request->end_date;
          
        }
        if ($request->has('image')) {
            $race->image = $request->image;
          
        }

        if (!$race->isDirty()) {
            return redirect()->back()->withErrors(['Nothing to update']);
        }

        $race->save();
        return redirect()->route('listraces');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Race $race)
    {
        $race = Race::findOrFail($request->id);
        $race->delete();
        return redirect()->back();
    }
}
