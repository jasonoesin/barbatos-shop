@extends('view-template')

@section('title',"Product")

@section('content')

{{-- Set Query Params for Current Product--}}

@if($p)
<div class="w-full h-full flex justify-center items-center bg-gray-300">
        <form method="post" action="{{url("/cart")}}" class="flex flex-row w-[50rem] max-h-[1rem]] bg-gray-100 p-4 overflow-hidden drop-shadow-lg">
            @csrf
            <div class="left flex justify-center items-center">
                <img class="max-w-[160px]" src="{{ url("storage/images$p->file_path") }}" alt="Image"/>
            </div>
            <div class="right p-3 flex flex-col gap-1">

                @if(auth()->check())
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                @endif


                <input type="hidden" name="product" value="{{$p->id}}">


                <div class="font-bold">{{$p->name}}</div>
                <div class="">{{$p->detail}}</div>
                <div class="">Rp {{$p->price}}</div>


                @if(Auth::check())
                {{--If Logged In --}}
                    <input name="qty" placeholder="Quantity" required class="px-4 py-1 w-[10rem] rounded" type="number" min="0">
                    <button type="submit" class=" w-[8rem] text-white rounded-xl bg-blue-500 flex justify-center">Purchase</button>
                {{--If Logged In--}}
                @endif
            </div>
        </form>
</div>
@elseif($p == null)
    <div class="w-full h-full flex justify-center items-center bg-gray-300">
        <div class="flex flex-row w-[50rem] max-h-[1rem]] bg-gray-100 p-4 overflow-hidden drop-shadow-lg">
            <h1 class="font-bold">No Product Found ...</h1>
        </div>
    </div>
@endif

@endsection
