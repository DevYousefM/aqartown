@extends('layouts.front')

@section('title')
    {{ $langg->lang18 }} -
    @if ($langg->rtl == 1)
        {{ $gs->title_ar }}
    @else
        {{ $gs->title }}
    @endif
@stop

@section('content')


    <section>
        <div class="w-100 pt-180 pb-180 page-title-wrap text-center black-layer opc5 position-relative">
            <div class="fixed-bg" style="background-image: url({{ asset('public/assets/images/' . $gs->new_icon) }});"></div>
            <div class="container">
                <div class="page-title-inner d-inline-block">
                    <h1 class="mb-0">{{ $langg->lang18 }}</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front.index', $sign) }}" title="">
                                {{ $langg->lang17 }}</a></li>
                        <li class="breadcrumb-item active"> {{ $langg->lang18 }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- Page Title Wrap -->
    </section>

    <section>
        <div class="w-100 pt-140 pb-120 position-relative">
            <div class="container">
                <div class="page-wrap w-100">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-8">
                            <div class="blog-wrap w-100">
                                @foreach ($blogs as $blogg)
                                    <div class="post-style2 list-view d-flex flex-wrap align-items-center mb-50 w-100">
                                        <div class="post-img2 w-100 position-relative overflow-hidden">
                                            <a href="{{ route('front.blogshow', ['id' => $blogg->slug, 'lang' => $sign]) }}"
                                                title=""><img class="img-fluid w-100"
                                                    src="{{ $blogg->photo ? asset('public/assets/images/blogs/' . $blogg->photo) : asset('public/assets/images/noimage.png') }}"
                                                    @if ($langg->rtl == 1) alt="{{ $blogg->alt_ar }}"
                                                                                         @else
                                                                                         alt="{{ $blogg->alt }}" @endif></a>
                                        </div>
                                        <div class="post-info2 w-100">
                                            <h3 class="mb-0"><a
                                                    href="{{ route('front.blogshow', ['id' => $blogg->slug, 'lang' => $sign]) }}"
                                                    title="">
                                                    @if ($langg->rtl == 1)
                                                        {{ strlen($blogg->title_ar) > 50 ? substr($blogg->title_ar, 0, 50) . '...' : $blogg->title_ar }}
                                                    @else
                                                        {{ strlen($blogg->title) > 50 ? substr($blogg->title, 0, 50) . '...' : $blogg->title }}
                                                    @endif
                                                </a></h3>
                                            <div class="post-meta2">
                                                <span
                                                    class="post-date thm-clr">{{ date('M d,Y', strtotime($blogg->created_at)) }}</span>
                                                <span class="post-author">{{ $blogg->author }}</span>
                                                <i class="post-cmt">{{ count($blogg->comments) }}</i>
                                            </div>
                                            <p class="mb-0">
                                                @if ($langg->rtl == 1)
                                                    {{ substr(strip_tags($blogg->details_ar), 0, 120) }}
                                                @else
                                                    {{ substr(strip_tags($blogg->details), 0, 120) }}
                                                @endif
                                            </p>
                                            @if (!empty($blogg->tags))
                                                <div class="post-tags w-100">
                                                    <span class="thm-clr"><i
                                                            class="fas fa-tag"></i>{{ $langg->lang35 }}:</span>
                                                    @foreach (explode(',', $blogg->tags) as $key => $tag)
                                                        <a href="{{ route('front.blogtags', ['slug' => $tag, 'lang' => $sign]) }}"
                                                            title="">
                                                            {{ $tag }}{{ $key != count(explode(',', $blogg->tags)) - 1 ? ',' : '' }}</a>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div><!-- Blog Wrap -->

                            <div class="pagination-wrap d-inline-block mt-20 w-100">

                                {!! $blogs->links() !!}
                                {{-- <ul class="pagination justify-content-start align-items-center mb-0 list-unstyled">


                                            <li class="page-item prev"><a class="page-link" href="javascript:void(0);" title=""><i class="fas fa-angle-double-left"></i></a></li>
                                            <li class="page-item"><a class="page-link" href="javascript:void(0);">01</a></li>
                                            <li class="page-item active"><span class="page-link">02</span></li>
                                            <li class="page-item"><a class="page-link" href="javascript:void(0);">03</a></li>
                                            <li class="page-item"><a class="page-link" href="javascript:void(0);">04</a></li>
                                            <li class="page-item dot">..........</li>
                                            <li class="page-item"><a class="page-link" href="javascript:void(0);">08</a></li>
                                            <li class="page-item next"><a class="page-link" href="javascript:void(0);"><i class="fas fa-angle-double-right"></i></a></li>


                                        </ul> --}}
                            </div><!-- Pagination Wrap -->
                        </div>

                        <div class="col-md-12 col-sm-12 col-lg-4">
                            <aside class="sidebar-wrap w-100">
                                <div class="widget-box w-100">
                                    <h3>{{ $langg->lang42 }}</h3>
                                    <ul class="cate-list mb-0 list-unstyled w-100">
                                        @if (!empty($bcats))
                                            @foreach ($bcats as $cat)
                                                <li><a href="{{ route('front.blogcategory', ['slug' => $cat->slug, 'lang' => $sign]) }}"
                                                        title="">
                                                        @if ($langg->rtl == 1)
                                                            {{ $cat->name_ar }}
                                                        @else
                                                            {{ $cat->name }}
                                                        @endif
                                                    </a><span>{{ $cat->blogs()->count() }}</span></li>
                                            @endforeach
                                        @endif

                                    </ul>
                                </div>
                                {{--  <div class="widget-box w-100">
                                            <h3>Information</h3>
                                            <p class="mb-0">Adipisicing elit, sed do Lorem ipsum dolor sit amet, consectetur Nulla frin gilla purus at leo dignissim Adipisici ng elit, sed do Lorem ipsum dolor sit amet, consectetur Nulla frin gilla pur us at leo dignissim</p>
                                            <span class="adrs d-block"><i class="thm-clr fas fa-map-marker-alt"></i>Walking Street, Los Angeles, California, USA</span>
                                            <a class="thm-btn fill-btn" href="about.html" title="">About Us<span></span></a>
                                        </div> --}}
                                <div class="widget-box w-100">
                                    <h3>{{ $langg->lang36 }} </h3>
                                    <div class="articles-list w-100">
                                        @foreach ($rec_blogs as $k => $blog)
                                            @php
                                                $k++;
                                            @endphp
                                            <div class="article-box d-flex flex-wrap w-100">
                                                <i>{{ $k }}.</i>
                                                <div class="article-info">
                                                    <span
                                                        class="post-date thm-clr">{{ date('M d,Y', strtotime($blog->created_at)) }}</span>
                                                    <h4 class="mb-0"><a
                                                            href="{{ route('front.blogshow', ['id' => $blog->slug, 'lang' => $sign]) }}"
                                                            title="">
                                                            @if ($langg->rtl == 1)
                                                                {{ strlen($blog->title_ar) > 50 ? substr($blog->title_ar, 0, 50) . '...' : $blog->title_ar }}
                                                            @else
                                                                {{ strlen($blog->title) > 50 ? substr($blog->title, 0, 50) . '...' : $blog->title }}
                                                            @endif
                                                        </a></h4>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="widget-box w-100">
                                    <h3>{{ $langg->lang37 }}</h3>
                                    <ul class="mb-0 list-unstyled w-100">
                                        @foreach ($archives as $key => $archive)
                                            <li><a href="{{ route('front.blogarchive', ['slug' => $key, 'lang' => $sign]) }}"
                                                    title="">({{ count($archive) }}) - {{ $key }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </aside><!-- Sidebar Wrap -->
                        </div>
                    </div>
                </div><!-- Page Wrap -->
            </div>
        </div>
    </section>

@stop

@section('js')
    <script src="{{ asset('public/assets/js/ResizeSensor.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/theia-sticky-sidebar.min.js') }}"></script>

@stop
