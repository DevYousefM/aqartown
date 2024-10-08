

@extends('layouts.front')

@section('title')
    @if(!empty($childcat))
        @if($langg->rtl == 1)
           {{ $childcat->name_ar }} - {{$gs->title_ar}}

        @else
           {{ $childcat->name }} - {{$gs->title}}

        @endif

    @elseif(!empty($subcat))
        @if($langg->rtl == 1)
          {{ $subcat->name_ar }} - {{$gs->title_ar}}

        @else
            {{ $subcat->name }} - {{$gs->title}}

        @endif

    @elseif(!empty($cat))

        @if($langg->rtl == 1)
            {{ $cat->name_ar }} - {{$gs->title_ar}}

        @else
            {{ $cat->name }} - {{$gs->title}}

        @endif
    @endif

@stop

@section('gsearch')


    @if (!empty($cat) && empty($subcat) && empty($childcat))
        @if(isset($tool->category_analytics ))

            {!! $tool->category_analytics !!}


        @endif

    @endif



    @if (!empty($subcat) && !empty($cat) && empty($childcat))
        @if(isset($tool->subcategory_analytics ))

            {!! $tool->subcategory_analytics !!}


        @endif

    @endif




    @if (!empty($childcat)&& !empty($subcat) && !empty($cat))
        @if(isset($tool->childcategory_analytics ))

            {!! $tool->childcategory_analytics !!}


        @endif

    @endif


@stop

@section('content')
@php 




  $ps = App\Models\Pagesetting::find(1);
  

   @endphp
            
        

			<!-- ============================ Page Title Start================================== -->
			<div class="page-title" style="background:linear-gradient(#21459799, #21459799), url({{asset('assets/images/'.$gs->feature_icon)}});" data-overlay="5">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							
							<div class="breadcrumbs-wrap">
								<ol class="breadcrumb">
									<li class="breadcrumb-item active" aria-current="page">@if(!empty($childcat))
                        @if($langg->rtl == 1)
                             {{ $childcat->name_ar }}

                        @else
                            {{ $childcat->name }}

                        @endif

                    @elseif(!empty($subcat))
                        @if($langg->rtl == 1)
                          {{ $subcat->name_ar }}

                        @else
                           {{ $subcat->name }}

                        @endif

                    @elseif(!empty($cat))

                        @if($langg->rtl == 1)
                           {{ $cat->name_ar }}

                        @else
                            {{ $cat->name }}

                        @endif
                    @endif</li>
								</ol>
								<h2 class="breadcrumb-title">@if(!empty($childcat))
                        @if($langg->rtl == 1)
                             {{ $childcat->name_ar }}

                        @else
                            {{ $childcat->name }}

                        @endif

                    @elseif(!empty($subcat))
                        @if($langg->rtl == 1)
                          {{ $subcat->name_ar }}

                        @else
                           {{ $subcat->name }}

                        @endif

                    @elseif(!empty($cat))

                        @if($langg->rtl == 1)
                           {{ $cat->name_ar }}

                        @else
                            {{ $cat->name }}

                        @endif
                    @endif-<span onclick="window.location.href='{{route('front.index',$sign)}}'" style="cursor: pointer;"> {{ $langg->lang17 }}</span>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<!-- ============================ Page Title End ================================== -->
				<!-- ============================ Agency List Start ================================== -->
				<div class="service_details">
					<div class="container">
						   <div class="image-layer">
			
						</div>
						<div class="row">
						
                            <div class="col-md-6">
                                <div class="service_details_wraper">
                                    <div class="text-p">
                                        <p> @if(!empty($childcat))
                        @if($langg->rtl == 1)
                             {{ $childcat->name_ar }}

                        @else
                            {{ $childcat->name }}

                        @endif

                    @elseif(!empty($subcat))
                        @if($langg->rtl == 1)
                          {{ $subcat->name_ar }}

                        @else
                           {{ $subcat->name }}

                        @endif

                    @elseif(!empty($cat))

                        @if($langg->rtl == 1)
                           {{ $cat->name_ar }}

                        @else
                            {{ $cat->name }}

                        @endif
                    @endif
                                        </p>
            
                                    </div>
                                    <p>
					 @if(!empty($childcat))
                        @if($langg->rtl == 1)
                             {!! $childcat->details_ar !!}

                        @else
                            {!! $childcat->details !!}

                        @endif

                    @elseif(!empty($subcat))
                        @if($langg->rtl == 1)
                          {!! $subcat->details_ar !!}

                        @else
                           {!! $subcat->details !!}

                        @endif

                    @elseif(!empty($cat))

                        @if($langg->rtl == 1)
                           {!! $cat->details_ar !!}

                        @else
                            {!! $cat->details !!}

                        @endif
                    @endif
                                    </p>
                                </div>
                             
                            </div>
                            <div class="col-md-6">
								<div class="service_details_wraper">
							
									@if(!empty($subcat))
									<img src="{{asset('assets/images/subcategories/'.$subcat->photo)}}" alt="">
									@elseif(!empty($cat))

									<img src="{{asset('assets/images/categories/'.$cat->photo)}}" alt="">
									@endif
								


									</div>
							</div>
						</div>
					</div>
				</div>
			<!-- ============================ Agency List End ================================== -->
		
			@include('includes.form')
        @stop