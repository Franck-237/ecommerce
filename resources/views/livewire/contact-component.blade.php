<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Accueil</a>
                    <span></span> Nous contacter
                </div>
            </div>
        </div>
        <section class="pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 m-auto">
                        <div class="contact-from-area padding-20-row-col wow FadeInUp">
                            <h3 class="mb-10 text-center">Laissez nous un message</h3>
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                            @endif
                                <form method="post" wire:submit.prevent="storeContact">
                                    @csrf
                                    <div class="mb-3 mt-3">
                                        <input type="text" name="name" id="" class="form-control" placeholder="Votre nom" wire:model="name">
                                        @error('name')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <input type="text" name="mail" id="" class="form-control" placeholder="Votre email" wire:model="mail">
                                        @error('mail')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <input type="text" name="tel" id="" class="form-control" placeholder="Votre téléphone" wire:model="tel">
                                        @error('tel')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <input type="text" name="subject" id="" class="form-control" placeholder="Sujet" wire:model="subject">
                                        @error('subject')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <textarea class="form-control" name="message" placeholder="Message" wire:model="message"></textarea>
                                        @error('message')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary float-end">Ajouter</button>
                                </form>
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
