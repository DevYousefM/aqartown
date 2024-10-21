@extends('layouts.front')

@section('title')
    @if (!empty($childcat))
        @if ($langg->rtl == 1)
            {{ $childcat->name_ar }} - {{ $gs->title_ar }}
        @else
            {{ $childcat->name }} - {{ $gs->title }}
        @endif
    @elseif(!empty($subcat))
        @if ($langg->rtl == 1)
            {{ $subcat->name_ar }} - {{ $gs->title_ar }}
        @else
            {{ $subcat->name }} - {{ $gs->title }}
        @endif
    @elseif(!empty($cat))
        @if ($langg->rtl == 1)
            {{ $cat->name_ar }} - {{ $gs->title_ar }}
        @else
            {{ $cat->name }} - {{ $gs->title }}
        @endif
    @endif

@stop

@section('gsearch')


    @if (!empty($cat) && empty($subcat) && empty($childcat))
        @if (isset($tool->category_analytics))
            {!! $tool->category_analytics !!}
        @endif

    @endif



    @if (!empty($subcat) && !empty($cat) && empty($childcat))
        @if (isset($tool->subcategory_analytics))
            {!! $tool->subcategory_analytics !!}
        @endif

    @endif




    @if (!empty($childcat) && !empty($subcat) && !empty($cat))
        @if (isset($tool->childcategory_analytics))
            {!! $tool->childcategory_analytics !!}
        @endif

    @endif


@stop

@section('content')
    @php

        $ps = App\Models\Pagesetting::find(1);

    @endphp


    <section class="page-title">
        <div class="outer-container">
            <div class="image">
                <img src="{{ asset('public/assets/images/' . $gs->top_icon) }}" alt="" />
            </div>
        </div>
    </section>
    <section class="page-breadcrumb">
        <div class="image-layer" style="background-image:url({{ asset('assets/naglaa/images/background/1.png') }})"></div>
        <div class="container">
            <div class="clearfix">
                <div class="pull-left fll">
                    <h2>
                        @if ($langg->rtl == 1)
                            {{ $cat->name_ar }}
                        @else
                            {{ $cat->name }}
                        @endif
                    </h2>
                </div>
                <div class="pull-right">
                    <ul class="breadcrumbs">
                        <li class="left-curves"></li>
                        <li class="right-curves"></li>
                        <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}-</a></li>
                        <li>
                            @if ($langg->rtl == 1)
                                {{ $cat->name_ar }}
                            @else
                                {{ $cat->name }}
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>



    <section class="services-single-section">
        <div class="container">
            <div class="row">

                <div class="widgets-column col-lg-3 col-md-12 col-sm-12">
                    <div class="inner-column">

                        <div class="services-widget category-widget">
                            <ul class="cat-list">
                                <li class="active"><a href="#">
                                        <h1>{{ $langg->lang37 }}</h1>
                                    </a></li>
                                @foreach ($categories->where('id', '!=', $cat->id) as $key => $category)
<li><a href="@if ($langg->rtl == 1) {{ route('front.category', ['category' => $category->slug_ar, 'lang' => $sign]) }}
                                              
                                            @else
                                              {{ route('front.category', ['category' => $category->slug, 'lang' => $sign]) }} @endif">
@if ($langg->rtl == 1)
{{ $category->name_ar }}
@else
{{ $category->name }}
@endif
</a></li>
@endforeach
                                </ul>
                            </div>

                            <!-- <div class="services-widget schedule-widget">
                                <div class="image">
                                    <img src="images/resource/service-10.jpg" alt="" />
                                    <div class="overlay-box">
                                        <div class="content">
                                            <span class="icon flaticon-calendar-2"></span>
                                            <h3>مواعيد العيادة</h3>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>

                    <div class="content-column col-lg-9 col-md-12 col-sm-12">
                        <div class="inner-column">

                            <div class="services-carousel">
                                <div class="image-column">
                                    <div class="carousel-outer">
                                        <ul class="image-carousel owl-carousel owl-theme">

                                    @foreach ($cat->galleries as $image)
<li><a href="{{ asset('public/assets/images/galleries/' . $image->photo) }}" class="lightbox-image"
                                                    title="Image Caption Here"><img src="{{ asset('public/assets/images/galleries/' . $image->photo) }}"
                                                        alt=""></a></li>
@endforeach
                                        
                                        </ul>
                                        <ul class="thumbs-carousel owl-carousel owl-theme">
                                        @foreach ($cat->galleries as $image)
