@if(Auth::guard('admin')->check())

<option data-href="" value="">Select Sub Category</option>
@foreach($cat->subs as $sub)
<option data-href="{{ route('admin-childcat-load',$sub->id) }}" value="{{ $sub->id }}">{{ $langg->rtl == 1 ? $sub->name_ar : $sub->name }}</option>
@endforeach

@else 

<option data-href="" value="">Select Sub Category</option>
@foreach($cat->subs as $sub)
<option data-href="{{ route('vendor-childcat-load',$sub->id) }}" value="{{ $sub->id }}">{{  $langg->rtl == 1 ? $sub->name_ar : $sub->name }}</option>
@endforeach
@endif