@extends('layouts.front')

@section('title')
    {{ $langg->lang223 }} -
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

    <section class="breadcrumb-section"
        style="background-image: url({{ asset(access_public() . 'assets/images/' . $gs->top_icon) }});">
        <div class="container">
            <div class="breadcrumb-text">
                <h1> {{ $langg->lang223 }}
                </h1>
            </div>
            <ul class="breadcrumb-nav">
                <li> {{ $langg->lang223 }}
                </li>
                <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
            </ul>
            <span class="btg-text">ArabsLab</span>
        </div>

    </section>



    <div class="gallery-pgae">
        <div class="section-heading">
            <p>
                {{ $langg->lang46 }} </p>


        </div>
        <!-- start gallery section -->
        <div class="home-gallery-section">

            <div class="" style="background-color: #fff;
display: grid;">
                <div class="" style="grid-template-columns: repeat(4, 1fr);">
                    <!-- data-aos="zoom-in" data-aos-duration="1500" -->
                    @foreach ($categories as $key => $category)
                        <a href="@if ($langg->rtl == 1) {{ route('front.category', ['category' => $category->slug_ar, 'lang' => $sign]) }}
                                                  @else
                                                {{ route('front.category', ['category' => $category->slug, 'lang' => $sign]) }} @endif"
                            style="  display: grid;
  align-items: stretch;
  display: grid;
  align-items: stretch;
  text-align: center;
  
  background-color: #fefefe26;
  box-shadow: 1px 2px 20px #e9ecef;
  border-radius: 25px;
  margin-bottom: 20px;
  width: 330px;
  padding: 20px;
}">
                            <img src="{{ asset(access_public() . 'assets/images/categories/' . $category->photo) }}"
                                style="width: 100%;
height: 278px;
border-radius: 30px;
object-fit: cover;">
                            <div class="text text-center"
                                style="font-size: 16px;
line-height: 1.6em;
font-weight: 400;
margin-top: 20px;
color: #555555;
border-top: 2px dotted #203e66;
border-radius: 20px;
margin: 0;">
                                <h2 style="padding: 15px;
font-size: 20px;
color: #19335a;">
                                    @if ($langg->rtl == 1)
                                        {{ $category->name_ar }}
                                    @else
                                        {{ $category->name }}
                                    @endif​​
                                </h2>
                                <h6 style="line-height: 1.8;
font-size: 15px;
color: #19335a;">
                                    @if ($langg->rtl == 1)
                                        {{ $category->meta_description_ar }}
                                    @else
                                        {{ $category->meta_description }}
                                    @endif​
                                </h6>
                                <button
                                    style="padding: 6px 20px;
margin-top: 24px;
transition: .2s all ease-in-out;border: 2px solid #0053A6;
color: #fff;
border-radius: 42px;
background-color: #0053A6;box-shadow: 0 6px 8px rgb(0 0 0 / 10%);cursor: pointer;"
                                    onclick="window.location.href='@if ($langg->rtl == 1) {{ route('front.category', ['category' => $category->slug_ar, 'lang' => $sign]) }}
                                                  @else
                                                {{ route('front.category', ['category' => $category->slug, 'lang' => $sign]) }} @endif'">
                                    <span>
                                        {{ $langg->lang49 }}
                                    </span>
                                </button>

                            </div>
                        </a>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- end gallery section -->
    </div>


@stop
