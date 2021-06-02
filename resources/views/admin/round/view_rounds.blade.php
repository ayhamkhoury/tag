@extends('layouts.master')

@section('title')
Dashboard
@endsection

@section('content');
 
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
                            <li><a href="{{ route('addround') }}" ><i class="fa fa-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                     
                                    <th>Round</th>
                                    <th>Start</th>
                                    <th>End</th>
                                     <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rounds as $rounds)
                                
                                <tr>
                                  
                                    <td>{{ $rounds->name }}</td>
                                    <td>{{ $rounds->start_date }}</td>
                                    <td>{{ $rounds->end_date }}</td>
                                    <td>
                                        @php
                                            if($rounds->status==2):
                                            echo 'Current';
                                            endif;
                                            if($rounds->status==1):
                                            echo 'Next';
                                            endif;
                                            if($rounds->status==0):
                                            echo 'Previous';
                                         endif;
                                        @endphp
                                      </td>
                                    <td> 
                                        <a href="{{ route('editround',[$rounds->id]) }}"  class="btn btn-sm btn-clean btn-icon" title="">
                                            <i class="fa fa-edit"></i>   
                                        </a>
                                        <a onclick="return confirm('Are you sure?')" href="{{ route('deleteround',[$rounds->id]) }}" class="btn btn-sm btn-clean btn-icon" title="">
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