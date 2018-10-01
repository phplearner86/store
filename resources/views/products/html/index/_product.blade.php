<div class="col-md-4">
    <div class="card mb-4 shadow-sm" style="min-height: 95%">
        <img class="card-img-top" src="{{ $product->image }}" alt="Card image cap">
        <div class="card-body">
            <h6><b>{{ $product->name }}</b></h6>
            <p class="card-text text-xs">
                {{ $product->description }}
            </p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <span>{{ $product->present_price }}</span>
                </div>
    
                <form action="{{ route('carts.store', $product) }}" method="POST">
                    @csrf

                    <button type="submit">
                        <i class="fa fa-cart-plus"></i>
                    </button>
                </form>
                

            </div>
        </div>
    </div>
</div>
  