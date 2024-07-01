<div>
    <style>
        nav svg {
           height: 15px;
           padding: 2px 0 2px 0;
        }
        nav .hidden {
            display: block;
        }
        .wishlisted {
            background-color: #1259f1 !important;
            border: 1px solid transparent !important;
        }
        .wishlisted i {
            color: #fff !important;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home.index')}}" rel="nofollow">Accueil</a>
                    <span></span> Mes favoris
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row product-grid-4">
                    @if(Cart::instance('wishlist')->count() > 0)
                    @foreach (Cart::instance('wishlist')->content() as $item)
                        <div class="col-lg-3 col-md-3 col-6 col-sm-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{route('product.details', ['slug'=>$item->model->slug])}}">
                                            <img class="default-img" src="{{ ('assets/imgs/shop/product-') }}{{$item->model->id}}-1.jpg" alt="{{$item->model->name}}">
                                            <img class="hover-img" src="{{ ('assets/imgs/shop/product-2-2.jpg') }}{{$item->model->id}}-2.jpg" alt="{{$item->model->name}}">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                        <i class="fi-rs-search"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="shop.html">Music</a>
                                    </div>
                                    <h2><a href="{{route('product.details', ['slug'=>$item->model->slug])}}">{{$item->model->name}}</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>90%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>Fcfa {{$item->model->regular_price}} </span>
                                        {{--<span class="old-price">$245.8</span>--}}
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Retirer des favoris" class="action-btn hover-up wishlisted" href="#" wire:click.prevent="removeFromWishlist({{$item->model->id}})"><i class="fi-rs-heart"></i></a>
                                        {{--<a aria-label="Ajouter au panier" class="action-btn hover-up" href="#" wire:click.prevent="store({{$item->model->id}},'{{$item->model->name}}','{{$item->model->regular_price}}')"><i class="fi-rs-shopping-bag-add"></i></a>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                            <div>
                                <p>Aucun produits en favoris</p>
                            </div>
                        @endif
                </div>
            </div>
        </section>
</div>
