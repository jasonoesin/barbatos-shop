@extends('view-template')

@section('title',"Login")

@section('content')


<div class="w-full h-full flex flex-col justify-center items-center bg-gray-300">
        <div class="text-center bg-gray-200 w-[30rem] px-4 py-2 text-gray-800">Login</div>
        <form method="post" action="{{url('/login')}}" class="justify-center flex flex-col w-[30rem] max-h-[1rem]] bg-gray-100 p-4 overflow-hidden drop-shadow-lg">
            @csrf
            <div class="creds flex flex-col gap-4">
                <label class="flex flex-col gap-1">
                    <span class="">Email</span>
                    <input name="email" class="px-2 py-1 border border-gray-300 rounded" placeholder="Enter your email" type="email">
                </label>

                <label class="flex flex-col gap-1">
                    <span class="">Password</span>
                    <input name="password" class="px-2 py-1 border border-gray-300 rounded" placeholder="Enter your password" type="password">
                </label>

                <label class="flex gap-2">
                    <input type="checkbox">
                    Remember me
                </label>

                <div class="flex w-full justify-center">
                    <button class="border w-[8rem] px-2 py-1 rounded bg-white hover:bg-gray-200" type="submit">Login</button>
                </div>

                <div class="flex gap-1">
                    <p>
                        Don't have an account ?
                    </p>
                    <a href="" class="text-blue-500 underline">Register Here</a>
                </div>
            </div>
        </form>
</div>

@endsection
