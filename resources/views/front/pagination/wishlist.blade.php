@php

    $slang = Session::get('language');
    $lang = DB::table('languages')->where('is_default', '=', 1)->first();

@endphp
<div class="row wish-list-area">

    @foreach ($wishlists as $wishlist)

        @if (!empty($sort))
            <div class="col-lg-6">
                <div class="single-wish">
                    <span class="remove wishlist-remove"
                        data-href="{{ route('user-wishlist-remove', App\Models\Wishlist::where('user_id', '=', $user->id)->where('product_id', '=', $wishlist->id)->first()->id) }}"><i
                            class="fas fa-times"></i></span>
                    <div class="left">
                        <img src="{{ $wishlist->photo ? asset(access_public() . 'assets/images/products/' . $wishlist->photo) : asset(access_public() . 'assets/images/noimage.png') }}"
                            alt="">
                    </div>
                    <div class="right">
                        <h4 class="title">
                            <a href="{{ route('front.product', ['slug' => $wishlist->slug, 'lang' => $sign]) }}">
                                {{ $wishlist->name }}
                            </a>
                        </h4>
                        <ul class="stars">
                            <div class="ratings">
                                <div class="empty-stars"></div>
                                <div class="full-stars" style="width:{{ App\Models\Rating::ratings($wishlist->id) }}%">
                                </div>
                            </div>
                        </ul>
                        <div class="price">
                            {{ $wishlist->showPrice() }}<small><del>{{ $wishlist->showPreviousPrice() }}</del></small>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="col-lg-6">
                <div class="single-wish">
                    <span class="remove wishlist-remove"
                        data-href="{{ route('user-wishlist-remove', $wishlist->id) }}"><i
                            class="fas fa-times"></i></span>
                    <div class="left">
                        <img src="{{ $wishlist->product->photo ? asset(access_public() . 'assets/images/products/' . $wishlist->product->photo) : asset(access_public() . 'assets/images/noimage.png') }}"
                            alt="">
                    </div>
                    <div class="right">
                        <h4 class="title">
                            <a
                                href="{{ route('front.product', ['slug' => $wishlist->product->slug, 'lang' => $sign]) }}">
                                @if (!$slang)
                                    @if ($lang->id == 2)
                                        {{ $wishlist->product->name_ar }}
                                    @else
                                        {{ $wishlist->product->name }}
                                    @endif
                                @else
                                    @if ($slang == 2)
                                        {{ $wishlist->product->name_ar }}
                                    @else
                                        {{ $wishlist->product->name }}
                                    @endif
                                @endif
                            </a>
                        </h4>
                        <ul class="stars">
                            <div class="ratings">
                                <div class="empty-stars"></div>
                                <div class="full-stars"
                                    style="width:{{ App\Models\Rating::ratings($wishlist->product->id) }}%"></div>
                            </div>
                        </ul>
                        <div class="price">
                            {{ $wishlist->product->showPrice() }}<small><del>{{ $wishlist->product->showPreviousPrice() }}</del></small>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach

</div>

@if (isset($sort))
    <div class="page-center category">
        {!! $wishlists->appends(['sort' => $sort])->links() !!}
    </div>
@else
    <div class="page-center category">
        {!! $wishlists->links() !!}
    </div>
@endif
<script type="text/javascript">
    $("#sortby").on('change', function() {
        var sort = $("#sortby").val();
        window.location = "{{ url('/user/wishlists') }}?sort=" + sort;
    });
</script>
