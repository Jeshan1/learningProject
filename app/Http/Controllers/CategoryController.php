<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('admin.category.index',compact('category'));   
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'category'=>'required',
        ]);

        Category::create($data);
        return redirect(route('category.index'))->with('success','Data added successfully');
    }

    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));

    }

    public function update(Request $request,Category $id){
        $data = $request->validate([
            'category'=>'required',  
        ]);

        $id->update($data);
        return redirect(route('category.index'))->with('success','Data Updated Successfully!');
    }

    public function delete(Request $request){
        $product = Product::where('cat_id',$request->dataid)->count();
        if($product==0){
            Category::find($request->dataid)->delete();
            return redirect(route('category.index'))->with('success','Data Deleted Successfully!');
        }
        else{
            return redirect(route('category.index'))->with('error','Data not deleted!');
        }
        
    }
}
