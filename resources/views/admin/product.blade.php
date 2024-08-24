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

                <form action="" method="post">
                @csrf
                    <div style="padding: 15px; display:flex; align-items:center; justify-content:center;">
                        <label for="title">Product title</label>
                        <input type="text" name="title" id="title" placeholder="Give a product title" required>
                    </div>

                    <div style="padding: 15px; display:flex; align-items:center; justify-content:center;">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" placeholder="Give a price" required>
                    </div>

                    <div style="padding: 15px; display:flex; align-items:center; justify-content:center;">
                        <label for="des">Description</label>
                        <textarea name="des" id="des" placeholder="Give a description" required></textarea>
                    </div>

                    <div style="padding: 15px; display:flex; align-items:center; justify-content:center;">
                        <label for="qty">Quantity</label>
                        <input type="number" name="qty" id="qty" placeholder="Product Quantity" required>
                    </div>

                    <div style="padding: 15px; width:200px">
                        <input type="file" name="file" id="file">
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