<div>
    <style>
        nav svg {
           height: 15px;
           padding: 2px 0 2px 0;
        }
        nav .hidden {
            display: block;
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
                                <p> Nous avons trouvés <strong class="text-brand">{{$products->total()}}</strong> produits de la catégorie <strong class="text-brand">{{$category_name}}</strong>!</p>
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
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom" style="height: 300px">
                                                <a href="{{route('product.details', ['slug'=>$product->slug])}}">
                                                    <img class="default-img" src="{{ asset('assets/imgs/products') }}/{{$product->image}}" alt="{{$product->name}}" style="height: 300px">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                                    <i class="fi-rs-search"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
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
                                                <a aria-label="Add To Cart" class="action-btn hover-up" href="#" wire:click.prevent="store({{$product->id}},'{{$product->name}}','{{$product->regular_price}}')"><i class="fi-rs-shopping-bag-add"></i></a>
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
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

