
<div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Products</h2>
              <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>

              <form action="{{route('product.search')}}" method="get" class="form-inline" style="float:right; padding: 10px;">
                @csrf
                <input type="search" name="search" class="form-control" placeholder="seacrch">
                <input type="submit" value="Search" class="btn btn-success">
              </form>
            </div>
          </div>

          @foreach($products as $product)
            <div class="col-md-4">
              <div class="product-item">
                <a href="#"><img height="300" width="150" style="object-fit: contain;" src="{{Storage::url($product->image)}}" alt=""></a>
                <div class="down-content">
                  <a href="#"><h4>{{$product->title}}</h4></a>
                  <h6>${{$product->price}}</h6>
                  <p>{{$product->description}}</p>

                  <form action="{{route('product.store', $product->id)}}" method="post">
                    @csrf
                    <input type="number" name="quantity" class="form-control mb-4" value="1" min="1" style="width: 100px;">
                    <input type="submit" class="btn btn-primary" value="Add Cart">
                  </form>
                </div>
              </div>
            </div>
          @endforeach

          @if(method_exists($products, 'links'))
            <div class="d-flex justify-content-center">
              {!! $products->links() !!}
            </div>
          @endif
        </div>
      </div>
    </div>