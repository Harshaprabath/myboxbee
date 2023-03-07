
<div class="container-fluid d-flex justify-content-center" id="container-wrapper">

@if($order->isEmpty())
<div>
    <img src="{{asset('img/empty.png')}}" alt="" >
</div>
    @else
<div class="col-lg-6">
    <div class="card mb-4">
        <div class="table-responsive p-3">
            <table class="table align-items-center table-flush" id="dataTable">
               
                <tbody>
                @foreach($order as $c)
                    
                    <tr>
                        
                        <td class="name" style="display: flex;"> 
                        <img src="{{asset('upload')}}/{{$c->item_image}}" alt="" width="100">
                        
                    </td>
                    <td class="name"><span style="background-color: #00000087;color: white;padding: 5px 21px;border-radius: 25px;">{{$c->status}}</span>  <br><br>
                            {{$c->status2}}<br>
                            {{$c->item_name}}<br>
                            {{$c->box_id}}<br>
                            @if($c->status2 == 'RTS' || $c->status2 == 'card')
                            To: {{$c->to}} <br>
                            From: {{$c->from}}<br>
                            Message: {{$c->message}}<br>
                            Font: {{$c->font}}
                            @else
                            @endif
                        </td>
                        <td class="name">{{$c->quantity}}</td>
                        <td class="name">{{$c->item_price}}</td>
                     
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endif