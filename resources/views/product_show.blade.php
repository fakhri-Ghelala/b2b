@extends('layout')

@section('content')


    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="{{Voyager::image($product->image)}}" alt="Card image cap" id="product-detail">
                    </div>

                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">{{$product->name}}</h1>
                            <p class="h3 py-2">{{$product->price}}Dt</p>


                            <h6>Description:</h6>
                            <p>{{$product->description}}</p>
                            <h6>Quantity</h6>
                            <p>{{$product->quantity}}</p>
                            <div class="btn-group">
                                <a href="#" class="btn btn-primary active" aria-current="page">Add To Carte</a>
                                <a href="{{route('shop')}}" class="btn btn-primary">Back to shop</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->

@stop
