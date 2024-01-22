<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        foreach ($products as $product) {
            $product->cat_id = Category::find($product->cat_id)->category; 
        }
        return view('admin.product.index',compact('products'));
    }

    public function create(){
        $categories = Category::all();
        return view('admin.product.create',compact('categories'));
    }


    public function store(Request $request){
        $data = $request->validate([
            'title'=>'required',
            'photopath'=>'required',
            'description'=>'required',
            'cat_id'=>'required',
        ]);

        if($request->hasFile('photopath')){
	   	
            //file name with extentsion
            $filenameWithExt_image=$request->file('photopath')->getClientOriginalName();
            //only file name
            $filename_image=pathinfo($filenameWithExt_image,PATHINFO_FILENAME);
            //only extension
            $extension_image=$request->file('photopath')->getClientOriginalExtension();
            //file name to store
            $path=$filename_image.'_'.time().'.'.$extension_image;

            // $request->file('photopath')->storeAs('public/images/', $path);
            $request->file('photopath')->move('images/products/',$path);
            


            $data['photopath'] = $path;

        }

        Product::create($data);
        return redirect(route('product.index'))->with('success','Data Added Successfully!');
    }

    public function edit($id){
        $products = Product::find($id);
        $categories = Category::all();
        return view('admin.product.edit',compact('products','categories'));

    }

    public function update(Request $request,Product $id){
        $data = $request->validate([
            'title'=>'required',
            'description'=>'required',
            'cat_id'=>'required',
        ]);

        if($request->hasFile('photopath')){
	   	
            //file name with extentsion
            $filenameWithExt_image=$request->file('photopath')->getClientOriginalName();
            //only file name
            $filename_image=pathinfo($filenameWithExt_image,PATHINFO_FILENAME);
            //only extension
            $extension_image=$request->file('photopath')->getClientOriginalExtension();
            //file name to store
            $path=$filename_image.'_'.time().'.'.$extension_image;

            // $request->file('photopath')->storeAs('public/images/', $path);
            $request->file('photopath')->move('images/products/',$path);
            File::delete(public_path("images/products/".$id->photopath));


            $data['photopath'] = $path;

        }

            $id->update($data);
    
        return redirect(route('product.index'))->with('success',"Data Updated Successfully!");
    }

    public function delete(Request $request){
        $request['photopath'] = Product::find($request->dataid)->photopath;
        File::delete(public_path("images/products/".$request->photopath));
        Product::find($request->dataid)->delete();
        return redirect(route('product.index'))->with('success',"Data Deleted Successfully");

    }


}
