<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::with('category')->get();
        // dd( $products);
        return view('products.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::get();
        // dd( $products);
        return view('products.create', get_defined_vars());
        //return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'productName' => 'required|max:255',
            'purchases' => 'required',
            'sales' => 'required',
        ]);
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->productName = $request->productName;
        $product->purchases = $request->purchases;
        $product->sales = $request->sales;
        $product->save();
   

   return redirect('/products') ;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $product = Product::with('category')->find($id);
        // dd($products);
        $categorys = Category::get();
         
        return view('products.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
         
        $product->category_id = $request->category_id;
        $product->productName = $request->productName;
        $product->purchases = $request->purchases;
        $product->sales = $request->sales;
        $product->update();
   


   return redirect('/products') ;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'supplier deleted successfully');
    }

    public function checkProduct(Request $request){
        $productName = $request->input('productName');
        $isExists = Product::where('productName',$productName)->first();
        if($isExists){
            return response()->json(array("exists" => true));
        }else{
            return response()->json(array("exists" => false));
        }
    }


}
