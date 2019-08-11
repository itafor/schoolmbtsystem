@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Term</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Term</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Cart</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                <a href="/empty-cart">  <button class="btn btn-sm btn-primary">Empty Cart</button></a>
                  <a href="/products">Products</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body  offset-1 col-md-12 ">
             <div class="row col-md-12">
               <div class="col-md-12">
                 
             
  @if(Cart::count() > 0)       
    <table class="table table-hover table-responsive">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Product</th>
      <th scope="col">Price</th>
      <th scope="col">quantity</th>
      <!-- <th scope="col">Actions</th> -->
    </tr>
  </thead>
  <tbody>
   
    <h2>{{Cart::count()}} Item(s) in shoping cart</h2>
      <tr>
@foreach(Cart::content() as $cart)
    <td><div class="image">
                 <img src="{{ asset('/upload/'.$cart->model->productImage) }}" alt="product-thumbnail" style="width: 50px; height: 50px;">
            </div></td>
      <td>{{$cart->name}}</td>
      <td>₦ {{$cart->model->price}}</td>
  <td>
  <select>
    <option value="{{$cart->qty}}">{{$cart->qty}}</option>
    <option value="1">1</option>
    <option value="3">2</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
  </select>
</td>
 <td>
 <!--  <a href=""><button class="btn btn-primary btn-sm">Remove</button></a> -->
 <form action="{{route('cart.destroy',$cart->rowId)}}" method="post" >
       <input type="hidden" name="_token" value="{{csrf_token()}}">
   {{method_field('DELETE')}}
<button type="submit" class="cart-options">Remove</button>
 </form>
</td>
<td>
<form action="{{route('cart.switchToSaveForLater',$cart->rowId)}}" method="post" >
       <input type="hidden" name="_token" value="{{csrf_token()}}">
<button type="submit" class="cart-options">Save for later</button>
 </form> 
</td>
    </tr> 
    @endforeach
  
   
  </tbody>
 
</table>
<table width="200" class="push-right offset-4">
  <tr>
    <td>Sub Total</td>
    <td>{{Cart::subtotal()}}</td>
  </tr>
  <tr>
    <td>Tax(24%)</td>
    <td> ₦ {{Cart::tax()}}</td>
  </tr>
  <tr>
    <td>Grand Total</td>
    <td>₦ {{Cart::total()}}</td>
  </tr>
</table>


<!-- paystack form -->
<form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
        <div class="row" style="margin-bottom:40px;">
          <div class="col-md-8 col-md-offset-2">
            <p>
                <div>
                    Total amount to pay
                    ₦ {{Cart::total()}}
                    {{auth::user()->email}}
                </div>
            </p>
            <input type="hidden" name="email" value="{{auth::user()->email}}"> {{-- required --}}
            <input type="hidden" name="orderID" value="345">
            <input type="hidden" name="amount" value="{{Cart::total()}}"> {{-- required in kobo --}}
            <input type="hidden" name="quantity" value="67">
            <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
            <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
            {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

             <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}


            <p>
              <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
              <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
              </button>
            </p>
          </div>
        </div>
</form>




 @else
     <tr>
   <td colspan="10">
   <h5>
     No Item in Card 
   </h5>
   <div class="spacer"></div>
   <a href="/products" class="button btn-success btn-lg"> Continue shopping</a>
   <div class="spacer"></div>

   @endif
   </td>
    </tr>



  </div>
 
 </div>
     
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card">
               
                <div class="card-body">
    @if(Cart::instance('saveForLater')->count() > 0)
                              
    <table class="table table-hover table-responsive">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Product</th>
      <th scope="col">Price</th>
      <th scope="col">quantity</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <h2>{{Cart::instance('saveForLater')->count() }} Item(s) saved for later <span class="btn-danger btn-sm" style="color:white;"><a href="{{route('cart.emptyItemSavedForLater')}}">Empty saved for later </a></span></h2>
      <tr>
@foreach(Cart::instance('saveForLater')->content() as $cart)
    <td><div class="image">
                 <img src="{{ asset('/upload/'.$cart->model->productImage) }}" alt="product-thumbnail" style="width: 50px; height: 50px;">
            </div></td>
      <td>{{$cart->name}}</td>
      <td>₦ {{$cart->model->price}}</td>
  <td>
  <select>
    <option value="{{$cart->qty}}">{{$cart->qty}}</option>
    <option value="1">1</option>
    <option value="3">2</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
  </select>
</td>

 <td>
 <!--  <a href=""><button class="btn btn-primary btn-sm">Remove</button></a> -->
 <form action="{{route('saveForLater.destroy',$cart->rowId)}}" method="post" >
       <input type="hidden" name="_token" value="{{csrf_token()}}">
   {{method_field('DELETE')}}
<button type="submit" class="cart-options">Remove</button>
 </form>
</td>
<td>
<form action="{{route('saveforlater.store',$cart->rowId)}}" method="post" >
       <input type="hidden" name="_token" value="{{csrf_token()}}">
<button type="submit" class="cart-options">move to cart</button>
 </form> 
</td>
    </tr> 
    @endforeach
  @else
  <h3>You have no item (s) saved for later</h3>
   @endif
  </tbody>
 
</table>
                </div>
              </div>
                         </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
     

        <!-- /.row -->

        <!-- Main row -->
      
        <!-- /.row -->
      </div><!--/. container-fluid -->

    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->
@endsection

@section('javascript')
<!-- jQuery -->
<script src="/dist/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Sparkline -->
<script src="/dist/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/dist/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/dist/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- Slimscroll -->
<script src="/dist/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.2 -->
<script src="/dist/plugins/chartjs-old/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>
@stop