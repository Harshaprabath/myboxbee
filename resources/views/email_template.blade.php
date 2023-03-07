@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ config('app.name') }}
        @endcomponent
    @endslot

    {{-- Body --}}
    This is your logo 
    ![Some option text][logo]
    [logo]: {{asset('img/my-logo.png')}} "Logo"  

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

<!DOCTYPE html>
{{-- <html lang="en">
   <?php
   use App\Http\Controllers\Frontend\CartController;
   use App\Models\slider;
   $logo = slider::where('type','=','logo')->get();
   ?>
<body>
   <div>
      <div style="margin:auto;width: 200px">
         <img src="{{asset('upload/frontend')}}/{{$logo[0]->image}}" alt="">
      </div>
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
            margin: -7px 117px;">{{$d->quantity}}</p>
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
   <h1>Hi</h1>
   <h1>c</h1> 
</body>
</html> --}}