@extends('view-template')

@section('title',"Update Product")

@section('content')

<div class="w-full h-[110vh] flex justify-center items-center bg-gray-300 gap-4 flex-col">
    <div class="w-[50rem]">
        <a href="{{url("./product/manage")}}" class="bg-gray-400 w-fit  px-4 py-2">
            Back
        </a>
    </div>

    {{--  if Error Exists --}}
    @if ($errors->any())
        <div class="bg-red-300 w-[30rem] mb-5 rounded px-4 py-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form enctype="multipart/form-data" method="post" action="{{route("product.update", $p->id)}}" class="flex flex-col gap-3 w-[50rem] max-h-[1rem]] bg-gray-100 p-4 overflow-hidden drop-shadow-lg">
            @csrf
            @method('PUT')
            <div class="font-bold">Update Product</div>
            <div class="">Name</div>
            <input required name="name" value="{{$p->name}}" class="px-2 border-2 border-gray-400" type="text">

            <div class="">Genre</div>
            <select required id="genre" class="px-2 border-2 border-gray-400" name="genre">
                <option {{$p->category == "Electronics" ? "selected" : null}} value="Electronics" >Electronics</option>
                <option {{$p->category == "Provision" ? "selected" : null}} value="Provision">Provision</option>
                <option {{$p->category == "Fashion" ? "selected" : null}} value="Fashion">Fashion</option>
            </select>

            <div class="">Description</div>

            <textarea required name="detail" class="p-2" id="" cols="30" rows="10">{{$p->detail}}</textarea>

            <div class="">Price</div>
            <input name="price" required value="{{$p->price}}" class="px-2 border-2 border-gray-400" type="text">

            <div class="">Photo</div>

            <input accept="image/*" type="file" name="file" id="">

            <button type="submit" class="bg-gray-400 text-white px-4 py-2 w-[5rem]">Update</button>
        </form>
</div>

@endsection
