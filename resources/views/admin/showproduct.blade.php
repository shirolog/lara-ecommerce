<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
      @include('admin.sidebar')
      
      @include('admin.navbar')
      <!-- partial -->

      
        <div style="padding-bottom: 30px;" class="container-fluid page-body-wrapper">

            <div class="container" align= "center">

                                
                @if($message = Session::get('message'))

                    <div class="alert alert-success" style="padding: 15px; width:80%; border-radius: 5px">

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                        style="float: right;"></button>
                        {{$message}}
                    </div>

                @endif

                <table>
                    <tr style="background: gray;">
                        <td style="padding: 20px;">Title</td>
                        <td style="padding: 20px;">Description</td>
                        <td style="padding: 20px;">Quantity</td>
                        <td style="padding: 20px;">Price</td>
                        <td style="padding: 20px;">Image</td>
                        <td style="padding: 20px;">Update</td>
                        <td style="padding: 20px;">Delete</td>
                    </tr>

                    @foreach($products as $product)
                        <tr align:center; style="background: black; text-align:center;">
                            <th>{{$product->title}}</th>
                            <th>{{$product->description}}</th>
                            <th>{{$product->quantity}}</th>
                            <th>${{$product->price}}</th>
                            <th><img src="{{Storage::url($product->image)}}" height="100px" width="100px"></th>
                            <th><a href="{{route('product.edit', $product->id)}}" class="btn btn-primary">Update</a></th>
                            <form action="{{route('produt.destroy', $product->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <th><button type="submit" class="btn btn-danger" 
                                onclick="return confirm('delete this product?')">Delete</button></th>
                            </form>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <!-- partial -->


        @include('admin.script')
</html>