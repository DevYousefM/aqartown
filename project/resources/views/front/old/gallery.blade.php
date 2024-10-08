@extends('layouts.front')

@section('title')
    {{ $langg->lang221 }} -
    @if($langg->rtl == 1 )
        {{$gs->title_ar}}
    @else
        {{$gs->title}}
    @endif
@stop

@section('content')

<style>
    .index{
        
        z-index:99999;
    }
     .gallery{
        
        display:block;
    }
     .hide{
        
        display:none;
    }
    
</style>
            
            <section>
                <div class="w-100 pt-180 pb-180 page-title-wrap text-center black-layer opc5 position-relative">
                    <div class="fixed-bg" style="background-image: url({{asset('assets/images/'.$gs->trending_icon)}});"></div>
                    <div class="container">
                        <div class="page-title-inner d-inline-block">
                            <h1 class="mb-0">{{ $langg->lang221 }}</h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('front.index',$sign)}}" title="">{{ $langg->lang17 }}</a></li>
                                <li class="breadcrumb-item active">{{ $langg->lang221 }}</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- Page Title Wrap -->
            </section>
            <section>
                <div class="w-100 pt-140 pb-120 position-relative">
                    <ul class="filter-links mb-0 list-unstyled d-flex flex-wrap justify-content-center w-100">
                        <li class="active"><a data-filter="*" href="javascript:void(0);" title="">Show All</a></li>
                           @foreach($galleries as $data)
                        <li><a data-filter=".fltr-itm{{$data->id}}" href="javascript:void(0);" title="">
                            @if($langg->rtl == 1)

                                                    {{$data->name_ar}}

                                                @else
                                                    {{$data->country_name}}

                                                @endif
                                                
                                                </a></li>
                       @endforeach
                    </ul>
                    <div class="gallery-wrap w-100">
                        <div class="row mrg masonry">
                          
                                
                              <section class="Grid">
                     <div class=" Grid-row">
                         @foreach($cats as $data)
                    <a class="Card fltr-itm{{$data->country_id}} fltr-itm" onClick="openGallery({{$data->id}})" id="card-{{$data->id}}">
                        <div class="Card-thumb">
                            <div class="Card-shadow"></div>
                            <div class="Card-shadow"></div>
                            <div class="Card-shadow"></div>
                            <div class="Card-image" style="background-image: url({{ $data->photo ? asset('assets/images/gallery/'.$data->photo):asset('assets/images/noimage.png') }});background-size: 100%;"></div>
                        </div>
                        <div class="Card-title"><span>Super interesting card</span></div>
                        <div class="Card-explore"><span>Explore 50 more</span></div><button class="Card-button">{{$data->name}}</button>
                    </a>
                    
                    
                @endforeach
               
                   
                    </div>
                    
                    
                    
              
            </section>
            <div class="hide" id="hide">
                 @foreach($cats as $data)
                    <section class="Gallery" id="gallery-{{$data->id}}">
                   
                    <div class="Gallery-header"><a class="Gallery-close" onclick="closeAll()">×</a></div>
                     <div class="row" style="text-align: center;">
                    
                       @foreach($data->images as $d)
                             <div class="col-lg-6">
                                 <img   src="{{asset('assets/images/gallery/'.$d->photo)}}">
                          
                              </div> 
                        @endforeach   
                  
                       
                        
                    </div>
                   <!-- <div class="Gallery-images">
                        <div class="Gallery-left">
                            <div class="Gallery-image"></div>
                            <div class="Gallery-image"></div>
                        </div>
                        <div class="Gallery-image Gallery-image--primary" style="background-image: url(https://robohash.org/1)"></div>
                    </div>
                    <div class="Gallery-images">
                        <div class="Gallery-image"></div>
                        <div class="Gallery-image"></div>
                        <div class="Gallery-image"></div>
                    </div>
                    <div class="Gallery-images">
                        <div class="Gallery-image"></div>
                        <div class="Gallery-image"></div>
                        <div class="Gallery-image"></div>
                    </div>
                    <div class="Gallery-images">
                        <div class="Gallery-image"></div>
                        <div class="Gallery-image"></div>
                        <div class="Gallery-image"></div>
                    </div>
                    <div class="Gallery-images">
                        <div class="Gallery-image"></div>
                        <div class="Gallery-image"></div>
                        <div class="Gallery-image"></div>
                    </div>-->
                </section> 
                 @endforeach
            </div>
            
                  
                                
                                
                          
                           
                           
                         
                        </div>
                    </div><!-- Gallery Wrap -->
                   
                </div>
            </section>
            
               
        <script>
                    function openGallery(id) {
                      closeAll();
                      const gallery = document.getElementById('gallery-' + id);
                      const hide = document.getElementById('hide');
                      const card = document.getElementById('card-' + id);
                      gallery.classList.add('Gallery--active');
                      hide.classList.add('gallery');
                       hide.classList.remove('hide');
                      card.classList.add('Card--active');
                    }

                    function closeAll() {
                      const galleryActv = document.querySelector('.Gallery--active');
                      const cardActv = document.querySelector('.Card--active');
                         hide.classList.add('hide');
                       hide.classList.remove('gallery');           
                      if (galleryActv) {
                        galleryActv.classList.remove('Gallery--active');
                      }

                      if (cardActv) {
                        cardActv.classList.remove('Card--active');
                      }
                      
                      
                    }
        </script>
        
      @stop