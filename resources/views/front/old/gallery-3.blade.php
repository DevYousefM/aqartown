@extends('layouts.front')

@section('title')
    {{ $langg->lang16 }}
@stop

@section('content')
            <section>
                <div class="w-100 pt-180 pb-180 page-title-wrap text-center black-layer opc5 position-relative">
                    <div class="fixed-bg" style="background-image: url(assets/images/parallax8.jpg);"></div>
                    <div class="container">
                        <div class="page-title-inner d-inline-block">
                            <h1 class="mb-0">Gallery -2</h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html" title="">Home</a></li>
                                <li class="breadcrumb-item active">Gallery -3</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- Page Title Wrap -->
            </section>
           <section class="Grid">
                <div class="Grid-row"><a class="Card" onClick="openGallery(1)" id="card-1">
                        <div class="Card-thumb">
                            <div class="Card-shadow"></div>
                            <div class="Card-shadow"></div>
                            <div class="Card-shadow"></div>
                            <div class="Card-image" style="background-image: url(https://robohash.org/1)"></div>
                        </div>
                        <div class="Card-title"><span>Super interesting card</span></div>
                        <div class="Card-explore"><span>Explore 50 more</span></div><button class="Card-button">view more</button>
                    </a><a class="Card" onClick="openGallery(2)" id="card-2">
                        <div class="Card-thumb">
                            <div class="Card-shadow"></div>
                            <div class="Card-shadow"></div>
                            <div class="Card-shadow"></div>
                            <div class="Card-image" style="background-image: url(https://robohash.org/2)"></div>
                        </div>
                        <div class="Card-title"><span>Super interesting card</span></div>
                        <div class="Card-explore"><span>Explore 50 more</span></div><button class="Card-button">view more</button>
                    </a><a class="Card" onClick="openGallery(3)" id="card-3">
                        <div class="Card-thumb">
                            <div class="Card-shadow"></div>
                            <div class="Card-shadow"></div>
                            <div class="Card-shadow"></div>
                            <div class="Card-image" style="background-image: url(https://robohash.org/3)"></div>
                        </div>
                        <div class="Card-title"><span>Super interesting card</span></div>
                        <div class="Card-explore"><span>Explore 50 more</span></div><button class="Card-button">view more</button>
                    </a></div>
                <div class="Grid-row"><a class="Card" onClick="openGallery(4)" id="card-4">
                        <div class="Card-thumb">
                            <div class="Card-shadow"></div>
                            <div class="Card-shadow"></div>
                            <div class="Card-shadow"></div>
                            <div class="Card-image" style="background-image: url(https://robohash.org/4)"></div>
                        </div>
                        <div class="Card-title"><span>Super interesting card</span></div>
                        <div class="Card-explore"><span>Explore 50 more</span></div><button class="Card-button">view more</button>
                    </a><a class="Card" onClick="openGallery(5)" id="card-5">
                        <div class="Card-thumb">
                            <div class="Card-shadow"></div>
                            <div class="Card-shadow"></div>
                            <div class="Card-shadow"></div>
                            <div class="Card-image" style="background-image: url(https://robohash.org/5)"></div>
                        </div>
                        <div class="Card-title"><span>Super interesting card</span></div>
                        <div class="Card-explore"><span>Explore 50 more</span></div><button class="Card-button">view more</button>
                    </a><a class="Card" onClick="openGallery(6)" id="card-6">
                        <div class="Card-thumb">
                            <div class="Card-shadow"></div>
                            <div class="Card-shadow"></div>
                            <div class="Card-shadow"></div>
                            <div class="Card-image" style="background-image: url(https://robohash.org/6)"></div>
                        </div>
                        <div class="Card-title"><span>Super interesting card</span></div>
                        <div class="Card-explore"><span>Explore 50 more</span></div><button class="Card-button">view more</button>
                    </a></div>
                <div class="Grid-row"><a class="Card" onClick="openGallery(7)" id="card-7">
                        <div class="Card-thumb">
                            <div class="Card-shadow"></div>
                            <div class="Card-shadow"></div>
                            <div class="Card-shadow"></div>
                            <div class="Card-image" style="background-image: url(https://robohash.org/7)"></div>
                        </div>
                        <div class="Card-title"><span>Super interesting card</span></div>
                        <div class="Card-explore"><span>Explore 50 more</span></div><button class="Card-button">view more</button>
                    </a><a class="Card" onClick="openGallery(8)" id="card-8">
                        <div class="Card-thumb">
                            <div class="Card-shadow"></div>
                            <div class="Card-shadow"></div>
                            <div class="Card-shadow"></div>
                            <div class="Card-image" style="background-image: url(https://robohash.org/8)"></div>
                        </div>
                        <div class="Card-title"><span>Super interesting card</span></div>
                        <div class="Card-explore"><span>Explore 50 more</span></div><button class="Card-button">view more</button>
                    </a><a class="Card" onClick="openGallery(9)" id="card-9">
                        <div class="Card-thumb">
                            <div class="Card-shadow"></div>
                            <div class="Card-shadow"></div>
                            <div class="Card-shadow"></div>
                            <div class="Card-image" style="background-image: url(https://robohash.org/9)"></div>
                        </div>
                        <div class="Card-title"><span>Super interesting card</span></div>
                        <div class="Card-explore"><span>Explore 50 more</span></div><button class="Card-button">view more</button>
                    </a></div>
            </section>
                <section class="Gallery" id="gallery-1">
                    <div class="Gallery-header"><a class="Gallery-close" onclick="closeAll()">×</a></div>
                    <div class="Gallery-images">
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
                    </div>
                </section>
                <section class="Gallery" id="gallery-2">
                    <div class="Gallery-header"><a class="Gallery-close" onclick="closeAll()">×</a></div>
                    <div class="Gallery-images">
                        <div class="Gallery-left">
                            <div class="Gallery-image"></div>
                            <div class="Gallery-image"></div>
                        </div>
                        <div class="Gallery-image Gallery-image--primary" style="background-image: url(https://robohash.org/2)"></div>
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
                    </div>
                </section>
                <section class="Gallery" id="gallery-3">
                    <div class="Gallery-header"><a class="Gallery-close" onclick="closeAll()">×</a></div>
                    <div class="Gallery-images">
                        <div class="Gallery-left">
                            <div class="Gallery-image"></div>
                            <div class="Gallery-image"></div>
                        </div>
                        <div class="Gallery-image Gallery-image--primary" style="background-image: url(https://robohash.org/3)"></div>
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
                    </div>
                </section>
                <section class="Gallery" id="gallery-4">
                    <div class="Gallery-header"><a class="Gallery-close" onclick="closeAll()">×</a></div>
                    <div class="Gallery-images">
                        <div class="Gallery-left">
                            <div class="Gallery-image"></div>
                            <div class="Gallery-image"></div>
                        </div>
                        <div class="Gallery-image Gallery-image--primary" style="background-image: url(https://robohash.org/4)"></div>
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
                    </div>
                </section>
                <section class="Gallery" id="gallery-5">
                    <div class="Gallery-header"><a class="Gallery-close" onclick="closeAll()">×</a></div>
                    <div class="Gallery-images">
                        <div class="Gallery-left">
                            <div class="Gallery-image"></div>
                            <div class="Gallery-image"></div>
                        </div>
                        <div class="Gallery-image Gallery-image--primary" style="background-image: url(https://robohash.org/5)"></div>
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
                    </div>
                </section>
                <section class="Gallery" id="gallery-6">
                    <div class="Gallery-header"><a class="Gallery-close" onclick="closeAll()">×</a></div>
                    <div class="Gallery-images">
                        <div class="Gallery-left">
                            <div class="Gallery-image"></div>
                            <div class="Gallery-image"></div>
                        </div>
                        <div class="Gallery-image Gallery-image--primary" style="background-image: url(https://robohash.org/6)"></div>
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
                    </div>
                </section>
                <section class="Gallery" id="gallery-7">
                    <div class="Gallery-header"><a class="Gallery-close" onclick="closeAll()">×</a></div>
                    <div class="Gallery-images">
                        <div class="Gallery-left">
                            <div class="Gallery-image"></div>
                            <div class="Gallery-image"></div>
                        </div>
                        <div class="Gallery-image Gallery-image--primary" style="background-image: url(https://robohash.org/7)"></div>
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
                    </div>
                </section>
                <section class="Gallery" id="gallery-8">
                    <div class="Gallery-header"><a class="Gallery-close" onclick="closeAll()">×</a></div>
                    <div class="Gallery-images">
                        <div class="Gallery-left">
                            <div class="Gallery-image"></div>
                            <div class="Gallery-image"></div>
                        </div>
                        <div class="Gallery-image Gallery-image--primary" style="background-image: url(https://robohash.org/8)"></div>
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
                    </div>
                </section>
                <section class="Gallery" id="gallery-9">
                    <div class="Gallery-header"><a class="Gallery-close" onclick="closeAll()">×</a></div>
                    <div class="Gallery-images">
                        <div class="Gallery-left">
                            <div class="Gallery-image"></div>
                            <div class="Gallery-image"></div>
                        </div>
                        <div class="Gallery-image Gallery-image--primary" style="background-image: url(https://robohash.org/9)"></div>
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
                    </div>
                </section>
           
        
        
        <script>
                    function openGallery(id) {
                      closeAll();
                      const gallery = document.getElementById('gallery-' + id);
                      const card = document.getElementById('card-' + id);
                      gallery.classList.add('Gallery--active');
                      card.classList.add('Card--active');
                    }

                    function closeAll() {
                      const galleryActv = document.querySelector('.Gallery--active');
                      const cardActv = document.querySelector('.Card--active');

                      if (galleryActv) {
                        galleryActv.classList.remove('Gallery--active');
                      }

                      if (cardActv) {
                        cardActv.classList.remove('Card--active');
                      }
                    }
        </script>
    @stop