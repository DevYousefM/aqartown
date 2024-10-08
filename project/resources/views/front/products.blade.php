
@extends('layouts.front')
@section('title')
    @if ($langg->rtl == 1)
        {{ $gs->title_ar }}
    @else
        {{ $gs->title }}
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
                    <h1>البحث</h1>
                    <ul class="text-c">
                        <li>{{ $langg->lang17 }}</li>
                        <li>|</li>
                        <li class="color-t">البحث </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--sub-Banner-End-->
    <section class="pt-90 pb-60 pop-pro pop-pro-mar">
        <div class="container">
            <div class="row mb-40">
                <div class="col-md-5">
                    <div class="heading-t  fadeInUp animated">
                        <h2>{{ $langg->lang7 }} </h2>
                    </div>
                </div>
            </div>
            <div class="tab-content p-0 shadow-none" id="pills-tabContent">
                <div class="tab-pane fade active show " id="pills" role="tabpanel" aria-labelledby="pills-tab">
                    <div class="row">
                        @foreach ($products as $productt)
                            <div class="col-md-4">
                                <div class="min-pro-box">
                                    <a
                                        href="{{ route('front.product', ['slug' => $langg->rtl == 1 ? $productt->slug_ar : $productt->slug, 'lang' => $sign]) }}">
                                        <img src="{{ filter_var($productt->photo, FILTER_VALIDATE_URL) ? $productt->photo : asset('assets/images/products/' . $productt->photo) }}"
                                            alt="" class="bg-pro-i">
                                    </a>
                                    {{-- <button class="chat-re" data-toggle="modal" data-target="#myModal-chat">
                                                 <img src="{{asset('assets/aqar/')}}/images/messenger.png" alt="" class="mes">
                                             </button> --}}

                                    <span class="tag-l">
                                        {{ $productt->product_condition == 2 ? $langg->lang39 : $langg->lang40 }}</span>
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
                                            {{--
                                                <li>
                                                    <img src="{{ asset('assets/aqar/') }}/images/b-o.png" alt=""> 3 Br
                                                </li>
                                                <li>
                                                    <img src="{{ asset('assets/aqar/') }}/images/ba-o.png" alt=""> 3 Ba
                                                </li>
                                                <li>
                                                    <img src="{{ asset('assets/aqar/') }}/images/g-o.png" alt=""> 1 Gr
                                                </li>
                                            --}}
                                            <li><img src="{{ asset('assets/aqar/') }}/images/s-o.png" alt="">
                                                {{ $productt->location }}</li>
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
@stop
