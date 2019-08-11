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
                <h5 class="card-title">Products</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                <a href="/product/add">  <button class="btn btn-sm btn-primary">Add Product</button></a>
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body col-md-12 ">
             <div class="row col-md-12">
               <div class="col-md-12">
                 
             
            
                     <table class="table table-hover table-responsive">
  <thead>
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Product Images</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @if(count($products) >=1)
    <tr>
@foreach($products as $product)
      <td>{{$product->productName}}</td>
      <td>{{$product->price}}</td>
      <td><div class="image">
                <img src="/upload/{{$product->productImage}}" class="img-circle elevation-4" alt="Product Image" style="width: 50px; height: 50px;">

            </div></td>
  <td>
  
 <!--  <a href=""><button class="btn btn-primary btn-sm">Add to Cart</button></a> -->
   <form action="{{route('cart.store')}}" method="POST"  novalidate>
       <input type="hidden" name="_token" value="{{csrf_token()}}">
       <input type="hidden" name="id" value="{{$product->id}}">
       <input type="hidden" name="productName" value="{{$product->productName}}">
      Qty: <input type="text" name="quantity" value="{{$product->quantity}}"  style="width:50px; height: 20px;">
       <input type="hidden" name="price" value="{{$product->price}}">
 <div class="col-md-3 my-3">
        <button class="btn btn-primary btn-sm" type="submit">Add to Cart</button>
      </div>
      </form>
</td>
<td>
  <div class="col-md-3 my-3">
  <button class="btn btn-success btn-sm"> Save for later</button>
</div>
</td>
    </tr> 
    @endforeach

   @else
     <tr>
   <td colspan="10">
   <h5>
     No Products found
   </h5>
   @endif
   </td>
    </tr>
    <tr  rowspan="10">
     <td>
        
     </td>
   </tr>
  </tbody>
 
</table>

  </div>
 
 </div>
     
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
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