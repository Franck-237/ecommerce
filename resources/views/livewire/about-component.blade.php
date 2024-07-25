<div>
    <main class="main single-page">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Accueil</a>
                    <span></span> A propos de nous
                </div>
            </div>
        </div>
        <section class="section-padding">
            <div class="container pt-25">
                <div class="row">
                    <div class="col-lg-6 align-self-center mb-lg-0 mb-4">
                        <h6 class="mt-0 mb-15 text-uppercase font-sm text-brand wow fadeIn animated">Notre entreprise</h6>
                        <h1 class="font-heading mb-40">
                            Nous vous offrons la meilleure qualité de produits  avec un service client à l'appui
                        </h1>
                    </div>
                    <div class="col-lg-6">
                        <img src="assets/imgs/page/about-1.png" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section id="testimonials" class="section-padding">
            <div class="container pt-25">
                <div class="row mb-50">
                    <div class="col-lg-12 col-md-12 text-center">
                        <h6 class="mt-0 mb-10 text-uppercase  text-brand font-sm wow fadeIn animated">Quelques points</h6>
                        <h2 class="mb-15 text-grey-1 wow fadeIn animated">Jettez un oeil<br> sur ce qu'on dit nos clients</h2>
                    </div>
                </div>
                <div class="row align-items-center">
                    @foreach ($avis as $avi)
                        <div class="col-md-6 col-lg-4">
                            <div class="hero-card box-shadow-outer-6 wow fadeIn animated mb-30 hover-up d-flex" style="height: 250px;">
                                <div class="hero-card-icon icon-left-2 hover-up ">
                                    <img class="btn-shadow-brand hover-up border-radius-5 bg-brand-muted" src="{{ asset('assets/imgs/user') }}/{{ $avi->user->photo }}" alt="" style="width: 60px; height: 80px;">
                                </div>
                                <div class="pl-30">
                                    <h5 class="mb-5 fw-500">
                                        {{ $avi->user->name }}
                                    </h5>
                                    <p class="font-sm text-grey-5">{{ $avi->product->name }}</p>
                                    <p class="text-grey-3">"{{$avi->comment}}."</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row mt-30">
                    <div class="col-12 text-center">
                        <p class="wow fadeIn animated">
                            <a class="btn btn-brand text-white btn-shadow-brand hover-up btn-lg" href="{{route('avis')}}">Voir plus</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        {{--<section class="section-padding">
            <div class="container pb-25">
                <h3 class="section-title mb-20 wow fadeIn animated text-center"><span>Featured</span> Clients</h3>
                <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
                    <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="assets/imgs/banner/brand-1.png" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="assets/imgs/banner/brand-2.png" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="assets/imgs/banner/brand-3.png" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="assets/imgs/banner/brand-4.png" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="assets/imgs/banner/brand-5.png" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="assets/imgs/banner/brand-6.png" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="assets/imgs/banner/brand-3.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>--}}
    </main>
</div>
