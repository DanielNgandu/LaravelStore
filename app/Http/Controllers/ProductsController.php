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
        $products = DB::table('products')->paginate(10);
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        //
        $product = Product::findOrFail($id);

        //redirect to new page with success messages
        return view('products.show',["products"=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        //fetch product we want to delete by id

        $product = DB::table('products')->where('id',$id)->first();
//        dd($product);
        return view('products.edit',['products'=>$product]);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        //
        $product['product_name'] = $request->name;
        $product['product_code'] = $request->name;
        $product['details'] = $request->name;
        $product['product_name'] = $request->name;
        //check if request params have image
        //image upload logic here
        if($request->hasFile('image')){
            $date = date('dmy');
            $imageName = 'D'.$date.'T'.time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
            $product['logo']= $imageName;
        };

        //Logic end: save request params to our object
        $product = DB::table('products')->where('id',$id)->update($product);


        //redirect to new page with success messages
        return redirect('/products')

            ->with('success','You have successfully Updated  Product.')

            ->with('image',$imageName);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        //
        $product = Product::findOrFail($id);
        $product->delete();

        //redirect to new page with success messages
        return redirect('/products')

            ->with('success','You have successfully deleted a  Product.')
            ;
    }
}
