@extends('view-template')

@section('content')

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <script src="{{ asset('js/app.js') }}"></script>

    <style>
        .pagination
        {
            margin-top: 1rem;
            display: flex;
        }

        .pagination > * {
            border: 1px solid lightgray;
            background-color: white;
            padding: 0.25rem 0.75rem;
            color: lightskyblue;
        }

        .active{
            background-color: lightskyblue;
            color: white;
        }
    </style>
</head>
<body>



<div class="flex flex-wrap gap-3">
    @foreach($products as $p)
        <a href="{{url("/product/$p->id")}}" class="w-[10rem] max-h-[1rem]] p-4 bg-gray-100 drop-shadow-lg">
            <img src="{{ url("storage/images$p->file_path") }}" alt="Image"/>
            <div class="whitespace-nowrap text-ellipsis overflow-hidden h-6">{{$p->name}}</div>
            <div class="">Rp {{$p->price}}</div>
        </a>
    @endforeach
</div>


{{$products->links()}}

</body>
</html>

@endsection
