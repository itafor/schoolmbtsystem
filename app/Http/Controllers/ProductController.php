<?php

namespace App\Http\Controllers;

use App\Generalsetting;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $products = Product::inRandomOrder()->get();
       $fetchSettings=Generalsetting::find(1);

         return view('products',compact(['products','fetchSettings']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ShowProductForm()
    {
       $fetchSettings=Generalsetting::find(1);

        return view('admin.add-product',compact(['fetchSettings']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->productName = Input::get('productName');
        $product->price = Input::get('productPrice');
        $product->quantity = Input::get('productquantity');
        $product->save();
        
        if (Input::hasFile('productImage')) {
                 $fileName = $request->productImage->getClientOriginalName();
           $request->productImage->move(public_path('upload'),$fileName);
            $product->productImage =  $fileName;
            $product->save();
        }
        if($product){
          return back()->with('success','You have successfully added a new product');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd('update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
