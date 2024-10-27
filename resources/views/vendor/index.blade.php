@extends('layouts.vendor') 

@section('content')
                    <div class="content-area">

                           

                        
                        @include('includes.form-success')
                        <div class="row row-cards-one">

                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="mycard bg4">
                                        <div class="left">
                                            <h5 class="title">{{ $langg->lang443 }}</h5>
                                            <span class="number">{{ count($user->products) }}</span>
                                            <a href="{{route('vendor-prod-index',['lang' => $sign ])}}" class="link">{{ $langg->lang471 }}</a>
                                        </div>
                                        <div class="right d-flex align-self-center">
                                            <div class="icon">
                                                <i class="icofont-cart-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>  



                            </div>
                    </div>

@endsection
