@extends('layouts.master')

@section('title')
Dashboard
@endsection

@section('content')
 
<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-body start -->
        <div class="page-body">
            <!-- Basic table card start -->
            <div class="card">
                <div class="card-header">
                    <h5>{{ $pageTitle }}</h5>
                     <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="fa fa fa-wrench open-card-option"></i></li>
                            <li><i class="fa fa-window-maximize full-card"></i></li>
                            <li><i class="fa fa-minus minimize-card"></i></li>
                            <li><i class="fa fa-refresh reload-card"></i></li>
                            <li><a href="{{ route('addvote') }}" ><i class="fa fa-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                     
                                   
                                    <th>Details</th>
                                    <th>Start</th>
                                    <th>End</th>
                                     <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($votes as $vote)
                                
                                <tr>
                                  
                                    
                                    <td>{{ $vote->details }}</td>
                                    <td>{{ $vote->start_date }}</td>
                                    <td>{{ $vote->end_date }}</td>
                                    <td>
                                        @php
                                            if($vote->status==1):
                                            echo 'Active';
                                            else:
                                            echo 'Disabled';
                                         endif;
                                        @endphp
                                      </td>
                                    <td> 
                                        <a href="{{ route('editvote',[$vote->id]) }}"  class="btn btn-sm btn-clean btn-icon" title="">
                                            <i class="fa fa-edit"></i>   
                                        </a>
                                        <a onclick="return confirm('Are you sure?')" href="{{ route('deletevote',[$vote->id]) }}" class="btn btn-sm btn-clean btn-icon" title="">
                                            <i class="fa fa-trash"></i>      
                                        </a>
                                     </td>
                                </tr>
                                @endforeach
                              
                             
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Basic table card end -->
            <!-- Inverse table card start -->
             
     
        </div>
        <!-- Page-body end -->
    </div>
</div>

@endsection


@section('scripts')
@endsection