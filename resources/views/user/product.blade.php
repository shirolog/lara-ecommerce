
<div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Products</h2>
              <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
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
                </div>
              </div>
            </div>
          @endforeach

          <div class="d-flex justify-content-center">
            {!! $products->links() !!}
          </div>

        </div>
      </div>
    </div>