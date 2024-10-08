@extends('layouts.front')

@section('title')
    {{ $langg->lang221 }} -
    @if($langg->rtl == 1 )
        {{$gs->title_ar}}
    @else
        {{$gs->title}}
    @endif
@stop

@section('css')
<link rel="stylesheet" href="{{asset('assets/Al-Araby/css/lightgallery.css"')}}">
@stop





@section('content')


        <section class="medicen-aboutUs text-center" style="background-image: url({{asset('assets/images/'.$gs->trending_icon)}});">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-lg-6">
                     <img src="./images/logo3.png"  alt="">
                    </div>
                    <div class="col-lg-6">
                        <h3>{{ $langg->lang221 }}</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item active" aria-current="page">{{ $langg->lang221 }}</li>
                              <li class="breadcrumb-item"><a href="{{route('front.index',$sign)}}">{{ $langg->lang17 }}</a></li>
                            </ol>
                            </nav>
                    </div>
                </div>
            </div>
          </section>

   <!-- gallery page -->
   <div class="gallery-pgae">
    <!-- start gallery section -->
    <div class="home-gallery-section">
      <div class="section-heading">
        <p>
        {{ $langg->lang221 }}
        </p>
      </div>
      <div class="gallery-layout">
        <div class="home-light-gallery">
        @foreach($images as $key=>$data) 
          <a href="{{asset('assets/images/gallery/'.$data->photo)}}" data-aos="zoom-in" data-aos-duration="1500">
            <img src="{{asset('assets/images/gallery/'.$data->photo)}}" alt="@if($langg->rtl == 1)

                    {{$data->name_ar}}

                    @else
                    {{$data->name}}

                    @endif" />
          </a>
          @endforeach  
        </div>
      </div>
    </div>
    <!-- end gallery section -->
  </div>
  <!-- gallery page -->

        <!-- <section class="regester">
            <div class="container">
                <div class="row align-items-center regervation_content">
                    <div class="col-lg-7">
                        <div class="appointment-right">
                            <form class="form-wrap" action="#">
                            <h3 class="pb-20 text-center mb-20" style="color: #fff;">احجز موعد</h3>
                            <input type="text" class="form-control" name="name" placeholder="اسم الحاله" onfocus="this.placeholder = ''" onblur="this.placeholder = 'اسم الحاله'">
                            <input type="text" class="form-control" name="phone" placeholder="الرقم الهاتف" onfocus="this.placeholder = ''" onblur="this.placeholder = 'الرقم الهاتف'">
                            <input type="email" class="form-control" name="email" placeholder="البريد الالكتروني" onfocus="this.placeholder = ''" onblur="this.placeholder = 'اسم الحاله'">
                            <textarea name="messege" class="" rows="5" placeholder="اترك رسالة" onfocus="this.placeholder = ''" onblur="this.placeholder = 'اترك رساله'"></textarea>
                            <div class="text-center confirm_btn_box">
                            <button class="main_btn text-uppercase">اكمال الحجز</button>
                            </div>
                            </form>
                            </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="reservation_img">
                        <img src="./images/xreservation.png.pagespeed.ic.ns2M4rrU87.webp" alt="" class="reservatio width="600px"n_img_iner" data-pagespeed-url-hash="1196769664" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                        </div>
                        </div>
                </div>
            </div>
        </section>  -->



@stop

@section('js')
<script src="{{asset('assets/Al-Araby/js/lightgallery.js')}}"></script>
<script>
    // home gallery section

if (document.querySelector('.home-light-gallery')) {
  lightGallery(document.querySelector('.home-light-gallery'), {
    thumbnail: true
  });
}
</script>

@stop