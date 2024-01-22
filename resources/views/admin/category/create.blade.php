@extends('layouts.app')

@section('content')

<div class="px-24 py-10 ">
    <div class="text-center my-4">
        <h1 class="text-3xl font-bold text-blue-600">Category Should be record from below!</h1>
    </div>
    <div class="border-dashed px-10 py-10 border-teal-600 border-4 w-[60%] ml-[20%]">
       
            <form action="{{route('category.store')}}" method="POST">
                @csrf
                <div class="my-2">
                    <label for="catname" class="text-xl font-bold text-blue-600">Category Name</label>
                    <input type="text" name="category" id="catname" class="block w-full my-2">
                </div>
                <div class="my-3 text-center">
                    <button class="bg-blue-600 hover:bg-blue-800 text-xl rounded-xl text-white  font-bold px-4 py-2">Submit</button>
                    <button class="bg-red-600 hover:bg-red-800 px-4 py-2 rounded-xl text-xl text-white font-bold"><a href="{{route('category.index')}}">Exit</a></button>
                </div>
            </form>
    </div>
</div>
    
@endsection