@extends('view-template')

@section('title',"Cart")



@section('content')
    <div class="flex flex-col items-center gap-2">


        @foreach($histories as $h)
            @php
                $total = 0;
                $total_qty = 0;
            @endphp
                    <div class="">

                    </div>

            <div class="product bg-gray-100 max-w-[40rem] w-[40rem] relative">
                <div class="bg-blue-200 px-4 py-2">Transaction Date on {{$h->created_at->format('d.m.Y')}}</div>
                <div class="">
                    <table>
                        <thead>
                        <th class="w-[20rem] text-left px-4 py-2">Name</th>
                        <th class="w-[10rem] text-left px-4 py-2">Quantity</th>
                        <th class="w-[10rem] text-left px-4 py-2">Sub Price</th>
                        </thead>

                        <tbody>
                        @foreach($h->details as $detail)

                            @php
                                $p = $detail->product;
                                $total += $detail->qty * $p->price;
                                $total_qty += $detail->qty;
                            @endphp

                            <tr>
                                <td class="px-4 py-2">{{$p->name}}</td>
                                <td class="px-4 py-2">{{$detail->qty}}</td>
                                <td class="px-4 py-2">Rp <?php echo number_format($detail->qty * $p->price,0,',','.'); ?></td>
                            </tr>
                        @endforeach

                        <tr class="font-bold bg-gray-200">
                            <td class="px-4 py-2">Total</td>
                            <td class="px-4 py-2">{{$total_qty}} item(s)</td>
                            <td class="px-4 py-2">Rp <?php echo number_format($total,0,',','.'); ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        @endforeach
    </div>
@endsection

