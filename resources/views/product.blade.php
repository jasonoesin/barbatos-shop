@extends('view-template')

@section('content')

<div class="w-full h-full flex justify-center items-center bg-gray-300">
        <form class="flex flex-row w-[50rem] max-h-[1rem]] bg-gray-100 p-4 overflow-hidden drop-shadow-lg">
            <div class="left flex justify-center items-center">
                <img class="max-w-[160px]" src="{{ url("storage/images$p->file_path") }}" alt="Image"/>
            </div>
            <div class="right p-3 flex flex-col gap-1">
                <div class="font-bold">{{$p->name}}</div>
                <div class="">{{$p->detail}}</div>
                <div class="">Rp {{$p->price}}</div>

                {{--If Logged In Customer--}}
                <input placeholder="Quantity" required class="px-4 py-1 w-[10rem] rounded" type="number" min="0">
                <button type="submit" class=" w-[8rem] text-white rounded-xl bg-blue-500 flex justify-center">Purchase</button>
                {{--If Logged In--}}
            </div>
        </form>
</div>

@endsection
