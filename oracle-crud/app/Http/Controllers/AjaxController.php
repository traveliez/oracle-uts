<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class AjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Tampil
    public function index()
    {
        $products = Product::orderBy('productid','asc')->paginate(8);

        return view('ajax-crud', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //Insert Into
    public function store(Request $request)
    {
        $product = new Product;
        $product->productname = $request->productname;
        $product->category = $request->category;
        $product->buyprice = $request->buyprice;
        $product->sellprice = $request->sellprice;
        $product->description = $request->description;
        $product->save();
    
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product  = Product::where(['productid' => $id])->first();
 
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\a  $a
     * @return \Illuminate\Http\Response
     */

     //Update
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->productname = $request->productname;
        $product->category = $request->category;
        $product->buyprice = $request->buyprice;
        $product->sellprice = $request->sellprice;
        $product->description = $request->description;
        $product->save();

        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Delete
    public function destroy($id)
    {
        $product = Product::where('productid',$id)->delete();;
   
        return response()->json($product);
    }
}
