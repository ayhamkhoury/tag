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
                            <form action="{{ route('updaterace') }}" method="POST" enctype="multipart/form-data">
                                
                                {{ csrf_field() }}
                              
                                <div class="form-group row">
                                    <input name="id" type="hidden" value="{{ $race->id }}" class="form-control"/>
                                     
                                     <img src="{{ Storage::url($race->image) }}" />
                                    <?php
                                    ?>
                                </div>
                                <div class="form-group row">
                                    
                                    <label class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" placeholder="Type your Race Name" value="{{ $race->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    
                                    <label class="col-sm-2 col-form-label">Race Type</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" placeholder="Type your Race type" value="{{ $race->type }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    
                                    <label class="col-sm-2 col-form-label">Cup</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="cup" class="form-control" placeholder="Type your Race type" value="{{ $race->cup }}">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Details</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="details" class="form-control" placeholder="Type your Race Details" value="{{ $race->details }}">
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
                                        <input type="date" name="start_date" class="form-control" placeholder="Type your Race Start Date" value="{{ $race->start_date }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">End Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="end_date" class="form-control" placeholder="Type your Race End Date" value="{{ $race->end_date }}">
                                    </div>
                                </div>
                                <?php $status=[0=>0,1=>1];
                                $diff=array_diff_assoc($status, [$race->status=>$race->status]);
                                $values=[0=>"Diabled",1=>"Acitve"];
                                $key=array_keys($diff);
                                
                               ?>                               
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <select  name="status" class="form-control">
                                            <option value="{{ $race->status }}" selected>{{ $values[$race->status] }}</option>
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