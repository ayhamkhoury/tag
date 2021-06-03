@extends('layouts.third')

@section('title')
Dashboard
@endsection

@section('content')
 
<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-body start -->
        <div class="page-body">
           
            <div class="row">
                <div class="col-sm-12">
                    <!-- Basic Form Inputs card start -->
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ $pageTitle }}</h5>
                            <span>{{ $page_description }}</span>
                        </div>
                        <div class="card-block">
                            <h4 class="sub-title">Inputs</h4>
                            <form action="{{ route('updateround') }}" method="POST" enctype="multipart/form-data">
                                
                                {{ csrf_field() }}
                              
                                <div class="form-group row">
                                    <input name="id" type="hidden" value="{{ $round->id }}" class="form-control"/>
                                     
                                     <img src="{{ Storage::url($round->map_image) }}" />
                                    <?php
                                    ?>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Race</label>
                                    <div class="col-sm-10">
                                        <select  name="race_id" class="form-control">  
                                            @foreach ($race as $race)
                                                
                                                                               
                                            <option selected value="{{ $race->id }}">{{ $race->name }}</option>
                                            @endforeach   
                                            @foreach ($another_races as $another_races)
                                            <option value="{{ $another_races->id }}">{{ $another_races->name }}</option>
                                            @endforeach

                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    
                                    <label class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" placeholder="Type Round Name" value="{{ $round->name }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    
                                    <label class="col-sm-2 col-form-label">Round Track</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="racetrack" class="form-control" placeholder="Type Round Track" value="{{ $round->racetrack }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Details</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="details" class="form-control" placeholder="Type Round Details" value="{{ $round->details }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Upload Race Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Start Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="start_date" class="form-control" placeholder="Type Round Start Date" value="{{ $round->start_date }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">End Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="end_date" class="form-control" placeholder="Type Round End Date" value="{{ $round->end_date }}">
                                    </div>
                                </div>

                                <?php $status=[0=>0,1=>1,2=>2];
                                $round_ar=[$round->status=>$round->status];
                                $diff=array_diff_assoc($status, $round_ar);
                                $values=[0=>"Previous",1=>"Next",2=>"Current"];
                                $key=array_keys($diff);
                                
                               ?>
                            
 
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <select  name="status" class="form-control">
                                            <option value="{{ $round->status }}" selected>{{ $values[$round->status] }}</option>
                                            @foreach($diff as $key => $val)
                                            <option value="{{ $key }}" >{{ $values[$val] }}</option>
                                              @endforeach
                                        </select>
      
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        @if(count($errors)>0)
                                        @include('admin.errors',['errors'=> $errors->all()]) 
                                    @endif
                                     </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-1">
                                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Save"/>
                                     </div>
                                     <div class="col-sm-2">
                                        <button type="reset" class="btn btn-danger waves-effect waves-light">Cancel</button>
                                     </div>
                                </div>
                               
                            </form>
                           
                          
                        </div>
                    </div>
                    <!-- Basic Form Inputs card end -->
                </div>
            </div>
             
     
        </div>
        <!-- Page-body end -->
    </div>
</div>

@endsection


@section('scripts')
@endsection