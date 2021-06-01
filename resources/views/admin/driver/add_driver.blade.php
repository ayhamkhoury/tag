@extends('layouts.master')

@section('title')
Dashboard
@endsection

@section('content');
 
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
                            <form action="{{ route('savedriver') }}" method="POST" enctype="multipart/form-data">
                                
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" placeholder="Type your Race Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Details</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="details" class="form-control" placeholder="Type your Race Details">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Upload Race Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="image">
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