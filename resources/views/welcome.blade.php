@section('content')
   
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
               
           
            </div>
            @extends('layouts.master') 
@include('layouts.navbar')
               <main>
<header>
    <div class="welcomeMsg"> 
                <div class="row">
                    <div class="students" [ngStyle]="studentsPix()" style="text-align: center;">
                      
                               <a  href="" style="text-align: center;"> Still under development</a>
                        
                    </div>
            </div>
        </div>
</header>
</main>
 @endif
@endsection
<!--           <div class="container">
  <div class="row">
    <div class="col">
      First, but unordered
    </div>
    <div class="col order-12">
      Second, but last
    </div>
    <div class="col order-1">
      Third, but first
    </div>
  </div>
  {{ route('login') }}
</div>  -->
   
</html>
