<?php
use App\Http\Controllers\Frontend\CartController;

?>
@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ config('app.name') }}
        @endcomponent
    @endslot

    {{-- Body --}}
    <div>
    @foreach ($data as $d)
    <div style="margin:20px auto;width: 400px" >
      <div style="margin: auto;text-align: center">
      <p style="font-size: 18px"><b>{{$d->box_id}}</b></p>
      <p style="background-color: black;
      color: white;
      width: 10px;
      padding: 5px 8px 5px 8px;
      border-radius: 100%;
      position: absolute;
      margin: -7px 117px;
      box-sizing: content-box;">{{$d->quantity}}</p>
      <img src="{{asset('upload')}}/{{$d->item_image}}" alt="" width="150">
      <p style="font-size: 20px"> <b>{{$d->item_name}}</b> <br> LKR {{$d->item_price}}</p>
      @if ($d->status2 == 'card')
      <div style="text-align: st">
        <p>To : {{$d->to}} </p>  
        <p>From : {{$d->from}} </p>  
        <p>Message : {{$d->message}} </p>  
      </div>
      @endif
     <hr>
   </div>
    </div>
@endforeach
</div>
    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        @endcomponent
    @endslot
@endcomponent