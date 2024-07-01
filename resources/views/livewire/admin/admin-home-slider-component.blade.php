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
                    <span></span> Tous les slides
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
                                        Tous les slides
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.home.slider.add')}}" class="btn btn-success float-end">Ajouter une slide</a>
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
                                            <th>Image</th>
                                            <th>Grand titre</th>
                                            <th>Titre</th>
                                            <th>Sous-titre</th>
                                            <th>Offre</th>
                                            <th>Lien</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach ($slides as $slide)
                                            <tr>
                                                <td>{{++$i}}</td>
                                                <td><img src="{{asset('assets/imgs/slider')}}/{{$slide->image}}" alt="{{$slide->title}}" width="80"></td>
                                                <td>{{$slide->top_title}}</td>
                                                <td>{{$slide->title}}</td>
                                                <td>{{$slide->sub_title}}</td>
                                                <td>{{$slide->offer}}</td>
                                                <td>{{$slide->link}}</td>
                                                <td>{{$slide->status == 1 ? 'Actif': 'Inactif'}}</td>
                                                <td>
                                                   <a href="{{route('admin.home.slider.edit', ['slide_id'=>$slide->id])}}" class="text-info">Modifier</a>
                                                   <a href="#" class="text-danger" style="margin-left: 30px;" wire:click.prevent="destroy('{{$slide->id}}')">Supprimer</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{--
            onclick="deleteConfirmation({{$category->id}})"
            <div class="modal" id="deleteConfirmation">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body pb-30 pt-30">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h4 class="pb-3">Voulez-vous vraiment supprimer cette catégorie?</h4>
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Fermer</button>
                                <button type="button" class="btn btn-danger" onclick="deleteCategory()">Supprimer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}
    </main>
    {{--@push('scripts')
    <script>
        function deleteConfirmation(id) {
            @this.set('category_id', id);
            $('#deleteConfirmation').modal('show');
        }
        function deleteCategory() {
            @this.call('deleteCategory');
            $('#deleteConfirmation').modal('hide');
        }
    </script>
    @endpush--}}
</div>


