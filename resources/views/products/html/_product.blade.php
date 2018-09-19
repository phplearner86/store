<div class="col-md-4">
    <div class="card mb-4 shadow-sm">
        <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">
        <div class="card-body">
            <h6><b>{{ $product->name }}</b></h6>
            <p class="card-text text-xs">
                {{ $product->description }}
            </p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <span>{{ $product->present_price }}</span>
                </div>
                <i class="fa fa-cart-plus"></i>
            </div>
        </div>
    </div>
</div>
  