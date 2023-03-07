<style>
    .vis{
        display: none;
    }
</style>
<div class="container-fluid d-flex justify-content-center" id="container-wrapper">

    @if($order->isEmpty())
<div>
    <img src="{{asset('img/empty.png')}}" alt="" >
</div>
    @else
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <div style="justify-content: end;display: flex;">
                   <button class="btn btn-dark  my-2" id="track">Track Order</button>
                   </div>
                   <br>
                    <tbody>
                    @foreach($order as $c)
                        
                        <tr>
                            
                            <td class="name" style="display: flex;"> 
                            <img src="{{asset('upload')}}/{{$c->item_image}}" alt="" width="100">
                            
                            <td class="name" style="vertical-align: middle;"><span style="background-color: #00000087;color: white;padding: 5px 21px;border-radius: 25px;">{{$c->status}}</span>  <br><br>
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
                            <td class="name" style="vertical-align: middle;">{{$c->quantity}}</td>
                            <td class="name" style="vertical-align: middle;">{{$c->item_price}}</td>
                            <td class="track hidden" style="vertical-align: middle;">
                            @if($c->action == '0')
                            <span style="border: 3px solid red;border-radius: 25px;padding: 5px 15px;">Cancel</span>
                            @elseif($c->action == '1')
                            <span style="border: 3px solid blue;border-radius: 25px;padding: 5px 15px;">Pending..</span>
                            @elseif($c->action == '2')
                            <span style="border: 3px solid orange;border-radius: 25px;padding: 5px 15px;">Process</span>
                            @elseif($c->action == '3')
                            <span style="border: 3px solid green;border-radius: 25px;padding: 5px 15px;">Completed</span>
                            @endif
                        </td>
                         
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
 @endif
<script>
$('#track').click(function(){

    $('.track').removeClass('hidden');
})
</script>