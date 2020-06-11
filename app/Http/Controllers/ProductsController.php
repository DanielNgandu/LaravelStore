<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //get data from db
        $products = DB::table('products')->get();
//        dd($product);
        return view('products.index',['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //Show view
        return view('products.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        //folder/file
        $data = request()->validate([
            'name' => 'required|min:5',
            'code' => 'required|min:2',
            'description' => 'required|min:5',
            'image' => 'required'
        ], [

            'name.required' => 'name is required',
            'code.required' => 'code is required',
            'description.required' => 'description is required',
            'image.required' => 'image is required',

        ]);


        //Logic start :save the data to the database
        $product  = new Product() ;
        $product->product_name = $request->name;
        $product->product_code = $request->code;
        $product->details = $request->description;
        //check if request params have image
        //image upload logic here
        if($request->hasFile('image')){
            $date = date('dmy');
            $imageName = 'D'.$date.'T'.time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
            $product->logo = $imageName;
            $product->save();
        };

        //Logic end: save request params to our object
        $product->save();


        //redirect to new page with success messages
        return redirect('/products')

            ->with('success','You have successfully added a new Product.')

            ->with('image',$imageName);
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
        //
    }
}
