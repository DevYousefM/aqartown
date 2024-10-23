@extends('layouts.front')
@if (isset($cat->meta_description_ar) || isset($cat->meta_description))
    @if ($langg->rtl == 1)
        <meta name="description" content="{{ $cat->meta_description_ar }}">
    @else
        <meta name="description" content="{{ $cat->meta_description }}">
    @endif
@endif
@if (isset($subcat->meta_description) || isset($subcat->meta_description_ar))
    @if ($langg->rtl == 1)
        <meta name="description" content="{{ $subcat->meta_description_ar }}">
    @else
        <meta name="description" content="{{ $subcat->meta_description }}">
    @endif
@endif
@if (isset($subcat->meta_tag))
    <meta name="keywords" content="{{ $subcat->meta_tag }}">
@endif
@if (isset($cat->meta_tag))
    <meta name="keywords" content="{{ $subcat->meta_tag }}">
@endif
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
    <div class="sub-banner pt-90 pb-90">

        <div class="container">

            <div class="col-md-12">

                <div class="text-center text-line">
                    <h1>
                        @if (!empty($childcat))

                            @if ($langg->rtl == 1)
                                {{ $childcat->name_ar }}
                            @else
                                {{ $childcat->name }}
                            @endif
                        @elseif(!empty($subcat))
                            @if ($langg->rtl == 1)
                                {{ $subcat->name_ar }}
                            @else
                                {{ $subcat->name }}
                            @endif
                        @elseif(!empty($cat))
                            @if ($langg->rtl == 1)
                                {{ $cat->name_ar }}
                            @else
                                {{ $cat->name }}
                            @endif

                        @endif
                    </h1>

                    <ul class="text-c">

                        <li>{{ $langg->lang17 }}</li>

                        <li>|</li>
                        <li class="color-t">
                            @if (!empty($childcat))

                                @if ($langg->rtl == 1)
                                    {{ $childcat->name_ar }}
                                @else
                                    {{ $childcat->name }}
                                @endif
                            @elseif(!empty($subcat))
                                @if ($langg->rtl == 1)
                                    {{ $subcat->name_ar }}
                                @else
                                    {{ $subcat->name }}
                                @endif
                            @elseif(!empty($cat))
                                @if ($langg->rtl == 1)
                                    {{ $cat->name_ar }}
                                @else
                                    {{ $cat->name }}
                                @endif

                            @endif
                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

    <!--sub-Banner-End-->



    @if (empty($subcat))

        <section class="service-details">

            <div class="container">



                <div class="row">

                    <div class="col-md-12 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up">

                        <div class="card" id="development">

                            <div class="card-img">

                                <img src="{{ asset('assets/images/categories/' . $cat->photo) }}" alt="...">

                            </div>

                            <div class="card-body">

                                <h5 class="card-title"><a href="#">
                                        @if ($langg->rtl == 1)
                                            {{ $cat->name_ar }}
                                        @else
                                            {{ $cat->name }}
                                        @endif
                                    </a></h5>

                                <p class="card-text">
                                    @if ($langg->rtl == 1)
                                        {!! $cat->details_ar !!}
                                    @else
                                        {!! $cat->details !!}
                                    @endif
                                </p>



                            </div>

                        </div>

                    </div>

                </div>



            </div>

        </section>

    @endif





    @if (!empty($subcat))

        @if (count($subcat->products()->latest()->get()) > 0)
            <section class="pt-90 pb-60 pop-pro pop-pro-mar">

                <div class="container">

                    <div class="tab-content p-0 shadow-none" id="pills-tabContent">



                        <div class="tab-pane fade active show " id="pills" role="tabpanel" aria-labelledby="pills-tab">

                            <div class="row">



                                @foreach ($subcat->products()->latest()->get() as $productt)
                                    <div class="col-md-4">

                                        <div class="min-pro-box">

                                            <a
                                                href="

                                  @if ($langg->rtl == 1) {{ route('front.product', ['slug' => $productt->slug_ar, 'lang' => $sign]) }}

                                            @else

                                            {{ route('front.product', ['slug' => $productt->slug, 'lang' => $sign]) }} @endif          ">

                                                <img src="{{ filter_var($productt->photo, FILTER_VALIDATE_URL) ? $productt->photo : asset('assets/images/products/' . $productt->photo) }}"
                                                    alt="" class="bg-pro-i">

                                            </a>

                                            {{-- <button class="chat-re" data-toggle="modal" data-target="#myModal-chat">

                                                 <img src="{{asset('public/assets/aqar/')}}/images/messenger.png" alt="" class="mes">

                                             </button> --}}

                                            <div class="d-flex tags-container" style="gap: 10px">
                                                @if ($productt->is_available == 0)
                                                    <span class="tag-l bg-danger">
                                                        @if ($productt->product_condition == 1)
                                                            {{ $langg->lang832 }}
                                                        @endif
                                                        @if ($productt->product_condition == 2)
                                                            {{ $langg->lang831 }}
                                                        @endif
                                                    </span>
                                                @endif

                                                <span class="tag-l">
                                                    {{ $productt->product_condition == 2 ? $langg->lang39 : $langg->lang40 }}</span>
                                            </div>
                                            <div class="min-box-t">

                                                <h3> {{ $productt->price }}</h3>

                                                <h3><a
                                                        href=" @if ($langg->rtl == 1) {{ route('front.product', ['slug' => $productt->slug_ar, 'lang' => $sign]) }}

                                                    @else

                                                    {{ route('front.product', ['slug' => $productt->slug, 'lang' => $sign]) }} @endif  ">
                                                        @if ($langg->rtl == 1)
                                                            {{ $productt->name_ar }}
                                                        @else
                                                            {{ $productt->name }}
                                                        @endif
                                                    </a></h3>

                                                <ul class="min-f-img">

                                                    {{--  <li><img src="{{asset('public/assets/aqar/')}}/images/b-o.png" alt=""> 3 Br</li>

                                                      <li><img src="{{asset('public/assets/aqar/')}}/images/ba-o.png" alt=""> 3 Ba</li>

                                                      <li><img src="{{asset('public/assets/aqar/')}}/images/g-o.png" alt=""> 1 Gr</li> --}}

                                                    <li><img src="{{ asset('public/assets/aqar/') }}/images/s-o.png"
                                                            alt=""> {{ $productt->location }}</li>

                                                </ul>

                                            </div>

                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endif
@stop
@section('js')
    @if (!empty($cat))
        {!! $cat->facebook_pixel !!}
    @endif
    @if (!empty($subcat))
        {!! $subcat->facebook_pixel !!}
    @endif
@endsection
