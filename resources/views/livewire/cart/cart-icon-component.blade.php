<li class="nav-item  btn_cart">
    @php
    $cartItems = ShoppingCart::content();
    @endphp
    <div class="dropdown">
        <a class="nav-link  bag position-relative cart-aln" href="/cart" style="display: flex;padding-right: 3rem">
            <div class="cart-items-count">{{ShoppingCart::content()->count()}}</div>
            <i class="fas fa-shopping-cart shopping-cart"></i>


            <div class="dropdown-menu dropdown-menu-right">
                @forelse($cartItems as $cartItem)
                <a class="dropdown-item" style="padding: 5px;">
                    <div class="d-flex align-items-start">
                        <div class="img cart-item-image">
                            <img src="{{ asset('upload') }}/{{ $cartItem->options->image }}" alt="">
                        </div>
                        <div class="cart-item-content">
                            <div class="item-name">{{ $cartItem->name}}</div>
                            <div class="price">LKR {{$cartItem->price}} X {{$cartItem->qty}}</div>
                        </div>
                    </div>

                </a>
                @empty
                <p>No items found</p>
                @endforelse
                <div class="cart-item-total">CART SUBTOTAL: <b>{{ShoppingCart::total()}}</b></div>
                <a href="/checkout"
                    class="dropdown-item border border-1 bg-primary text-white cart-item-checkout-btn">Chekcout</a>

            </div>


    </div>
</li>