
@extends('view-template')

@section('title',"Home")

@section('content')

    @if(session('message'))

        <div class="rounded fixed bottom-2 right-2 px-6 py-3 z-[11] bg-white flex items-center gap-2 justify-center">
            <div class="rounded-[100rem] w-5 h-5 bg-green-400"></div>
            {{session('message')}}
        </div>
    @endif

<form action="/search">
    <input value="{{ app('request')->input('name') }}" name="name" placeholder="Search for products ..." class="w-full mb-3 rounded-sm p-3" type="text">
</form>

@if($category->contains('category', 'Electronics'))
<div class="bg-gray-200">
    <div class="px-4 py-2 bg-gray-400 text-white flex flex-row justify-between">
        Electronics
        <a href="{{url("/product/category/electronics")}}" class="">View All</a>
    </div>
    <div class="flex flex-wrap gap-3 p-2">
        @foreach($electronics as $p)
            <a href="{{url("/product/$p->id")}}" class="w-[10rem] max-h-[1rem]] p-4 bg-gray-100 drop-shadow-lg">
                <div class="h-[8rem]">
                <img src="{{ url("storage/images$p->file_path") }}" alt="Image"/>
                </div>
                <div class="whitespace-nowrap text-ellipsis overflow-hidden h-6">{{$p->name}}</div>
                <div class="">Rp {{$p->price}}</div>
            </a>
        @endforeach
    </div>

</div>

<br>
@endif


@if($category->contains('category', 'Provision'))
    <div class="bg-gray-200">
        <div class="px-4 py-2 bg-gray-400 text-white flex flex-row justify-between">
            Provision
            <a href="{{url("/product/category/provision")}}" class="">View All</a>
        </div>
        <div class="flex flex-wrap gap-3 p-2">
            @foreach($provision as $p)
                <a href="{{url("/product/$p->id")}}" class="w-[10rem] max-h-[1rem]] p-4 bg-gray-100 drop-shadow-lg">

                    <div class="h-[8rem]">
                     <img src="{{ url("storage/images$p->file_path") }}" alt="Image"/>
                    </div>
                    <div class="whitespace-nowrap text-ellipsis overflow-hidden h-6">{{$p->name}}</div>
                    <div class="">Rp {{$p->price}}</div>
                </a>
            @endforeach
        </div>

    </div>

    <br>
@endif

<br>



@if($category->contains('category', 'Fashion'))
    <div class="bg-gray-200">
        <div class="px-4 py-2 bg-gray-400 text-white flex flex-row justify-between">
            Fashion
            <a href="{{url("/product/category/fashion")}}" class="">View All</a>
        </div>
        <div class="flex flex-wrap gap-3 p-2">
            @foreach($fashion as $p)
                <a href="{{url("/product/$p->id")}}" class="w-[10rem] max-h-[1rem]] p-4 bg-gray-100 drop-shadow-lg">


                    <div class="h-[8rem]">
                        <img class="w-[10rem]" src="{{ url("storage/images$p->file_path") }}" alt="Image"/>
                    </div>

                    <div class="whitespace-nowrap text-ellipsis overflow-hidden h-6">{{$p->name}}</div>
                    <div class="">Rp {{$p->price}}</div>
                </a>
            @endforeach
        </div>

    </div>

    <br>
@endif


@endsection
