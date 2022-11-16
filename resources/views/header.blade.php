<div class="fixed top-0 left-0 z-10 w-full p-4 px-16 bg-white drop-shadow flex justify-between">
    <div class="flex gap-8">
        <a href="{{url('/')}}" class="">Barbatos Shop</a>
        <div class="text-gray-400">
            <div class="dropdown">
                <div class="">Category</div>
                <div class="dropdown-content">
                    <a href="{{url('./product/category/electronics')}}">Electronics</a>
                    <a href="{{url('./product/category/provision')}}">Provision</a>
                    <a href="{{url('./product/category/fashion')}}">Fashion</a>
                </div>
            </div>
        </div>
        <a href="{{url('./product/manage')}}" class="text-gray-400">Manage Products</a>
    </div>
    <div class="flex gap-3">


        <div class="flex gap-3">
            @if( auth()->check())
                <a class="nav-link" href="#">{{ auth()->user()->name}}</a>
                <div class="">
                    <a href={{url('/cart')}}>Cart</a>
                </div>
                <div class="">
                    <a href={{url('/history')}}>History</a>
                </div>
                <a href="{{url("/logout")}}">Logout</a>
            @else
                <a href="{{url("/login")}}">Login</a>
                <a href="{{url("/register")}}">Register</a>
            @endif
        </div>

    </div>
</div>

<div class="mb-10"></div>

<style>

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #ffffff;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        font-size: smaller;
    }

    .dropdown:hover .dropdown-content {display: block;}
    .dropdown-content a:hover{
        background-color: #f1f1f1;
    }
</style>
