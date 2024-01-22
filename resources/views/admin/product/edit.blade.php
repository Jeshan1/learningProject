@extends('layouts.app')

@section('content')

<div class="px-24 py-10 ">
    <div class="text-center my-4">
        <h1 class="text-3xl font-bold text-blue-600">Product Should be edited from below!</h1>
    </div>
    <div class="border-dashed px-10 py-10 border-teal-600 border-4 w-[60%] ml-[20%] rounded-3xl">
            <form action="{{route('product.update',$products->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="my-2">
                    <label for="proname" class="text-xl font-bold text-blue-600">Product Name</label>
                    <input type="text" name="title" id="proname" class="block w-full my-2" value="{{$products->title}}">
                </div>

                <div class="my-2">
                    <p class="mt-1"><input type="file"  accept="image/*" name="photopath" id="file"  onchange="loadFile(event)" style="display: none;"></p>
                    <p class="card shadow"><img src="{{asset('images/products/'.$products->photopath)}}" id="output" width="246" class="max-h-full" /></p>
                    <p class="mt-5"><label for="file" style="cursor: pointer;" class="bg-indigo-600 hover:bg-indigo-800 rounded-lg text-gray-100 p-2">Select Picture</label></p>
                </div>

                <div class="my-2">
                    <label for="desc" class="text-xl font-bold text-blue-600">Product Description</label>
                    <textarea type="text" name="description" id="desc" class="block w-full my-2">{{$products->description}}</textarea>
                </div>

                <div class="my-2">
                    <label for="cat_id" class="text-xl font-bold text-blue-600">Category</label>
                    <select name="cat_id" id="cat_id" class="block w-full my-2">
                        @foreach ($categories as $cat)
                           <option value="{{$cat->id}}">{{$cat->category}}</option> 
                        @endforeach
                    </select>        
                </div>

                <div class="my-3 text-center">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-800 text-xl rounded-xl text-white  font-bold px-4 py-2">Submit</button>
                    <button class="bg-red-600 hover:bg-red-800 px-4 py-2 rounded-xl text-xl text-white font-bold"><a href="{{route('product.index')}}">Exit</a></button>
                </div>
            </form>
    </div>
</div>
    
@endsection