<div class="container row align-items-center pt-25 mx-auto">
    <p class="text-center pt-25 pb-10 fs-5">Tous les avis sur nos produits</p>
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
