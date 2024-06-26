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
            color: #1259f1 !importantnt;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home.index')}}" rel="nofollow">Accueil</a>
                    <span></span> Boutique
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="shop-product-fillter">
                            <div class="totall-product">
                                <p> Nous cherchons <strong class="text-brand">{{$products->total()}}</strong> produits pour vous!</p>
                            </div>
                            <div class="sort-by-product-area">
                                <div class="sort-by-cover mr-10">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps"></i>Montrer:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> {{$pageSize}} <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="{{$pageSize==12 ? 'active' : ''}}" href="#" wire:click.prevent="changePageSize(12)">12</a></li>
                                            <li><a class="{{$pageSize==15 ? 'active' : ''}}" href="#" wire:click.prevent="changePageSize(15)">15</a></li>
                                            <li><a class="{{$pageSize==25 ? 'active' : ''}}" href="#" wire:click.prevent="changePageSize(25)">25</a></li>
                                            <li><a class="{{$pageSize==32 ? 'active' : ''}}" href="#" wire:click.prevent="changePageSize(32)">32</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sort-by-cover">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps-sort"></i>Trier par:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> Par défaut <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="{{$orderBy=='Par défaut' ? 'active' : ''}}" href="#" wire:click.prevent="changeOrderBy('Par défaut')">Par défaut</a></li>
                                            <li><a class="{{$orderBy=='Prix: Petit au plus grand' ? 'active' : ''}}" href="#" wire:click.prevent="changeOrderBy('Prix: Petit au plus grand')">Prix: Petit au plus grand</a></li>
                                            <li><a class="{{$orderBy=='Prix: Grand au plus petit' ? 'active' : ''}}" href="#" wire:click.prevent="changeOrderBy('Prix: Grand au plus petit')">Prix: Grand au plus petit</a></li>
                                            <li><a class="{{$orderBy=='Nouveautés' ? 'active' : ''}}" href="#" wire:click.prevent="changeOrderBy('Nouveautés')">Nouveautés</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row product-grid-3">
                            @php
                                $witems = Cart::instance('wishlist')->content()->pluck('id');
                            @endphp
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{route('product.details', ['slug'=>$product->slug])}}">
                                                    <img class="default-img" src="{{ ('assets/imgs/shop/product-') }}{{$product->id}}-1.jpg" alt="{{$product->name}}">
                                                    <img class="hover-img" src="{{ ('assets/imgs/shop/product-2-2.jpg') }}{{$product->id}}-2.jpg" alt="{{$product->name}}">
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
                                            <h2><a href="{{route('product.details', ['slug'=>$product->slug])}}">{{$product->name}}</a></h2>
                                            <div class="rating-result" title="90%">
                                                <span>
                                                    <span>90%</span>
                                                </span>
                                            </div>
                                            <div class="product-price">
                                                <span>Fcfa {{$product->regular_price}} </span>
                                                {{--<span class="old-price">$245.8</span>--}}
                                            </div>
                                            <div class="product-action-1 show">
                                                @if($witems->contains($product->id))
                                                    <a aria-label="Retirer des favoris" class="action-btn hover-up wishlisted" href="#" wire:click.prevent="removeFromWishlist({{$product->id}})"><i class="fi-rs-heart"></i></a>
                                                @else
                                                    <a aria-label="Ajouter en favoris" class="action-btn hover-up" href="#" wire:click.prevent="addToWishlist({{$product->id}}, '{{$product->name}}', '{{$product->regular_price}}')"><i class="fi-rs-heart"></i></a>
                                                @endif
                                                <a aria-label="Ajouter au panier" class="action-btn hover-up" href="#" wire:click.prevent="store({{$product->id}},'{{$product->name}}','{{$product->regular_price}}')"><i class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--pagination-->
                        <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                            {{$products->links()}}
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="row">
                            <div class="col-lg-12 col-mg-6"></div>
                            <div class="col-lg-12 col-mg-6"></div>
                        </div>
                        <div class="widget-category mb-30">
                            <h5 class="section-title style-1 mb-30 wow fadeIn animated">Catégories</h5>
                            <ul class="categories">
                                @foreach ($categories as $category)
                                    <li><a href="{{route('product.category', ['slug'=>$category->slug])}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Fillter By Price -->
                        <div class="sidebar-widget price_range range mb-30">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10">Filtrer par prix</h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>
                            <div class="price-filter">
                                <div class="price-filter-inner">
                                    <div id="slider-range" wire:ignore></div>
                                    <div class="price_slider_amount">
                                        <div class="label-input">
                                            <span>Valeur en Fcfa:</span><span class="text-info">{{$min_value}}</span> - <span class="text-info">{{$max_value}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product sidebar Widget -->
                        <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10">Nouveaux produits</h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>
                            @foreach ($nproducts as $nproduct)
                            <div class="single-post clearfix">
                                <div class="image">
                                    <img src="{{ asset('assets/imgs/shop/product-')}}{{$nproduct->id}}-2.jpg" alt="{{$nproduct->name}}">
                                </div>
                                <div class="content pt-10">
                                    <h5><a href="{{route('product.details', ['slug'=>$product->slug])}}">{{$nproduct->name}}</a></h5>
                                    <p class="price mb-0 mt-5">Fcfa {{$nproduct->regular_price}}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

@push('scripts')
    <script>
        var sliderrange = $('#slider-range');
        var amountprice = $('#amount');
        $(function() {
            sliderrange.slider({
                range: true,
                min: 0,
                max: 2000000,
                values: [0, 2000000],
                slide: function(event, ui) {
                    //amountprice.val("$" + ui.values[0] + " - $" + ui.values[1]);
                    @this.set('min_value', ui.values[0]);
                    @this.set('max_value', ui.values[1]);
                }
            });
        });
    </script>
@endpush
