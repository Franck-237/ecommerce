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
                    <span></span> Tous les coupons
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
                                        Tous les coupons
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.coupon.add')}}" class="btn btn-success float-end">Ajouter un coupon</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @elseif (Session::has('error'))
                                    <div class="alert alert-danger" role="alert">{{Session::get('error')}}</div>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Code</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = ($coupons->currentPage()-1)*$coupons->perPage();
                                        @endphp
                                        @foreach ($coupons as $coupon)
                                            <tr>
                                                <td>{{++$i}}</td>
                                                <td>{{$coupon->code}}</td>
                                                <td>
                                                   <a href="{{route('admin.coupon.edit', ['coupon_id'=>$coupon->id])}}" class="text-info">Modifier</a>
                                                   <a href="#" class="text-danger" style="margin-left: 30px;" wire:click.prevent="destroy('{{$coupon->id}}')">Supprimer</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$coupons->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div>
    </main>
</div>
