@extends('layouts.admin') 

@section('styles')

<style type="text/css">
    
.input-field { 
    padding: 15px 20px; 
}

</style>

@endsection

@section('content')  

<input type="hidden" id="headerdata" value="{{ __('ORDER') }}">
             
             
                    <div class="content-area">
                        <div class="mr-breadcrumb">
                            <div class="row">
                                 @if(Session::has('flash_message'))
                                    <div class="alert alert-success text-center"><em> {!! session('flash_message') !!}</em></div>
                                   @endif 
                                
                                <div class="col-lg-12">
                                        <h4 class="heading">{{ __('All Orders') }}</h4>
                                        <ul class="links">
                                            <li>
                                                <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">{{ __('Orders') }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('admin-order-index') }}">{{ __('All Orders') }}</a>
                                            </li>
                                        </ul>
                                </div>
                            </div>
                        </div>
                     <form action="{{route('admin-order-report-index')}}" method="post" enctype="multipart/form-data" >
                         {{csrf_field()}}
                          <div class="form-group">
                            <label for="exampleInputEmail1">{{ __('Start Date') }}</label>
                            <input type="date" name="start_date" class="form-control" id="start_date" aria-describedby="emailHelp">
                            
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">{{ __('End Date') }}</label>
                            <input type="date" name="end_date" class="form-control" id="end_date">
                          </div>
                        
                          <button type="submit" id="btn_search" class="btn btn-primary">Submit</button>
                      </form> 
                        <br>
                        <br>
                        
                       

@endsection    

