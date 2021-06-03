<?php

namespace App\Http\Controllers;

use App\Models\Race;
use App\Models\Round;
use App\Models\Driver;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function index()
    {
        $race=Race::where('status','=','1')->limit(1)->get();
        $voting=Vote::where('status','=',1)->first();
      
        $name='';
        $type='';
        $cup='';
        $details='';
        $image='';
        $race_id='';
        $drivers=new Driver();
        $current_round=new Round();
        
       
        foreach($race as $race)
        {
            $race_id=$race->id;
            $name=$race->name;
            $type=$race->type;
            $cup=$race->cup;
            $details=$race->details;
            $image=$race->image;
             
        }
        //$path = url('storage/image/'. $image);

        $driver_arr=[];
        $driver_arrs=[];
        $rounds=Round::where('race_id','=',$race_id)->orderby('created_at','asc')->get();
        foreach($rounds as $round){
          $current_round=Round::where('status','=','2')->limit(1)->get();
 
          }
      foreach($current_round as $round)
      {  
       $driver_arr[]=$round->drivers;
       }  
        $pageTitle = 'Races';
        $page_description = 'View Races';
        return view('layouts.index', compact('pageTitle', 'page_description','voting',
        'name','cup','type','details','image','rounds','driver_arr'));
    }


    public function home()
    {
        $race=Race::where('status','=','1')->limit(1)->get();
        $name='';
        $type='';
        $cup='';
        $details='';
        $image='';
        $race_id='';
        $drivers=new Driver();
        $current_round=new Round();
        
       
        foreach($race as $race)
        {
            $race_id=$race->id;
            $name=$race->name;
            $type=$race->type;
            $cup=$race->cup;
            $details=$race->details;
            $image=$race->image;
             
        }
        //$path = url('storage/image/'. $image);

        $driver_arr=[];
        $driver_arrs=[];
        $rounds=Round::where('race_id','=',$race_id)->orderby('created_at','asc')->get();
        foreach($rounds as $round){
          $current_round=Round::where('status','=','2')->limit(1)->get();
 
          }
      foreach($current_round as $round)
      {  
       $driver_arr[]=$round->drivers;
       }
     
      
        
       $round_to_vote=Round::where('status','2')->first();
 
       
        $pageTitle = 'Races';
        $page_description = 'View Races';
        return view('layouts.home', compact('pageTitle', 'page_description',
        'name','cup','type','details','image','rounds','driver_arr','round_to_vote'));
    }

    public function getvotes()
    {
        $race=Race::where('status','=','1')->limit(1)->get();
        $name='';
        $type='';
        $cup='';
        $details='';
        $image='';
        $race_id='';
        $drivers=new Driver();
        $current_round=new Round();
        
       
        foreach($race as $race)
        {
            $race_id=$race->id;
            $name=$race->name;
            $type=$race->type;
            $cup=$race->cup;
            $details=$race->details;
            $image=$race->image;
             
        }
        //$path = url('storage/image/'. $image);

        $driver_arr=[];
        $driver_arrs=[];
        $rounds=Round::where('race_id','=',$race_id)->orderby('created_at','asc')->get();
        foreach($rounds as $round){
          $current_round=Round::where('status','=','2')->limit(1)->get();
 
          }
      foreach($current_round as $round)
      {  
       $driver_arr[]=$round->drivers;
       }
     
      
        
       $round_to_vote=Round::where('status','2')->first();
       $votes_detais = DB::table('user_votes')
       ->select('driver_id','round_id', DB::raw('COUNT(*) as `count`'))
       ->where('round_id','=',$round_to_vote->id)
       ->groupBy('driver_id', 'round_id')
       ->havingRaw('COUNT(*) >= 1')
       ->get();
       
       // dd($votes_detais);
      
      // $all_votes=count($votes_detais);
      $all_votes=0;
      foreach($votes_detais as $vote)
      {
        $all_votes+=$vote->count;
      }
      

       $result_driver_id=[];
       $result_count=[];
       $result_name=[];
       $result_image=[];
       foreach($votes_detais as $dt)
       {
         foreach($driver_arr as $driver)
         {
             foreach($driver as $value)
             {
                  
                 if($value->id==$dt->driver_id)
                 {
                    $result_driver_id[]=$dt->driver_id;
                    $result_count[]=$dt->count;
                    $result_name[]=$value->name;
                    $result_image[]=$value->image;
                 }
             }
         }
       }
        
        $pageTitle = 'Races';
        $page_description = 'View Races';
        return view('layouts.voted', compact('pageTitle', 'page_description',
        'name','cup','type','details','image',
        'rounds','driver_arr','round_to_vote','all_votes','votes_detais',
    'result_driver_id','result_count','result_name','result_image'));
    }
}
