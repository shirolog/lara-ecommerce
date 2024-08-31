<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Sixteen Clothing HTML Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

    <!-- font awesome cdn -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <style>
        
      .btn-close {
        box-sizing: content-box;
        width: 1em;
        height: 1em;
        padding: 0.25em 0.25em;
        color: #000;
        background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000'%3e%3cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/%3e%3c/svg%3e") center/1em auto no-repeat;
        border: 0;
        border-radius: 0.25rem;
        opacity: 0.5; }
        .btn-close:hover {
          color: #000;
          text-decoration: none;
          opacity: 0.75; }
        .btn-close:focus {
          outline: 0;
          box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
          opacity: 1; }
        .btn-close:disabled, .btn-close.disabled {
          pointer-events: none;
          user-select: none;
          opacity: 0.25; }
    </style>

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2>Sixteen <em>Clothing</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="" id="navbarResponsive" >
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.html">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="products.html">Our Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact Us</a>
              </li>
                
                <li class="nav-item">
                    @if(Route::has('login'))
                            @auth

                              <li class="nav-item">
                                <a class="nav-link" href="{{route('cart.show')}}"><i class="fas fa-shopping-cart"></i> Cart[{{$count}}]</a>
                              </li>
                              
                              <x-app-layout>
                   
                              </x-app-layout>
                            @else
                                <li><a href="{{ route('login') }}" class="nav-link">Log in</a></li>

                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                                @endif
                            @endauth
                    @endif
                </li>
            </ul>
          </div>
        </div>
      </nav>
      @if($message = Session::get('message'))

        <div class="alert alert-success" style="padding: 15px; width:100%; border-radius: 5px">
            {{$message}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
            style="float: right;"></button>
        </div>
      @endif
    </header>
    
    <div style="padding: 100px;" align="center" class="mt-2">
        <table>
            <tr style="background: black;">
                <th style="padding: 10px; font-size:20px; color:white;">Product Name</th>
                <th style="padding: 10px; font-size:20px; color:white;">Quantity</th>
                <th style="padding: 10px; font-size:20px; color:white;">Price</th>
                <th style="padding: 10px; font-size:20px; color:white;">Action</th>
            </tr>
            @foreach($cart as $cartItem)
                <tr style="background: black;">
                    <td style="padding: 10px; color:white;">
                        {{$cartItem->product_title}}
                    </td>
                    <td style="padding: 10px; color:white;">
                        {{$cartItem->quantity}}
                    </td>
                    <td style="padding: 10px; color:white;">
                        ${{$cartItem->price}}
                    </td>
                    <td style="padding: 10px; color:white;">
                        <form action="{{route('cart.destroy', $cartItem->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this product?');">Delete</button>
                        </form>
                    </td>                
                </tr>
      
            @endforeach    
        </table>
        <form action="{{route('order.store')}}" method="post">
            @csrf
            @foreach($cart as $cartItem)
                <input type="hidden" name="product_name[]" value="{{$cartItem->product_title}}">
                <input type="hidden" name="quantity[]" value="{{$cartItem->quantity}}">
                <input type="hidden" name="price[]" value="{{$cartItem->price}}">
            @endforeach
    
            <button type="submit" class="btn btn-success mt-2"
              @if(count($cart) < 1) disabled @endif>Confirm Order
            </button>        
      </form>
    </div>



    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>



    <!-- <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script> -->


  </body>

</html>
