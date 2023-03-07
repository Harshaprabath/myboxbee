<div class="preview">
    
    @php
    $cartItems = ShoppingCart::content();
@endphp
    <div class="container px-2">
        <div class="row no-gutters">
            <div class="col">
                <div id="preview" style="font-size: 15px;font-weight: 700;">
                    <div class="row no-gutters">
                        <div class="col-lg-6 px-lg-3">
                            <div class="row no-gutters d-none d-lg-flex">
                                @foreach ($cartItems as $item)
                                <div class="col-2 px-2" id="{{$item->id}}">
                                    <div class="mb-3">
                                        <div class="embed-responsive embed-responsive-1by1">
                                            <div class="embed-responsive-item"><img class="w-100"
                                                    src="{{ asset('upload') }}/{{$item->options->image}}"></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                @foreach ($cartItems as $item)
                                <div class="row no-gutters">
                                    <div class="col px-lg-3">
                                        <div class="row no-gutters py-2">
                                            <div class="col-auto px-2">{{$item->qty}}</div>
                                            <div class="col px-2">{{$item->name}}</div>
                                        </div>
                                    </div>
                                    <div class="col-auto px-2 px-lg-4">LKR {{number_format($item->price, 2)}}</div>
                                    @if ($item->options->status2 == 'box')                                        
                                    <div class="col-auto text-muted"> <button class="remove text-danger" style="width:37px">&nbsp;
                                        </button></div>
                                        @else
                                        <div class="col-auto text-muted"> <button class="remove text-danger" style="width:37px" wire:click.prevent="removeItem('{{$item->rowId}}')"> <i class="fa fa-trash"></i>
                                        </button></div>
                                    @endif
                                </div>
                                @endforeach
                                <div class="m-3">
                                    <div class="row no-gutters">
                                        <div class="col px-2" style="font-size:20px"> Box total : </div>
                                        <div class="col-auto px-2 px-lg-5" style="Text-align:End;font-size:20px">LKR
                                            {{ShoppingCart::total()}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>