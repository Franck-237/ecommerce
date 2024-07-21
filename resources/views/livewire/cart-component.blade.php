<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home.index')}}" rel="nofollow">Accueil</a>
                    <span></span> Votre Panier
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            @if(Session::has('success_message'))
                                <div class="alert alert-success">
                                    <strong>Success | {{Session::get('success_message')}}</strong>
                                </div>
                            @endif
                            @if(Cart::instance('cart')->count() > 0)
                            <table class="table shopping-summery text-center clean">
                                <thead>
                                    <tr class="main-heading">
                                        <th scope="col">Image</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prix</th>
                                        <th scope="col">Quantité</th>
                                        <th scope="col">total</th>
                                        <th scope="col">Supprimer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cartItems as $item)
                                        <tr>
                                            <td class="image product-thumbnail"><img src="{{ asset('assets/imgs/products') }}/{{$item->model->image}}" alt="#"></td>
                                            <td class="product-des product-name">
                                                <h5 class="product-name"><a href="product-details.html">{{$item->name}}</a></h5>
                                                {{--<p class="font-xs">Maboriosam in a tonto nesciung eget<br> distingy magndapibus.
                                                </p>--}}
                                            </td>
                                            <td class="price" data-title="Price"><span>Fcfa {{$item->model->cart_price}}</span></td>
                                            <td class="text-center" data-title="Stock">
                                                <div class="detail-qty border radius  m-auto">
                                                    <a href="#" class="qty-down" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"><i class="fi-rs-angle-small-down"></i></a>
                                                    <span class="qty-val">{{$item->qty}}</span>
                                                    <a href="#" class="qty-up" wire:click.prevent="increaseQuantity('{{$item->rowId}}')"><i class="fi-rs-angle-small-up"></i></a>
                                                </div>
                                            </td>
                                            <td class="text-right" data-title="Cart">
                                                <span>Fcfa {{$item->subtotal}}</span>
                                            </td>
                                            <td class="action" data-title="Remove"><a href="#" class="text-muted" wire:click.prevent="destroy('{{$item->rowId}}')"><i class="fi-rs-trash"></i></a></td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="6" class="text-end">
                                            <a href="#" class="text-muted" wire:click.prevent="clearAll()"> <i class="fi-rs-cross-small"></i> Vider le Panier</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            @else
                                <p>Aucun produit dans votre panier!!</p>
                            @endif
                        </div>
                        <div class="cart-action text-end">
                            <a class="btn" href="{{route('shop')}}"><i class="fi-rs-shopping-bag mr-10"></i>continuer boutique</a>
                        </div>
                        <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                        <div class="row mb-50">
                            <div class="col-lg-6 col-md-12">
                                <div class="border p-md-4 p-30 border-radius cart-totals">
                                    <div class="heading_s1 mb-3">
                                        <h4>Total Panier</h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="cart_total_label">Total</td>
                                                    <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">Fcfa {{Cart::subtotal()}}</span></strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    @auth
                                        <a href="{{route('shop.checkout')}}" class="btn "> <i class="fi-rs-box-alt mr-10"></i> Procéder à l'achat</a>
                                    @else
                                        <a href="{{route('login')}}" class="btn "> <i class="fi-rs-box-alt mr-10"></i> Veuillez vous connecter</a><p>Pour procéder à l'achat!</p>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
