<?php
 use App\Models\slider;
   $logo = slider::where('type','=','logo')->get();
?>
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'BoxBee')
<img src="{{asset('upload/frontend')}}/{{$logo[0]->image}}" class="logo" alt=" Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
