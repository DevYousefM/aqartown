@extends('layouts.front')

@section('title')
    {{ $langg->lang7 }} -
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

    <!-- =====slider home ===== -->
    <!-- Main Slider -->
    <section class="breadcrumb-area"
        style="background-image: url(  {{ asset(access_public() . 'assets/images/' . $gs->big_icon) }} );">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content clearfix">
                        <div class="title float-right">
                            <h2>{{ $langg->lang7 }}</h2>
                        </div>
                        <div class="breadcrumb-menu float-left">
                            <ul class="clearfix">
                                <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                                <li class="active">{{ $langg->lang7 }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @foreach ($offers as $k => $offer)
        @if ($k % 2)
            <section class="wrapper-2">
                <div class="container">
                    <div id="elmo" class="vc_row row vc_row-fluid vc_row_168785674">
                        <div class="container">
                            <div class="sec-title max-width text-center"
                                style="
                        margin-top: 19px;
                    ">
                                <h1> {{ $langg->rtl == 1 ? $offer->name_ar : $offer->name }}</h1>

                            </div>
                        </div>
                        <div class="wpb_column vc_column_container col-md-6 vc_column_2108647070">
                            <div class="vc_column-inner ">
                                <div class="wpb_wrapper">
                                    <div class="smile_icon_list_wrap ult_info_list_container ult-adjust-bottom-margin  ">
                                        <ul class="smile_icon_list right circle with_bg">
                                            <li class="icon_list_item" style=" font-size:72px;">
                                                <div class="icon_list_icon animated swing delay-03" data-animation="swing"
                                                    data-animation-delay="03"
                                                    style="font-size:24px;border-width:3px;border-style:solid;background:#ffffff;color:#ed1c24;border-color:#a9a9a9;">
                                                    <i class="icon-gps"></i>
                                                </div>
                                                <div class="icon_description" id="Info-list-wrap-8037"
                                                    style="font-size:24px;">
                                                    <h3 class="ult-responsive info-list-heading"
                                                        data-ultimate-target="#Info-list-wrap-8037 h3"
                                                        data-responsive-json-new="{&quot;font-size&quot;:&quot;desktop:30px;&quot;,&quot;line-height&quot;:&quot;desktop:24px;&quot;}"
                                                        style="color:#ed1c24;">
                                                        <p></p>
                                                    </h3>
                                                    <h3><strong>{{ $langg->lang38 }} </strong></h3>
                                                    <p></p>
                                                    <div class="icon_description_text ult-responsive"
                                                        data-ultimate-target="#Info-list-wrap-8037 .icon_description_text"
                                                        data-responsive-json-new="{&quot;font-size&quot;:&quot;desktop:13px;&quot;,&quot;line-height&quot;:&quot;desktop:18px;&quot;}"
                                                        style="color:#000000;">
                                                        <p>{{ $langg->rtl == 1 ? $offer->title_ar : $offer->title }}
                                                        </p>
                                                        <div id="gtx-trans"
                                                            style="position: absolute; left: 178px; top: 43.7125px;">
                                                            <div class="gtx-trans-icon"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="icon_list_connector"
                                                    style="border-right-width: 1px;border-right-style: dashed;border-color: #333333;">
                                                </div>
                                            </li>
                                            <li class="icon_list_item" style=" font-size:72px;">
                                                <div class="icon_list_icon animated swing delay-03" data-animation="swing"
                                                    data-animation-delay="03"
                                                    style="font-size:24px;border-width:3px;border-style:solid;background:#ffffff;color:#ed1c24;border-color:#a9a9a9;">
                                                    <i class="fal fa-phone"></i>
                                                </div>
                                                <div class="icon_description" id="Info-list-wrap-5672"
                                                    style="font-size:24px;">
                                                    <h3 class="ult-responsive info-list-heading"
                                                        data-ultimate-target="#Info-list-wrap-5672 h3"
                                                        data-responsive-json-new="{&quot;font-size&quot;:&quot;desktop:24px;&quot;,&quot;line-height&quot;:&quot;desktop:24px;&quot;}"
                                                        style="font-weight:bold;color:#ed1c24;">
                                                        <p></p>
                                                    </h3>
                                                    <h3><strong>{{ $langg->lang48 }} </strong></h3>
                                                    <p></p>
                                                    <div class="icon_description_text ult-responsive"
                                                        data-ultimate-target="#Info-list-wrap-5672 .icon_description_text"
                                                        data-responsive-json-new="{&quot;font-size&quot;:&quot;desktop:18px;&quot;,&quot;line-height&quot;:&quot;desktop:18px;&quot;}"
                                                        style="color:#000000;">
                                                        <h4 style="direction: ltr; text-align: right;"><span
                                                                style="color: #000000;"><a style="color: #000000;"
                                                                    href="tel:{{ $offer->desc }} ">{{ $offer->desc }}
                                                                </a></span><br>
                                                            <br>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="icon_list_connector"
                                                    style="border-right-width: 1px;border-right-style: dashed;border-color: #333333;">
                                                </div>
                                            </li>
                                            <li class="icon_list_item" style=" font-size:72px;">
                                                <div class="icon_list_icon animated swing delay-03" data-animation="swing"
                                                    data-animation-delay="03"
                                                    style="font-size:24px;border-width:3px;border-style:solid;background:#ffffff;color:#ed1c24;border-color:#a9a9a9;">
                                                    <i class="far fa-envelope"></i>
                                                </div>
                                                <div class="icon_description" id="Info-list-wrap-3858"
                                                    style="font-size:24px;">
                                                    <h3 class="ult-responsive info-list-heading"
                                                        data-ultimate-target="#Info-list-wrap-3858 h3"
                                                        data-responsive-json-new="{&quot;font-size&quot;:&quot;desktop:24px;&quot;,&quot;line-height&quot;:&quot;desktop:24px;&quot;}"
                                                        style="color:#ed1c24;">
                                                        <p></p>
                                                    </h3>
                                                    <h3><strong>{{ $langg->lang49 }}</strong></h3>
                                                    <p></p>
                                                    <div class="icon_description_text ult-responsive"
                                                        data-ultimate-target="#Info-list-wrap-3858 .icon_description_text"
                                                        data-responsive-json-new="{&quot;font-size&quot;:&quot;desktop:18px;&quot;,&quot;line-height&quot;:&quot;desktop:18px;&quot;}"
                                                        style="color:#000000;">
                                                        <h4 style="direction: rtl; text-align: right;"><span
                                                                style="color: #000000;"><a style="color: #000000;"
                                                                    href="mailto:{{ $offer->desc_ar }}">{{ $offer->desc_ar }}
                                                                </a></span>
                                                        </h4>
                                                    </div>
                                                </div>

                                            </li>

                                        </ul>
                                    </div>
                                    <style type="text/css">
                                        .vc_column_2108647070:not(.vc_parallax):not(.jarallax) {
                                            overflow: center !important;
                                            position: relative;
                                        }
                                    </style>
                                </div>
                            </div>
                        </div>
                        <div class="wpb_column vc_column_container col-md-6 vc_column_17588533">
                            <div class="vc_column-inner ">
                                <div class="wpb_wrapper">
                                    <div class="wpb_gmaps_widget wpb_content_element">
                                        <div class="wpb_wrapper">
                                            <div class="wpb_map_wraper">
                                                {!! $offer->facebook !!}
                                            </div>
                                        </div>
                                    </div>
                                    <style type="text/css">
                                        .vc_column_17588533:not(.vc_parallax):not(.jarallax) {
                                            overflow: center !important;
                                            position: relative;
                                        }
                                    </style>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <section class="wrapper">
                <div class="container">
                    <div id="elmo" class="vc_row row vc_row-fluid vc_row_168785674">
                        <div class="container">
                            <div class="sec-title max-width text-center"
                                style="
                        margin-top: 19px;
                    ">

                                <h1> {{ $langg->rtl == 1 ? $offer->name_ar : $offer->name }}</h1>

                            </div>
                        </div>
                        <div class="wpb_column vc_column_container col-md-6 vc_column_2108647070">
                            <div class="vc_column-inner ">
                                <div class="wpb_wrapper">
                                    <div class="smile_icon_list_wrap ult_info_list_container ult-adjust-bottom-margin  ">
                                        <ul class="smile_icon_list right circle with_bg">
                                            <li class="icon_list_item" style=" font-size:72px;">
                                                <div class="icon_list_icon animated swing delay-03" data-animation="swing"
                                                    data-animation-delay="03"
                                                    style="font-size:24px;border-width:3px;border-style:solid;background:#ffffff;color:#ed1c24;border-color:#a9a9a9;">
                                                    <i class="icon-gps"></i>
                                                </div>
                                                <div class="icon_description" id="Info-list-wrap-8037"
                                                    style="font-size:24px;">
                                                    <h3 class="ult-responsive info-list-heading"
                                                        data-ultimate-target="#Info-list-wrap-8037 h3"
                                                        data-responsive-json-new="{&quot;font-size&quot;:&quot;desktop:30px;&quot;,&quot;line-height&quot;:&quot;desktop:24px;&quot;}"
                                                        style="color:#ed1c24;">
                                                        <p></p>
                                                    </h3>
                                                    <h3><strong>{{ $langg->lang38 }} </strong></h3>
                                                    <p></p>
                                                    <div class="icon_description_text ult-responsive"
                                                        data-ultimate-target="#Info-list-wrap-8037 .icon_description_text"
                                                        data-responsive-json-new="{&quot;font-size&quot;:&quot;desktop:13px;&quot;,&quot;line-height&quot;:&quot;desktop:18px;&quot;}"
                                                        style="color:#000000;">
                                                        <p>{{ $langg->rtl == 1 ? $offer->title_ar : $offer->title }}</p>
                                                        <div id="gtx-trans"
                                                            style="position: absolute; left: 178px; top: 43.7125px;">
                                                            <div class="gtx-trans-icon"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="icon_list_connector"
                                                    style="border-right-width: 1px;border-right-style: dashed;border-color: #333333;">
                                                </div>
                                            </li>
                                            <li class="icon_list_item" style=" font-size:72px;">
                                                <div class="icon_list_icon animated swing delay-03" data-animation="swing"
                                                    data-animation-delay="03"
                                                    style="font-size:24px;border-width:3px;border-style:solid;background:#ffffff;color:#ed1c24;border-color:#a9a9a9;">
                                                    <i class="fal fa-phone"></i>
                                                </div>
                                                <div class="icon_description" id="Info-list-wrap-5672"
                                                    style="font-size:24px;">
                                                    <h3 class="ult-responsive info-list-heading"
                                                        data-ultimate-target="#Info-list-wrap-5672 h3"
                                                        data-responsive-json-new="{&quot;font-size&quot;:&quot;desktop:24px;&quot;,&quot;line-height&quot;:&quot;desktop:24px;&quot;}"
                                                        style="font-weight:bold;color:#ed1c24;">
                                                        <p></p>
                                                    </h3>
                                                    <h3><strong>{{ $langg->lang48 }} </strong></h3>
                                                    <p></p>
                                                    <div class="icon_description_text ult-responsive"
                                                        data-ultimate-target="#Info-list-wrap-5672 .icon_description_text"
                                                        data-responsive-json-new="{&quot;font-size&quot;:&quot;desktop:18px;&quot;,&quot;line-height&quot;:&quot;desktop:18px;&quot;}"
                                                        style="color:#000000;">
                                                        <h4 style="direction: ltr; text-align: right;"><span
                                                                style="color: #000000;"><a style="color: #000000;"
                                                                    href="tel:{{ $offer->desc }}">{{ $offer->desc }}
                                                                </a></span><br>
                                                            <br>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="icon_list_connector"
                                                    style="border-right-width: 1px;border-right-style: dashed;border-color: #333333;">
                                                </div>
                                            </li>
                                            <li class="icon_list_item" style=" font-size:72px;">
                                                <div class="icon_list_icon animated swing delay-03" data-animation="swing"
                                                    data-animation-delay="03"
                                                    style="font-size:24px;border-width:3px;border-style:solid;background:#ffffff;color:#ed1c24;border-color:#a9a9a9;">
                                                    <i class="far fa-envelope"></i>
                                                </div>
                                                <div class="icon_description" id="Info-list-wrap-3858"
                                                    style="font-size:24px;">
                                                    <h3 class="ult-responsive info-list-heading"
                                                        data-ultimate-target="#Info-list-wrap-3858 h3"
                                                        data-responsive-json-new="{&quot;font-size&quot;:&quot;desktop:24px;&quot;,&quot;line-height&quot;:&quot;desktop:24px;&quot;}"
                                                        style="color:#ed1c24;">
                                                        <p></p>
                                                    </h3>
                                                    <h3><strong>{{ $langg->lang49 }}</strong></h3>
                                                    <p></p>
                                                    <div class="icon_description_text ult-responsive"
                                                        data-ultimate-target="#Info-list-wrap-3858 .icon_description_text"
                                                        data-responsive-json-new="{&quot;font-size&quot;:&quot;desktop:18px;&quot;,&quot;line-height&quot;:&quot;desktop:18px;&quot;}"
                                                        style="color:#000000;">
                                                        <h4 style="direction: rtl; text-align: right;"><span
                                                                style="color: #000000;"><a style="color: #000000;"
                                                                    href="mailto:{{ $offer->desc_ar }}">{{ $offer->desc_ar }}</a></span>
                                                        </h4>
                                                    </div>
                                                </div>

                                            </li>

                                        </ul>
                                    </div>
                                    <style type="text/css">
                                        .vc_column_2108647070:not(.vc_parallax):not(.jarallax) {
                                            overflow: center !important;
                                            position: relative;
                                        }
                                    </style>
                                </div>
                            </div>
                        </div>
                        <div class="wpb_column vc_column_container col-md-6 vc_column_17588533">
                            <div class="vc_column-inner ">
                                <div class="wpb_wrapper">
                                    <div class="wpb_gmaps_widget wpb_content_element">
                                        <div class="wpb_wrapper">
                                            <div class="wpb_map_wraper">
                                                {!! $offer->facebook !!}
                                            </div>
                                        </div>
                                    </div>
                                    <style type="text/css">
                                        .vc_column_17588533:not(.vc_parallax):not(.jarallax) {
                                            overflow: center !important;
                                            position: relative;
                                        }
                                    </style>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--End About Area-->
        @endif
    @endforeach
@stop
