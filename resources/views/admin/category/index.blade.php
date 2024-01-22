@extends('layouts.app')

@section('content')

@include('layouts.message')

    <div class="px-24 ">
        <button class="bg-teal-300 text-black px-4 py-2 rounded-lg text-xl font-bold"><a href="{{Route('category.create')}}">Add Category</a></button>
    </div>

<div class="my-10 px-24">
    <table id="mytable" class="display">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Category Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($category as $cat)
           <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$cat->category}}</td>
            <td class="text-center">
                <button><a href="{{route('category.edit',$cat->id)}}" class="bg-blue-600 hover:bg-blue-800 rounded-lg text-white text-lg font-bold px-4 py-2">Edit</a></button>
                <a class="bg-red-600 cursor-pointer hover:bg-red-800 rounded-lg text-white text-lg font-bold px-4 py-2" onclick="deletedata({{$cat->id}})">Delete</a>
            </td>
        </tr>        
           @endforeach     
        </tbody>
    </table>
</div>

  {{-- modal starts  --}}
  <div id="deletemodal" class="fixed hidden right-0 left-0 top-0 bottom-0 backdrop-blur-md">
    <div class="bg-white rounded-lg p-4 mx-auto my-auto">
        <h2 class="p-6 text-3xl">Are you sure to Delete</h2>
        <form action="{{route('category.delete')}}" method="POST" class="text-center p-6">
        @csrf
        @method('DELETE')
        <input type="hidden" id="dataid" name="dataid">
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow-lg">Yes</button>
        <a onclick="hidemodal()" class="bg-red-600 text-white px-6 py-2 rounded-lg shadow-lg">No</a>
        </form>
    </div>
</div>


{{-- for modal  --}}
<script>
    function deletedata($myvar){
        $('#deletemodal').removeClass('hidden');
        $('#deletemodal').addClass('flex');
        $('#dataid').val($myvar);
        
    }

    function hidemodal(){
        $('#deletemodal').removeClass('flex');
        $('#deletemodal').addClass('hidden');
    }
</script>


    
@endsection
