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
    <!--============= Start breadvroumb =============-->
    <div class="breadvroumb_area" style="background-image: url({{ asset('assets/images/' . $gs->top_icon) }});">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <h1>
                        @if ($langg->rtl == 1)
                            {{ $cat->name_ar }}
                        @else
                            {{ $cat->name }}
                        @endif
                    </h1>
                    <div class="breadcroumb_link">
                        <a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }} </a>/ @if ($langg->rtl == 1)
                            {{ $cat->name_ar }}
                        @else
                            {{ $cat->name }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--============= End breadvroumb =============-->


    <!--=============start service-details =============-->
    <div class="service_details">
        <div class="container">
            <div class="image-layer">

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="service_details_wraper">
                        <img src="{{ asset('assets/images/categories/' . $cat->photo) }}"
                            alt="{{ $cat->name_ar }}">
                        <div class="text-p">
                            <p>
                                @if ($langg->rtl == 1)
                                    {{ $cat->name_ar }}
                                @else
                                    {{ $cat->name }}
                                @endif
                            </p>

                        </div>
                        <p>
                            @if ($langg->rtl == 1)
                                {!! $cat->details_ar !!}
                            @else
                                {!! $cat->details !!}
                            @endif
                        </p>






                    </div>
                </div>
                <div class="col-md-12">
                    <div class="section_title">
                        <h1>{{ $langg->lang36 }}!</h1>
                    </div>

                    <form id="email-form" class="contact_form" action="{{ route('front.contact.submit') }}" method="POST">

                        {{ csrf_field() }}
                        <div class="form-group w-100">
                            <div class="response w-100"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <input type="text" name="name" placeholder="{{ $langg->lang47 }}">
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <input type="email" name="email" placeholder="{{ $langg->lang49 }}">
                            </div>
                            <!-- <div class="col-lg-6 col-md-12">
                                        <div class="calender">
                                            <input type="text" placeholder="تاريخ الميلاد">
                                        </div>
                                    </div> -->
                        </div>
                        <div class="row">

                            <div class="col-lg-6 col-md-12">
                                <input type="text" name="phone" placeholder="{{ $langg->lang48 }}">
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <select class="custom-select-box" name="service" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->name }}">
                                            @if ($langg->rtl == 1)
                                                {{ $category->name_ar }}
                                            @else
                                                {{ $category->name }}
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                                <div class="nice-select" tabindex="0"><span class="current">{{ $langg->lang37 }}</span>
                                    <ul class="list">
                                        @foreach ($categories as $category)
                                            <li data-value="{{ $category->name }}" class="option">
                                                @if ($langg->rtl == 1)
                                                    {{ $category->name_ar }}
                                                @else
                                                    {{ $category->name }}
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                               
                                    <div class="col-lg-6 col-md-12">
                                        <div class="calender">
                                            <input type="text" placeholder="موعد الحضور">
                                        </div>
                                    </div>
                                </div> -->
                        <div class="row">
                            <div class="col">
                                <textarea name="text" placeholder="{{ $langg->lang50 }}"></textarea>
                            </div>
                        </div>
                        @if ($gs->is_capcha == 1)
                            <ul class="captcha-area">
                                <li>
                                    <p><img class="codeimg1" src="{{ asset('assets/images/capcha_code.png') }}"
                                            alt=""> <i class="fas fa-sync-alt pointer refresh_code"></i></p>

                                </li>
                                <li>
                                    <input name="codes" type="text" class="input-field"
                                        placeholder="{{ $langg->lang51 }}" required="">

                                </li>
                            </ul>
                        @endif

                        <input type="hidden" name="to" value="{{ $ps->contact_email }}">
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="custom_btn">{{ $langg->lang38 }}</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
    <!--=============End service-details =============-->

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
                        '<div class="text-info"><img src="{{ asset('assets/images/preloader.gif') }}"> Loading...</div>'
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
@stop
