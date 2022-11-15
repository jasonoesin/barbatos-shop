
@extends('view-template')

@section('title',"Home")

@section('content')

<form action="/search">
    <input value="{{ app('request')->input('name') }}" name="name" placeholder="Search for products ..." class="w-full mb-3 rounded-sm p-3" type="text">
</form>

@if($category->contains('category', 'Electronics'))
<div class="bg-gray-200">
    <div class="p-2 bg-gray-400 text-white">
        Electronics
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
        <div class="p-2 bg-gray-400 text-white">
            Provision
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
        <div class="p-2 bg-gray-400 text-white">
            Fashion
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
