@extends('view-template')

@section('title',"Add Product")

@section('content')

<div class="w-full h-[110vh] flex justify-center items-center bg-gray-300">
        <form enctype="multipart/form-data" method="post" action="{{url("./product")}}" class="flex flex-col gap-3 w-[50rem] max-h-[1rem]] bg-gray-100 p-4 overflow-hidden drop-shadow-lg">
            @csrf
            <div class="font-bold">Add Product</div>

            <div class="">Name</div>
            <input required name="name" class="px-2 border-2 border-gray-400" type="text">

            <div class="">Genre</div>
            <select required id="genre" class="px-2 border-2 border-gray-400" name="genre">
                <option value="Electronics" >Electronics</option>
                <option value="Provision">Provision</option>
                <option value="Fashion">Fashion</option>
            </select>

            <div class="">Description</div>

            <textarea required name="detail" class="p-2" id="" cols="30" rows="10"></textarea>

            <div class="">Price</div>
            <input min="1" name="price" required class="px-2 border-2 border-gray-400" type="text">

            <div class="">Photo</div>

            <input accept="image/*" type="file" name="file" id="file">

            <button type="submit" class="bg-gray-400 text-white px-4 py-2 w-[5rem]">Add</button>
        </form>
</div>

@endsection
