<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    @include('admin.sidebar')
    
    @include('admin.navbar')
    <!-- partial -->

    
    <div class="container-fluid page-body-wrapper">

        <div class="container" align= "center">

        <table>
            <tr style="background: gray;">
                <th style="padding: 20px;">Cusomer name</th>
                <th style="padding: 20px;">Phone</th>
                <th style="padding: 20px;">Address</th>
                <th style="padding: 20px;">Product title</th>
                <th style="padding: 20px;">Price</th>
                <th style="padding: 20px;">Quantity</th>
                <th style="padding: 20px;">Status</th>
                <th style="padding: 20px;">Action</th>
            </tr>

            @foreach($orders as $order)
                <tr align="center" style="background:black;">
                    <td style="padding: 20px;">{{$order->name}}</td>
                    <td style="padding: 20px;">{{$order->phone}}</td>
                    <td style="padding: 20px;">{{$order->address}}</td>
                    <td style="padding: 20px;">{{$order->product_name}}</td>
                    <td style="padding: 20px;">${{$order->price}}</td>
                    <td style="padding: 20px;">{{$order->quantity}}</td>
                    <td style="padding: 20px;">{{$order->status}}</td>
                    <td style="padding: 20px;">
                        <form action="{{route('order.update', $order->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="delivered">
                            <input type="submit" class="btn btn-success" value="Deliverd"
                            onclick="return confirm('Change this status?');">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        </div>

    </div>
    <!-- partial -->

    @include('admin.script')
</html>