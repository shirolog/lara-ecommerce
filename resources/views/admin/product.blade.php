<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style type="text/css">
        
        .title{
            color: white; 
            padding-top:25px;
            font-size:25px;
        }


        label{
            display: inline-block;
            width: 200px;
        }
    </style>
  </head>
  <body>
      <!-- partial -->
        @include('admin.sidebar')

        @include('admin.navbar')

        <div class="container-fluid page-body-wrapper">

            <div class="container" align= "center">
                <h1 class="title">Add product</h1>

                @if($message = Session::get('message'))

                <div class="alert alert-success" style="padding: 15px; width:80%; border-radius: 5px">

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                     style="float: right;"></button>
                    {{$message}}
                </div>

                @endif

                <form action="{{route('produt.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div style="padding: 15px; display:flex; align-items:center; justify-content:center;">
                        <label for="title">Product title</label>
                        <input type="text" style="color: black;" name="title" id="title" placeholder="Give a product title" required>
                    </div>

                    <div style="padding: 15px; display:flex; align-items:center; justify-content:center;">
                        <label for="price">Price</label>
                        <input type="number" style="color: black;" name="price" id="price" placeholder="Give a price" required>
                    </div>

                    <div style="padding: 15px; display:flex; align-items:center; justify-content:center;">
                        <label for="des">Description</label>
                        <textarea name="description" id="des" style="color: black;" placeholder="Give a description" required></textarea>
                    </div>

                    <div style="padding: 15px; display:flex; align-items:center; justify-content:center;">
                        <label for="qty">Quantity</label>
                        <input type="number" name="quantity" style="color: black;" id="qty" placeholder="Product Quantity" required>
                    </div>

                    <div style="padding: 15px; width:200px">
                        <input type="file" name="image" id="" accept="image/jpg, image/png, image/jpeg">
                    </div>


                    <div style="padding: 15px; display:flex; align-items:center; justify-content:center;">
                        <input type="submit" class="btn btn-success" value="submit">
                    </div>
                </form>
            </div>
        </div>
        <!-- partial -->


        @include('admin.script')
</html>