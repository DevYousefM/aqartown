      <div class="row">

          @foreach ($blogs as $blogg)
              <div class="col-md-6 col-lg-4">
                  <div class="blog-box">
                      <div class="blog-images">
                          <div class="img">
                              <img src="{{ $blogg->photo ? asset(access_public() . 'assets/images/blogs/' . $blogg->photo) : asset(access_public() . 'assets/images/noimage.png') }}"
                                  class="img-fluid" alt="">
                              <div class="date d-flex justify-content-center">
                                  <div class="box align-self-center">
                                      <p>{{ date('d', strtotime($blogg->created_at)) }}</p>
                                      <p>{{ date('M', strtotime($blogg->created_at)) }}</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="details">
                          <a href='{{ route('front.blogshow', ['id' => $blogg->id, 'lang' => $sign]) }}'>
                              <h4 class="blog-title">
                                  {{ strlen($blogg->title) > 50 ? substr($blogg->title, 0, 50) . '...' : $blogg->title }}
                              </h4>
                          </a>
                          <p class="blog-text">
                              {{ substr(strip_tags($blogg->details), 0, 120) }}
                          </p>
                          <a class="read-more-btn"
                              href="{{ route('front.blogshow', ['id' => $blogg->id, 'lang' => $sign]) }}">{{ $langg->lang38 }}</a>
                      </div>
                  </div>
              </div>
          @endforeach

      </div>

      <div class="page-center">
          {!! $blogs->links() !!}
      </div>
