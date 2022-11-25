<x-layouts.header title="КабельОпт71" description="оптовая продажа электрического кабеля и провода в тульской области" />
<body>
    <x-layouts.nav-front :cart="$cart" />

    <div class="container mt-4">
        @include('partials.flashmessages')
    </div>


    <div class="container mt-5 groups-container">
        @foreach($groups as $group)
            @php  $summ = 0; $i=1;  @endphp

            <div class="row px-2 text-white ">
                <div class="col-3 text-center  border-5 cable-category"><h2 class="mt-4 rubik-bold">{{$group->title}}</h2></div>
                <div class="col-9"><p class="ps-4">{{$group->description}}</p></div>
            </div>

            <div class="my-5">
                <div class="row text-white border-orange bg-orange rubik-bold ">
                    <div class="col-0 col-md-1 text-white d-none d-md-block p-0">№</div>
                    <div class="col-3 col-sm-4 col-lg-4 p-0 text-white">НАЗВАНИЕ</div>
                    <div class="col-3 col-sm-2 col-lg-2 p-0 text-white">БУХТОВКА</div>
                    <div class="col-3 col-sm-2 col-lg-2 p-0 text-white">НАЛИЧИЕ</div>
                    <div class="col-2 col-sm-2 col-lg-2 p-0 text-white">ЦЕНА</div>
                    <div class="col-2 col-sm-2 col-lg-1 p-0 text-white"></div>
                </div>
                <div class="row mt-4">
                    @foreach($group->cables as $cable)
                        <div class="row cable-row">
                            <div class="               col-md-1 col-lg-1 p-0 px-md-3 text-white d-none d-md-block">{{$i++}}</div>
                            <div class="col-4 col-sm-4 col-md-4 col-lg-4 px-3 px-md-3 text-white">{{$cable->title}}</div>
                            <div class="col-2 col-sm-2 col-md-2 col-lg-2 p-0 px-md-3 text-white">{{$cable->footage}}м</div>
                            <div class="col-2 col-sm-2 col-md-2 col-lg-2 p-0 px-md-3 text-white">{{floor($cable->instock/$cable->footage)*$cable->footage}}м</div>
                            <div class="col-2 col-sm-2 col-md-2 col-lg-2 p-0 px-md-3 text-white">{{sprintf("%.2f",$cable->price) }}₽/м</div>
                            <div class="col-2 col-sm-2 col-md-1 col-lg-1 p-0 mb-3">
                                <form method="post" action="{{route('cart.update')}}">
                                    @csrf

                                    <input  required name="cable_id" readonly value="{{$cable->id}}" hidden>
                                    @if ( session()->get('cart')!=null && key_exists($cable->id,session()->get('cart')) )
                                        <span class="d-inline-block " tabindex="0" data-bs-toggle="tooltip" title="Уже в корзине">
                                                    <button  type="button" disabled class="btn btn-outline-warning text-white cart-added" id="cart_{{$cable->id}}"  >
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
                                                            <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                                                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                                        </svg>
                                                    </button>
                                                </span>
                                    @else
                                        <button  type="submit"  class="btn btn-outline-warning text-white bg-orange cart-add" data-bs-toggle="tooltip" data-bs-placement="top" title="Добавить в корзину">
                                            <svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
                                            </svg>
                                            @endif

                                        </button>
                                </form>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        @endforeach
    </div>


<x-layouts.footer />
</body>





