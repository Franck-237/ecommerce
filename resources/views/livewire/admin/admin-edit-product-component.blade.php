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
                    <span></span> Modifier un produit
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
                                        Modifier un produit
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.products')}}" class="btn btn-success float-end">Tous les produits</a>
                                    </div>
                               </div>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif
                                <form wire:submit.prevent="updateProduct">
                                    <div class="mb-3 mt-3">
                                        <label class="form-label">Nom</label>
                                        <input type="text" class="form-control" placeholder="nom du produit" wire:model="name">
                                        @error('name')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label class="form-label">Titre</label>
                                        <input type="text" class="form-control" placeholder="titre du produit" wire:model="slug" wire:keyup="generateSlug">
                                        @error('slug')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label class="form-label">Sommaire</label>
                                        <input type="text" class="form-control" placeholder="sommaire du produit" wire:model="short_description">
                                        @error('short_description')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label class="form-label">Description</label>
                                        <input type="text" class="form-control" placeholder="offre du produit" wire:model="description">
                                        @error('description')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label class="form-label">Prix</label>
                                        <input type="text" class="form-control" placeholder="prix du produit" wire:model="regular_price">
                                        @error('regular_price')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label class="form-label">Solde</label>
                                        <input type="text" class="form-control" placeholder="prix du produit" wire:model="sale_price">
                                        @error('sale_price')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label class="form-label">SKU</label>
                                        <input type="text" class="form-control" placeholder="prix du produit" wire:model="sku">
                                        @error('sku')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="stock_status" class="form-label">Stock</label>
                                        <select name="stock_status" id="" class="form-control" wire:model="stock_status">
                                            <option value="instock">En stock</option>
                                            <option value="outstock">Pas en stock</option>
                                        </select>
                                        @error('stock_status')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="featured" class="form-label">En vedette</label>
                                        <select name="featured" id="" class="form-control" wire:model="featured">
                                            <option value="0">Non</option>
                                            <option value="1">Oui</option>
                                        </select>
                                        @error('featured')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="quantity" class="form-label">Quantité</label>
                                        <input type="text" name="quantity" id="" class="form-control" placeholder="quantité" wire:model="quantity">
                                        @error('quantity')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" name="" id="" class="form-control" name="image" wire:model="image">
                                        @if($newimage)
                                            <img src="{{$newimage->temporaryUrl()}}" alt="" width="100">
                                        @else
                                            <img src="{{asset('assets/imgs/products')}}/{{$image}}" alt="" width="100">
                                        @endif
                                        @error('image')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="category_id" class="form-label">Catégorie</label>
                                        <select name="category_id" id="" class="form-control" wire:model="category_id">
                                            <option value="">Sélecionner une catégorie</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary float-end">Modifier</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>




