<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title','A default title')</title>
    <meta name="keywords" content="@yield('meta_keywords','some default keywords')">
    <meta name="description" content="@yield('meta_description','default description')">
    <link rel="canonical" href="{{url()->current()}}"/>

    <title>laravel Crud Operation</title>

    {{-- animate.css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    {{-- remix icon --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    {{-- datatable scripts  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css" integrity="sha512-1k7mWiTNoyx2XtmI96o+hdjP8nn0f3Z2N4oF/9ZZRgijyV4omsKOXEnqL1gKQNPy2MTSP9rIEWGcH/CInulptA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- datatable script ends  --}}
     <!-- Scripts -->
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    {{-- navigation bar starts  --}}
    <div class="bg-blue-600 text-white px-24 py-3 z-10 fixed top-0 left-0 right-0" id="nav">
        <div class="flex justify-between">
            <div><a href="" class="text-white text-2xl font-bold">LaravelCrud</a></div>
            <div>
                <ul class="">
                    <li class="inline-block mx-4 text-xl font-semibold cursor-pointer"><a href="{{Route('category.index')}}">Category</a></li>
                    <li class="inline-block mx-4 text-xl font-semibold cursor-pointer"><a href="{{Route('product.index')}}">Product</a></li>
                </ul>
            </div>

        </div>

    </div>
    {{-- navigation bar ends  --}}
    <div class="w-full mt-20">
        @yield('content')

    </div>

    <div class="fixed right-10 bottom-12" id="goTop">
        <a href="#" class="bg-teal-400 text-white text-xl font-bold px-4 py-2 rounded-2xl">go</a>
    </div>

    {{-- footer section starts  --}}
    <div class="bg-blue-600 text-white px-24 py-10">
        <div class="my-3 px-36 bg-[#ec4c4c] rounded-2xl py-5 ">
            <hr class="px-36 border-4 border-teal-400">
            <h1 class="text-center text-xl font-bold mt-2 rounded-r-lg rounded-l-lg"><span class="text-teal-400 text-2xl font-bold">||</span> <span class="text-2xl font-bold text-white"> -- Designed By Jeshan Tiwari -- </span> <span class="text-teal-400 text-2xl font-bold"> ||</span> </h1>
        </div>
    </div>

    <script>
        $(document).ready( function () {
        $('#mytable').DataTable();
        });
    </script>

    <script>
        $(document).ready(function(){
            $(window).scroll(function(){
                if ($(this).scrollTop()<100) {
                    $('#goTop').hide()
                } else {
                    $('#goTop').show();
                }
            });
             
            $("#goTop").click(function() {
                $("html, body").animate({scrollTop: 0}, 400);
            });

        });

    </script>
    {{-- footer section ends  --}}
    
</body>
</html>
