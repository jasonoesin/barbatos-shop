
@extends('view-template')

@section('content')

<form action="/search">
    <input value="{{ app('request')->input('name') }}" name="name" placeholder="Search for products ..." class="w-full mb-3 rounded-sm p-3" type="text">
</form>

<div class="flex flex-wrap gap-3">
    @foreach($category as $cat)
        @if($cat->category == "Electronics")
            @foreach($electronics as $p)
                <a href="{{url("/product/$p->id")}}" class="w-[10rem] max-h-[1rem]] p-4 bg-gray-100 drop-shadow-lg">
                    <img src="{{ url("storage/images$p->file_path") }}" alt="Image"/>
                    <div class="whitespace-nowrap text-ellipsis overflow-hidden h-6">{{$p->name}}</div>
                    <div class="">Rp {{$p->price}}</div>
                </a>
            @endforeach
        @endif
    @endforeach
</div>

<br>

<div class="flex flex-wrap gap-1">
    @foreach($category as $cat)
        @if($cat->category == "Provision")
            @foreach($provision as $p)
                <div class="w-[10rem] max-h-[1rem]] bg-gray-300 p-4">
                    <img src="{{ url("storage/images$p->file_path") }}" alt="Image"/>
                    <div class="whitespace-nowrap text-ellipsis overflow-hidden h-6">{{$p->name}}</div>
                </div>
            @endforeach
        @endif
    @endforeach
</div>

<br>

<div class="flex flex-wrap gap-1">
    @foreach($category as $cat)
        @if($cat->category == "Fashion")
            @foreach($fashion as $p)
                <div class="w-[10rem] max-h-[1rem]] bg-gray-300 p-4">
                    <img src="{{ url("storage/images$p->file_path") }}" alt="Image"/>
                    <div class="whitespace-nowrap text-ellipsis overflow-hidden h-6">{{$p->name}}</div>
                </div>
            @endforeach
        @endif
    @endforeach
</div>

@endsection
