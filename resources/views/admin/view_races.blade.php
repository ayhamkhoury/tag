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
                    <h5>Races</h5>
                     <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="fa fa fa-wrench open-card-option"></i></li>
                            <li><i class="fa fa-window-maximize full-card"></i></li>
                            <li><i class="fa fa-minus minimize-card"></i></li>
                            <li><i class="fa fa-refresh reload-card"></i></li>
                            <li><i class="fa fa-trash close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Race</th>
                                    <th>Start</th>
                                    <th>End</th>
                                     <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($races as $races)
                                @php $i=0;
                                $i++;
                                @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $races->name }}</td>
                                    <td>{{ $races->start_date }}</td>
                                    <td>{{ $races->end_date }}</td>
                                    <td>
                                        @php
                                            if($races->status==1):
                                            echo 'Active';
                                            else:
                                            echo 'Disabled';
                                         endif;
                                        @endphp
                                      </td>
                                    <td> 
                                        <a href="" class="btn btn-sm btn-clean btn-icon" title="">
                                            <i class="fa fa-edit"></i>   
                                        </a>
                                        <a onclick="return confirm('Are you sure?')" href="" class="btn btn-sm btn-clean btn-icon" title="">
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