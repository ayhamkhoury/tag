<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Round;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers=Driver::all();
      
        $pageTitle = 'Drivers';
        $page_description = 'View Drivers';
        return view('admin.driver.view_drivers', compact('pageTitle', 'page_description', 'drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Add New Driver';
        $rounds=Round::all();
        $page_description = 'New Driver';
        return view('admin.driver.add_driver', compact('pageTitle', 'page_description','rounds'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Driver $driver)
    {
      //  dd($request->round_id);
        $fileNameToStore='';
        $rules = [
            'name' => 'required',
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
            $driver->name = $request->name;
        }
        if ($request->has('status')) {
            $driver->status = $request->status;
        }
        if ($request->has('details')) {
            $driver->details = $request->details;
          
        }
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName ();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename. '_'. time().'.'.$extension;
          
            $driver->image = $request->file('image')->storeAs('public/image', $fileNameToStore);
        }
        
        if ($request->has('image')) {
            $driver->image = $request->image;
        }
        if (!$driver->isDirty()) {
            return redirect()->back()->withErrors(['Nothing inserted']);
        }
        $driver = Driver::create([
            'name' => $request['name'],
            'status' => $request['status'],
            'details' => $request['details'],
            'image' => $fileNameToStore,
            
        ]);
        if ($driver) {
            foreach ($request->round_id as $round) {
                $driver->rounds()->attach($round);
            }
        }
        return redirect()->route('listdrivers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver, Request $request)
    {
        $rounds=Round::all();
        $driver = Driver::findOrFail($request->id);
        $driver_rounds  = [];
        foreach($driver->rounds as $round) {
            $driver_rounds[] = $round->id;
        }
       // dd($driver_rounds);
        $pageTitle =  'Edit Driver : ' ; 
        $page_description = $driver->name;
        return view('admin.driver.edit_driver', compact('pageTitle', 'page_description','driver','rounds','driver_rounds'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver)
    {
        $driver = Driver::findOrFail($request->id);
        $fileNameToStore='';
        $rules = [
            'name' => 'required',
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
            $driver->name = $request->name;
        }
        if ($request->has('status')) {
            $driver->status = $request->status;
        }
        if ($request->has('details')) {
            $driver->details = $request->details;
        }
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName ();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename. '_'. time().'.'.$extension;
            $driver->image = $request->file('image')->storeAs('public/image', $fileNameToStore);
        }
        if ($request->has('image')) {
            $driver->image = $fileNameToStore;
        }
  //      dd($request->round_id);
        $rounds = $request->round_id;
        if (is_array($rounds)) {
            $rounds =   array_values($request->round_id);
            $driver->rounds()->sync($rounds);
        }
        else {
            $driver->rounds()->sync($rounds);
        }
      
      
        if (!$driver->isDirty()) {
            return redirect()->back()->withErrors(['Nothing to update']);
        }
        $driver->save();
        return redirect()->route('listdrivers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver,Request $request)
    {
        $driver = Driver::findOrFail($request->id);
        $driver->delete();
        return redirect()->back();
    }
}
