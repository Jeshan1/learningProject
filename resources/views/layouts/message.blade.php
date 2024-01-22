@if(Session::has('success'))
<div class="animate__animated animate__slideInRight dismissible fixed right-8 top-10 z-50">
    <div class="w-auto">
        <p class="bg-blue-600 text-white px-4 py-2 text-xl font-bold rounded-xl border-l-4 border-l-blue-700"><span><i class="ri-check-double-line align-middle"></i></span>{{session('success')}}</p>
    </div>
    {{-- <div class="w-auto rounded-md p-2 shadow-lg bg-gray-100 dark:bg-gray-600">
        <p class="border-l-4 border-indigo-400 px-2 text-indigo-900 dark:text-indigo-300 font-bold"><i class="ri-check-line"></i></span> {{session('success')}}</p>
    </div> --}}
</div>
<script>
   $(function() {
        setTimeout(function(){
            $(".dismissible").addClass('animate__slideOutRight').fadeOut(1000);
        }, 2000);
   });

</script>
@endif



@if(Session::has('error'))
<div class="animate__animated animate__slideInRight dismissible fixed right-8 top-4 z-50">
    <div class="w-auto">
        <p class="bg-red-400 text-white px-4 py-2 text-xl font-bold rounded-xl border-l-4 border-l-red-4000"><span class="align-middle text-xl text-red-900 font-bold"><i class="ri-scissors-2-fill"></i>
        </span>{{session('error')}}</p>
    </div>
    {{-- <div class="w-auto rounded-md p-2 shadow-lg bg-gray-100 dark:bg-gray-600">
        <p class="border-l-4 border-red-500 px-2 text-red-500 dark:text-red-200 font-bold"><span class="bg-red-500 text-white px-2 py-0.5 rounded-full font-normal">X</span> {{session('error')}}</p>
    </div> --}}
</div>

<script>
   $(function() {
        setTimeout(function(){
            $(".dismissible").addClass('animate__slideOutRight').fadeOut(1000);
        }, 2000);
   });
</script>

@endif