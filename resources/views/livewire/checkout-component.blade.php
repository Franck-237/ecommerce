<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home.index')}}" rel="nofollow">Home</a>
                    <span></span> <a href="{{route('shop')}}" rel="nofollow">Boutique</a>
                    <span></span> Achat
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-sm-15">
                        <div class="toggle_info">
                            <span><i class="fi-rs-user mr-10"></i><span class="text-muted">Vous avez un compte?</span> <a href="#loginform" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">Connectez-vous</a></span>
                        </div>
                        <div class="panel-collapse collapse login_form" id="loginform">
                            <div class="panel-body">
                                <p class="mb-30 font-sm">Veuillez vous connectez afin de passer une commande.</p>
                                <form method="post" action="{{route('login')}}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" required="" name="email" placeholder="Votre email" :value="old('email')" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input required="" type="password" name="password" placeholder="Mot de passe" required autocomplete="current-password">
                                    </div>
                                    <div class="login_footer form-group">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="remember" id="exampleCheckbox1" value="">
                                                <label class="form-check-label" for="exampleCheckbox1"><span>Se souvenir de moi</span></label>
                                            </div>
                                        </div>
                                        <a class="text-muted" href="{{route('password.request')}}">Mot de passe oublié?</a>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-fill-out btn-block hover-up" name="login">Connexion</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="toggle_info">
                            <span><i class="fi-rs-label mr-10"></i><span class="text-muted">Vous avez un coupon?</span> <a href="#coupon" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">Cliquer ici pour entrer le code</a></span>
                        </div>
                        <div class="panel-collapse collapse coupon_form " id="coupon">
                            <div class="panel-body">
                                <p class="mb-30 font-sm">Si vous avez un coupon veuillez l'entrer ici pour l'utiliser.</p>
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif
                                <form method="post" wire:submit.prevent="applyCoupon">
                                    <div class="form-group">
                                        <input type="text" placeholder="Entrer le code du coupon..." name="code" wire:model="code">
                                    </div>
                                    @error('code')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    <div class="form-group">
                                        <button type="submit" class="btn  btn-md" name="login">Utiliser</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="divider mt-50 mb-50"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="order_review">
                            <div class="mb-20">
                                <h4>Vos achats</h4>
                            </div>
                            <div class="table-responsive order_table text-center">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(Cart::instance('cart')->content() as $item)
                                            <tr>
                                                <td class="image product-thumbnail"><img src="{{ asset('assets/imgs/products') }}/{{$item->model->image}}" alt="#"></td>
                                                <td>
                                                    <h5><a href="product-details.html">{{$item->model->name}}</a></h5> <span class="product-qty">x {{$item->qty}}</span>
                                                </td>
                                                <td>Fcfa {{$item->subtotal}}</td>
                                            </tr>
                                        @endforeach
                                        {{--<tr>
                                            <td class="image product-thumbnail"><img src="{{ ('assets/imgs/shop/product-2-1.jpg') }}" alt="#"></td>
                                            <td>
                                                <h5><a href="product-details.html">LDB MOON Women Summe</a></h5> <span class="product-qty">x 1</span>
                                            </td>
                                            <td>$65.00</td>
                                        </tr>
                                        <tr>
                                            <td class="image product-thumbnail"><img src="{{ ('assets/imgs/shop/product-3-1.jpg') }}" alt="#"></td>
                                            <td><i class="ti-check-box font-small text-muted mr-10"></i>
                                                <h5><a href="product-details.html">Women's Short Sleeve Loose</a></h5> <span class="product-qty">x 1</span>
                                            </td>
                                            <td>$35.00</td>
                                        </tr>--}}
                                        {{--<tr>
                                            <th>SubTotal</th>
                                            <td class="product-subtotal" colspan="2">$280.00</td>
                                        </tr>--}}
                                        <tr>
                                            <th>Coupon</th>
                                            <td colspan="2"><em>En attente...</em></td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">Fcfa {{Cart::subtotal()}}</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                            <div class="payment_method">
                                <div class="mb-25">
                                    <h5>Payment</h5>
                                </div>
                                <div class="payment_option">
                                    <div class="custome-radio">
                                        <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios3">
                                        <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse" data-target="#cashOnDelivery" aria-controls="cashOnDelivery">Payer à la livraison</label>
                                    </div>
                                    <div class="custome-radio">
                                        <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios4" disabled>
                                        <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#cardPayment" aria-controls="cardPayment">Carte bancaire</label>
                                    </div>
                                    <div class="custome-radio">
                                        <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios5" disabled>
                                        <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">Paypal</label>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="btn btn-fill-out btn-block mt-30">Commander</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