<li><img src="{{ asset('public/assets/images/galleries/' . $image->photo) }}" alt=""></li>
@endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <h2> @if ($langg->rtl == 1)
{{ $cat->name_ar }}
@else
{{ $cat->name }}
@endif
</h2>
<p> @if ($langg->rtl == 1)
{!! $cat->details_ar !!}
@else
{!! $cat->details !!}
@endif
</p>
                            <!-- <h2>Treatment Plans</h2>
                            <div class="row">
                                <div class="column col-lg-6 col-md-12 col-sm-12">
                                    <ul class="plan-list">
                                        <li><i>فيلر شفايف</i><span>$59</span></li>
                                        <li><i>التصبغات الجلديه </i><span>$25</span></li>
                                        <li><i> تضييق الجبهة </i><span>$48</span></li>
                                        <li><i>بوتوكس</i><span>$82</span></li>
                                        <li><i>زراعه شعر</i><span>$74</span></li>
                                        <li><i>تساقط الشعر</i><span>$19</span></li>
                                    </ul>
                                </div>
                                <div class="column col-lg-6 col-md-12 col-sm-12">
                                    <ul class="plan-list">
                                        <li><i>فيلر شفايف</i><span>$59</span></li>
                                        <li><i>التصبغات الجلديه </i><span>$25</span></li>
                                        <li><i> تضييق الجبهة </i><span>$48</span></li>
                                        <li><i>بوتوكس</i><span>$82</span></li>
                                        <li><i>زراعه شعر</i><span>$74</span></li>
                                        <li><i>تساقط الشعر</i><span>$19</span></li>
                                    </ul>
                                </div>
                            </div>
                            <h2>Good physician treats the disease</h2>
                            <p>عن المركز
                                هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قام هذا القرن مع إصدار رقائق "ليتراسيت"</p>
                            <br>
                            <div class="row">
                                <div class="column col-lg-4 col-md-6 col-sm-12">
                                    <ul class="list-style-three">
                                        <li>فيلر شفايف</li>
                                        <li>التصبغات الجلديه </li>
                                        <li> تضييق الجبهة </li>
                                    </ul>
                                </div>
                                <div class="column col-lg-4 col-md-6 col-sm-12">
                                    <ul class="list-style-three">
                                        <li>بوتوكس</li>
                                        <li>زراعه شعر</li>
                                        <li>Rehabitation</li>
                                        <li>تساقط الشعر</li>
                                    </ul>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('includes.form')
      
  
@stop

@section('js')

     <script>
         $(document).on('submit', '#email-form', function(e) {
             e.preventDefault();
             $('.gocover').show();
             $('.submit-btn').prop('disabled', true);
             var name = $('.fname').val();

             var email = $('.email').val();

             if (name == '' || email == '') {
                 $('#email-form .response').html(
                     '<div class="failed alert alert-warning">Please fill the required fields.</div>');
                 $('button.submit-btn').prop('disabled', false);
                 return false;
             }

             $.ajax({
                 method: "POST",
                 url: $(this).prop('action'),
                 data: new FormData(this),
                 contentType: false,
                 cache: false,
                 processData: false,
                 beforeSend: function() {
                     $('#email-form .response').html(
                         '<div class="text-info"><img src="{{ asset('public/assets/images/preloader.gif') }}"> Loading...</div>'
                         );
                     console.log(1);
                 },
                 success: function(data) {
                     console.log(2);
                     if ((data.errors)) {
                         console.log(3);
                         $('.alert-success').hide();
                         $('.alert-danger').show();
                         $('#email-form .response').html('');
                         for (var error in data.errors) {
                             console.log(4);
                             $('#email-form .response').append('<li>' + data.errors[error] + '</li>')
                         }
                         $('#email-form input[type=text], #email-form input[type=email], #email-form textarea')
                             .eq(0).focus();
                         $('#email-form .refresh_code').trigger('click');

                     } else {
                         console.log(5);
                         $('.alert-danger').hide();
                         $('.alert-success').show();
                         $('#email-form .response').html(data);
                         $('#email-form input[type=text], #email-form input[type=email], #email-form textarea')
                             .eq(0).focus();
                         $('#email-form input[type=text], #email-form input[type=email], #email-form textarea')
                             .val('');
                         $('#email-form .refresh_code').trigger('click');

                     }
                     console.log(6);
                     $('.gocover').hide();
                     $('button.submit-btn').prop('disabled', false);
                 }

             });

         });
     </script>
@stop)
