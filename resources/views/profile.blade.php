@extends('view-template')

@section('title',"Login")

@section('content')


<div class="w-full h-full flex flex-col justify-center items-center bg-gray-300">

    <div class="text-center bg-gray-200 w-[30rem] px-4 py-2 text-gray-800">Profile</div>
    <form method="post" action="{{url('/login')}}" class="justify-center flex flex-col w-[30rem] max-h-[1rem]] bg-gray-100 p-4 overflow-hidden drop-shadow-lg">
        @csrf
        <div class="creds flex flex-col gap-4">
            <label class="flex flex-col gap-1">
                <span class="">Name</span>
                <input disabled value={{auth()->user()->name}} name="" class="px-2 py-1 border border-gray-300 rounded" placeholder="Enter your email" type="email">
            </label>

            <label class="flex flex-col gap-1">
                <span class="">Email</span>
                <input disabled value={{auth()->user()->email}} name="" class="px-2 py-1 border border-gray-300 rounded" placeholder="Enter your password" type="text">
            </label>

            <label class="flex flex-col gap-1">
                <span class="">Gender</span>
                <input disabled value={{auth()->user()->gender}} name="" class="px-2 py-1 border border-gray-300 rounded" placeholder="Enter your email" type="email">
            </label>

            <label class="flex flex-col gap-1">
                <span class="">Date of Birth</span>
                <input disabled value={{auth()->user()->dob}} name="" class="px-2 py-1 border border-gray-300 rounded" placeholder="Enter your password" type="text">
            </label>

            <label class="flex flex-col gap-1">
                <span class="">Country</span>
                <input disabled value={{auth()->user()->country}} name="" class="px-2 py-1 border border-gray-300 rounded" placeholder="Enter your password" type="text">
            </label>
        </div>
    </form>
</div>

@endsection
