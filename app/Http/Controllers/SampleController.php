<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use App\Models\Product;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $samples=Sample::with('product')->get();
        return view('samples.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $samples = Product::get();
        return view('samples.create', get_defined_vars());

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
            'name' => 'required|unique:samples|max:255',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $sample = new Sample();
        $sample->name=$request->name;
        $sample->email=$request->email;
        $sample->phone=$request->phone;
        $sample->product_id=$request->product_id;

        $sample->save();


        return redirect('/samples');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function show(Sample $sample)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $samples = Sample::with('product')->find($id);
        $products = Product::get();
        return view('samples.edit', get_defined_vars());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sample = Sample::findOrFail($id);
        $sample->name=$request->name;
        $sample->email=$request->email;
        $sample->phone=$request->phone;
        $sample->product_id=$request->product_id;

        
        $sample->update();


        return redirect('/samples');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sample $sample)
    {
        $sample->delete();
        return redirect()->route('samples.index')
        ->with('success', 'sample deleted successfully');    
    }

    public function checksample(Request $request){
        $email = $request->input('email');
        $isExists = Sample::where('email',$email)->first();
        if($isExists){
            return response()->json(array("exists" => true));
        }else{
            return response()->json(array("exists" => false));
        }
    }



}
