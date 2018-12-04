@extends('layouts.main')

@section('content')

    @if ($cart->count())
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-end align-items-center mb-3">
                    <span class="badge badge-primary badge-pill">{{ $cart->count() }}</span>
                </h4>

                <ul class="list-group mb-3">
                    @foreach ($cart->items() as $item)
                        <li class="list-group-item d-flex justify-content-between">
                            <div>
                                <h6 class="my-0">{{ $item->game->name }}</h6>
                                <small class="text-muted">Quantity {{ $item->quantity }}</small>
                            </div>
                            <span>{{ currency($item->price) }}</span>
                        </li>
                    @endforeach

                    <li class="list-group-item d-flex justify-content-between">
                        <div>
                            <div>Subtotal</div>
                            <div>
                                <small>
                                    Tax
                                </small>
                            </div>
                            <span class="font-weight-bold">Total</span>
                        </div>
                        <div class="text-right">
                            <div>{{ currency($cart->subtotal()) }}</div>
                            <div>
                                <small>+8.75%</small>
                            </div>
                            <strong>{{ currency($cart->total()) }}</strong>
                        </div>
                    </li>
                </ul>

                <form class="card bg-secondary p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Redeem</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="align-items-center mb-3">
                    Your Cart
                </h4>

                @each('components.cart.game', $cart->items(), 'item')
            </div>
        </div>
    @else
        <h1>Oh no!</h1>
        <h5>
            Your cart is empty :(
            <p>True gamers love games! Add some to your cart.</p>
        </h5>

        <a href="{{ route('store') }}" class="btn btn-success">Shop Games Now</a>
    @endif

@endsection
