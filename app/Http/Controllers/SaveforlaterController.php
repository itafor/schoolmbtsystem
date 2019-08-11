<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
class SaveforlaterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * switch from save to later to cart
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function switchToCart($id)
    {
        $item = Cart::instance('saveForLater')->get($id);
        Cart::instance('saveForLater')->remove($id);
 
        $duplicates= Cart::instance('default')->search(function($cartItem, $rowId) use ($id){
                return $rowId === $id;
        });

        if($duplicates->isNotEmpty()){
            return back()->with('success','Item is already in your cart');
    }

     Cart::instance('default')->add($item->id,$item->name,$item->qty,$item->price)
        ->associate('App\Product');

        return back()->with('success','Successfully moved to cart!!');
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
         Cart::instance('saveForLater')->remove($id);

        return back()->with('success','Item Successfully removed');
    }
}
