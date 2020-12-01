<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view('admin.products.index',compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view("admin.products.create",compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product=new Product();
        $product->item_code=$request->input("item_code");
        $product->name=$request->name;
        $product->description=$request->input("description");
        $product->unit_price=$request->input("unit_price");
        $product->stock=$request->input("stock");

        $product->save();

        $category=Category::find($request->category);
        $category->products()->save($product);

        $img=$request->file("productImage");
        $path=$img->move('images',$product->item_code.".png");
        
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::all();
        $product=Product::find($id);
        return view("admin.products.update",compact("product","categories"));
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
        $product=Product::find($id);
        $product->item_code=$request->input("item_code");
        $product->name=$request->name;
        $product->description=$request->input("description");
        $product->unit_price=$request->input("unit_price");
        $product->stock=$request->input("stock");
        $product->save();

        $category=Category::find($request->category);
        $category->products()->save($product);

        $img=$request->file("productImage");
        if($img != null){
          
            $path=$img->move('images',$product->item_code.".png");
        }
   
        
        return redirect()->route('products.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
        return redirect()->route("products.index");
    }
}
