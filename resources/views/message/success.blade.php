@if(session()->has('success') )
        <div class="alert alert-dismissible  alert-success" style="margin-bottom:-50px;margin-top:5px; width: 500px; margin-left: 500px;">
            <button   type="button" class="close" data-dismiss="alert">X</button>
               <span aria-hidden="true">&times;</span>
            <strong>
        {!!session()->get('success')!!}
    </strong>
</div>
@endif
<!-- 
@if(Session::has('success'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
@endif -->

 <!-- Session::flash('success', 'This is a message!'); 
 Session::flash('alert-class', 'alert-success'); -->
