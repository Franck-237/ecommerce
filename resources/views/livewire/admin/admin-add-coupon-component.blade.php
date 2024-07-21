<div>
    <style>
        nav svg {
            height: 20px;
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
                    <span></span> Ajouter un coupon
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                               <div class="row">
                                    <div class="col-md-6">
                                        Ajouter un coupon
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.coupons')}}" class="btn btn-success float-end">Tous les coupons</a>
                                    </div>
                               </div>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif
                                <form action="" wire:submit.prevent="storeCoupon">
                                    <div class="mb-3 mt-3">
                                        <label for="code" class="form-label">code</label>
                                        <input type="text" name="code" id="" class="form-control" placeholder="Code du coupon" wire:model="code">
                                        @error('code')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary float-end">Ajouter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
