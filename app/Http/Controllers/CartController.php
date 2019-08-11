<?php

namespace App\Http\Controllers;

use App\Generalsetting;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $fetchSettings=Generalsetting::find(1);

        return view('fees.cart',compact(['fetchSettings']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $duplicates= Cart::search(function($cartItem, $rowId) use ($request){
                return $cartItem->id === $request->id;
        });

        if($duplicates->isNotEmpty()){
            return back()->with('success','Item has already been added to cart');
        }

        Cart::add($request->id,$request->productName,$request->quantity,$request->price)
        ->associate('App\Product');

        return back()->with('success','Successfully added to cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success','Item Successfully removed');
    }

    public function emptyCart(){
        Cart::destroy();
        return redirect()->route('cart.index')->with('success','Cart Successfully emptied');
    }


 public function emptyItemSavedForLater(){
        Cart::instance('saveForLater')->destroy();
        return redirect()->route('cart.index')->with('success','saveForLater Successfully emptied');
    }
     /**
     * Items to save for later
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToSaveForLater($id)
    {

       $item = Cart::get($id);
        Cart::remove($id);
 
        $duplicates= Cart::instance('saveForLater')->search(function($cartItem, $rowId) use ($id){
                return $rowId === $id;
        });

        if($duplicates->isNotEmpty()){
            return back()->with('success','Item has already been saved for later');
        } 


        Cart::instance('saveForLater')->add($item->id,$item->name,$item->qty,$item->price)
        ->associate('App\Product');

        return back()->with('success','Successfully saved for later');
    }

}
