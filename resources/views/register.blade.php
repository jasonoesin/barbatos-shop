@extends('view-template')

@section('title',"Register")

@section('content')


<div class="w-full min-h-full flex flex-col justify-center items-center bg-gray-300 py-10 box-content pb-20">

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

    <div class="text-center bg-gray-200 w-[30rem] px-4 py-2 text-gray-800">Register</div>
    <form method="post" action="{{url('/register')}}" class="justify-center flex flex-col w-[30rem] bg-gray-100 p-4 drop-shadow-lg">
        @csrf
        <div class="creds flex flex-col gap-4">
            <label class="flex flex-col gap-1">
                <span class="">Name</span>
                <input name="name" class="px-2 py-1 border border-gray-300 rounded" placeholder="Enter your name" type="text
">
            </label>

            <label class="flex flex-col gap-1">
                <span class="">Email</span>
                <input name="email" class="px-2 py-1 border border-gray-300 rounded" placeholder="Enter your email" type="email">
            </label>

            <label class="flex flex-col gap-1">
                <span class="">Password</span>
                <input name="password" class="px-2 py-1 border border-gray-300 rounded" placeholder="Enter your password" type="password">
            </label>

            <label class="flex flex-col gap-1">
                <span class="">Confirm Password</span>
                <input name="confirm_password" class="px-2 py-1 border border-gray-300 rounded" placeholder="Re-type your password" type="password">
            </label>


            <div class="flex flex-col gap-1">
                Gender
                <label>
                    <input value="Male" name="gender" type="radio" >
                    Male
                </label>
                <label>
                    <input value="Female" name="gender" type="radio" >
                    Female
                </label>
            </div>

            <?php
                $date = new DateTime;
                date_sub($date, date_interval_create_from_date_string('1 days'));
                $date = date_format($date, 'Y-m-d');
            ?>

            <label class="flex flex-col">
                <span class="">Date of Birth</span>
                <input name="dob" min="1900-01-01" max="<?= $date ?>" class="px-2 py-1 border border-gray-300 rounded"  type="date">
            </label>


            <label for="country" class="flex flex-col">
                <span class="">Country</span>
                <select class="px-2 py-1 border border-gray-300 rounded" name="country" id="country">
                    <option value="Indonesia">Indonesia</option>
                    <option value="Singapore">Singapore</option>
                    <option value="Malaysia">Malaysia</option>
                    <option value="Thailand">Thailand</option>
                </select>
            </label>

            <div class="flex w-full justify-center">
                <button class="border w-[8rem] px-2 py-1 rounded bg-white hover:bg-gray-200" type="submit">Register</button>
            </div>

            <div class="flex gap-1">
                <p>
                    Have an account ?
                </p>
                <a href="{{url("/login")}}" class="text-blue-500 underline">Login Here</a>
            </div>


        </div>
    </form>
</div>

@endsection
