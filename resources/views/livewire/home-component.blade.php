<div>
    <main class="main">
        <section class="home-slider position-relative pt-50">
            <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
                @foreach ($slides as $slide)
                    <div class="single-hero-slider single-animation-wrap">
                        <div class="container">
                            <div class="row align-items-center slider-animated-1">
                                <div class="col-lg-5 col-md-7">
                                    <div class="hero-slider-content-2">
                                        <h4 class="animated">{{$slide->top_title}}</h4>
                                        <h2 class="animated fw-900">{{$slide->title}}</h2>
                                        <h1 class="animated fw-900 text-brand">{{$slide->sub_title}}</h1>
                                        <p class="animated">{{$slide->offer}}</p>
                                        <a class="animated btn btn-brush btn-brush-3" href="{{$slide->link}}">Boutique</a>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-3">
                                    <div class="single-slider-img single-slider-img-1">
                                        <img class="animated slider-1-1" src="{{asset('assets/imgs/slider')}}/{{$slide->image}}" alt="{{$slide->title}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="slider-arrow hero-slider-1-arrow"></div>
        </section>
        <section class="featured section-padding position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{ asset('assets/imgs/theme/icons/feature-1.png') }}" alt="">
                            <h4 class="bg-1">Livraison gratuite</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{ asset('assets/imgs/theme/icons/feature-2.png') }}" alt="">
                            <h4 class="bg-3">Commande en ligne</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{ asset('assets/imgs/theme/icons/feature-3.png') }}" alt="">
                            <h4 class="bg-2">Epargnez de l'argent</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{ asset('assets/imgs/theme/icons/feature-4.png') }}" alt="">
                            <h4 class="bg-4">Promotions</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{ asset('assets/imgs/theme/icons/feature-5.png') }}" alt="">
                            <h4 class="bg-5">Ventes de qualité</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{ asset('assets/imgs/theme/icons/feature-6.png') }}" alt="">
                            <h4 class="bg-6">24/7 Service client</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="product-tabs section-padding position-relative wow fadeIn animated">
            <div class="bg-square"></div>
            <div class="container">
                <div class="tab-header">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">En vedette</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-three" data-bs-toggle="tab" data-bs-target="#tab-three" type="button" role="tab" aria-controls="tab-three" aria-selected="false">Nouveaux produits</button>
                        </li>
                    </ul>
                    <a href="{{route('shop')}}" class="view-more d-none d-md-flex">Voir plus<i class="fi-rs-angle-double-small-right"></i></a>
                </div>
                <!--End nav-tabs-->
                <div class="tab-content wow fadeIn animated" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        @php
                            $witems = Cart::instance('wishlist')->content()->pluck('id');
                        @endphp
                        <div class="row product-grid-4">
                            @foreach ($fproducts as $fproduct)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30" style="height: 380px;">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom" style="height: 250px">
                                            <a href="{{route('product.details', ['slug'=>$fproduct->slug])}}">
                                                <img class="default-img" src="{{asset('assets/imgs/products')}}/{{$fproduct->image}}" alt="" style="height: 250px">
                                            </a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="new">En vedette</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <h2><a href="{{route('product.details', ['slug'=>$fproduct->slug])}}">{{$fproduct->name}}</a></h2>
                                        @if ($fproduct->sale_price)
                                                <div class="product-price">
                                                    <span class="old-price">Fcfa {{$fproduct->regular_price}} </span>
                                                </div>
                                                <div class="product-price">
                                                    <span>Fcfa {{$fproduct->sale_price}}</span>
                                                </div>
                                            @else
                                                <div class="product-price">
                                                    <span>Fcfa {{$fproduct->regular_price}} </span>
                                                </div>
                                            @endif
                                            <div class="product-action-1 show">
                                                @if($witems->contains($fproduct->id))
                                                    <a aria-label="Retirer des favoris" class="action-btn hover-up wishlisted" href="#" wire:click.prevent="removeFromWishlist({{$fproduct->id}})"><i class="fi-rs-heart"></i></a>
                                                @else
                                                    <a aria-label="Ajouter en favoris" class="action-btn hover-up" href="#" wire:click.prevent="addToWishlist({{$fproduct->id}}, '{{$fproduct->name}}', '{{$fproduct->regular_price}}')"><i class="fi-rs-heart"></i></a>
                                                @endif
                                                <a aria-label="Ajouter au panier" class="action-btn hover-up" href="#" wire:click.prevent="store({{$fproduct->id}},'{{$fproduct->name}}','{{$fproduct->regular_price}}')"><i class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab one (Featured)-->
                    <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
                        @php
                            $witems = Cart::instance('wishlist')->content()->pluck('id');
                        @endphp
                        <div class="row product-grid-4">
                            @foreach ($lproducts as $lproduct)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30" style="height: 370px">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom" style="height: 250px">
                                            <a href="{{route('product.details', ['slug'=>$lproduct->slug])}}">
                                                <img class="default-img" src="{{asset('assets/imgs/products')}}/{{$lproduct->image}}" alt="" style="height: 250px">
                                            </a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="new">Nouveau</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <h2><a href="{{route('product.details', ['slug'=>$lproduct->slug])}}">{{$lproduct->name}}</a></h2>
                                        @if ($lproduct->sale_price)
                                                <div class="product-price">
                                                    <span class="old-price">Fcfa {{$lproduct->regular_price}} </span>
                                                </div>
                                                <div class="product-price">
                                                    <span>Fcfa {{$lproduct->sale_price}}</span>
                                                </div>
                                            @else
                                                <div class="product-price">
                                                    <span>Fcfa {{$lproduct->regular_price}} </span>
                                                </div>
                                            @endif
                                            <div class="product-action-1 show">
                                                @if($witems->contains($lproduct->id))
                                                    <a aria-label="Retirer des favoris" class="action-btn hover-up wishlisted" href="#" wire:click.prevent="removeFromWishlist({{$lproduct->id}})"><i class="fi-rs-heart"></i></a>
                                                @else
                                                    <a aria-label="Ajouter en favoris" class="action-btn hover-up" href="#" wire:click.prevent="addToWishlist({{$lproduct->id}}, '{{$lproduct->name}}', '{{$lproduct->regular_price}}')"><i class="fi-rs-heart"></i></a>
                                                @endif
                                                <a aria-label="Ajouter au panier" class="action-btn hover-up" href="#" wire:click.prevent="store({{$lproduct->id}},'{{$lproduct->name}}','{{$lproduct->regular_price}}')"><i class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab three (New added)-->
                </div>
                <!--End tab-content-->
            </div>
        </section>
        <section class="banner-2 section-padding pb-0">
            <div class="container">
                <div class="banner-img banner-big wow fadeIn animated f-none">
                    <img src="assets/imgs/banner/banner-4.png" alt="">
                    <div class="banner-text d-md-block d-none">
                        <h4 class="mb-15 mt-40 text-brand">Service de reparation</h4>
                        <h1 class="fw-600 mb-20">Nous avons une <br>Autorisation pour les marques vendues</h1>
                        <a href="{{route('privacy')}}" class="btn">Plus d'infos <i class="fi-rs-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding">
            <div class="container wow fadeIn animated">
                <h3 class="section-title mb-20"><span>Les plus</span> populaires</h3>
                <div class="carausel-6-columns-cover position-relative">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows"></div>
                    <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                        @foreach ($lproducts as $lproduct)
                            <div class="product-cart-wrap small hover-up">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom" style="height: 250px">
                                        <a href="{{route('product.details', ['slug'=>$lproduct->slug])}}">
                                            <img class="default-img" src="{{asset('assets/imgs/products')}}/{{$lproduct->image}}" style="height: 250px">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        {{--<a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                            <i class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="wishlist.php" tabindex="0"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn small hover-up" href="compare.php" tabindex="0"><i class="fi-rs-shuffle"></i></a>--}}
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="new">Populaire</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap" style="height: 100px;">
                                    <h2><a href="{{asset('assets/imgs/products')}}/{{$lproduct->image}}">{{$lproduct->name}}</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                        </span>
                                    </div>
                                    @if ($lproduct->sale_price)
                                                <div class="product-price">
                                                    <span class="old-price">Fcfa {{$lproduct->regular_price}} </span>
                                                </div>
                                                <div class="product-price">
                                                    <span>Fcfa {{$lproduct->sale_price}}</span>
                                                </div>
                                            @else
                                                <div class="product-price">
                                                    <span>Fcfa {{$lproduct->regular_price}} </span>
                                                </div>
                                            @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

    </main>
</div>
