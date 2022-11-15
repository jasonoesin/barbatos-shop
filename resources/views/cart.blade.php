@extends('view-template')

@section('title',"Cart")



@section('content')
    <div class="flex flex-col items-center gap-2">
        @php
            $total = 0;
        @endphp


        @foreach($carts as $c)
            @php
            $p = $c->product;
            $total += $c->qty * $p->price;
            @endphp
                    <div class="product bg-gray-100 max-w-[40rem] w-[40rem] flex relative">


                        <img class="w-[10rem] h-[10rem] object-cover" src="{{ url("storage/images$p->file_path") }}" alt="Image"/>

                        <div class="flex flex-col">
                            <div class="p-4">{{$p->name}}</div>
                            <div class="px-4">{{$c->qty}} Total Quantity</div>

                            <div class="px-4">Total Price Rp. <?php echo number_format($c->qty * $p->price,0,',','.'); ?></div>
                        </div>



                        <div class="absolute right-4 top-4 flex gap-1">
                            <form action="{{route('cart.destroy', $c->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width={1.5} stroke="currentColor"
                                         class="cursor-pointer w-6 h-6 stroke-red-500 border border-red-200 p-1 box-content">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </form>

                        </div>
                    </div>
        @endforeach
    </div>
@endsection

@section('footer')
    <form method="post" action="{{route("history")}}" class= "gap-4 fixed bottom-0 left-0 z-10 w-full p-4 px-16 bg-white drop-shadow flex justify-center">
        @csrf
        <p>Total IDR : <?php echo number_format($total,0,',','.'); ?></p>
        <button class="px-2 bg-blue-300 rounded text-white">Purchase</button>
    </form>

    <div class="mt-10"></div>
@endsection
