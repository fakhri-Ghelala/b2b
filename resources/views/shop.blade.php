@extends(('layout'))

@section('content')

    <!-- Start Content -->
    <div class="container py-5">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if(!$errors->isEmpty())
        <div class="alert alert-danger">
                {{$errors->first()}}
        </div>
        @endif
        <div class="row">

            <div class="col-lg-3">
                <h1 class="h2 pb-4">Categories</h1>
                <ul class="list-unstyled templatemo-accordion">
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            categories
                            <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul class="collapse show list-unstyled pl-3">
                            @foreach($categories as $category)
                                <li><a class="text-decoration-none" href="/shop/{{$category->id}}">{{$category->name_sector}}</a></li>
                            @endforeach

                        </ul>
                    </li>

                </ul>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-inline shop-top-menu pb-3 pt-1">
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="{{route('shop')}}">All</a>
                            </li>

                        </ul>
                    </div>
                    <div class="col-md-6 pb-4">
                    <form>
{{--                        TODO: add search field--}}
                    </form>
                    </div>
                </div>
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="{{Voyager::image($product->image)}}">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">

                                        <li><a class="btn btn-success text-white mt-2" href="/products/show/{{$product->id}}"><i class="far fa-eye"></i></a></li>
                                        <li><button class="btn btn-success text-white mt-2" data-bs-toggle="modal" data-bs-target="#modal_{{$product->id}}" ><i class="fas fa-cart-plus"></i></button></li>
                                    </ul>
                                </div>
                                <div class="modal fade" id="modal_{{$product->id}}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Sales</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="post">
                                                    @csrf
                                                    <input type="hidden" id="user_id" name="user_id" value="{{auth()->user()->id}}">
                                                    <input type="hidden" id="max_quantity" name="max_quantity" value="{{$product->quantity}}">
                                                    <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
                                                    <input type="number" name="quantity" id="quantity"  >
                                                    <input type="submit" value="add to quotation" class="btn btn-primary">
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body">
                                <a href="shop-single.html" class="h3 text-decoration-none">{{$product->name}}</a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li>quantity : {{$product->quantity}}</li>

                                </ul>
                                <p class=" mb-0">price : {{$product->price}} Dt</p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>

        </div>
    </div>
    <!-- End Content -->
@stop
