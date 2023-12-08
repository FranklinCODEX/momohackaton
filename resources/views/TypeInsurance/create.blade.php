@extends('mainlayout')

@section('title')
    Creer un nouveau type d'assurance
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Formulaire</h3>
                    </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <form action=" {{ route('typeInsurance.store') }} " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input name="name" type="text" class="form-control" id="name"
                                    placeholder="Exp : Assurance Logement">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input name="description" type="text" class="form-control" id="description"
                                    placeholder="Exp : Cette offre permet aux assurés de bénificer des logement gratuitement pendant des années">
                            </div>
                            <div class="form-group">
                                <label for="prix">Prix(en FCFA)</label>
                                <input name="prix" type="number" class="form-control" id="prix"
                                    placeholder="Exp : 15000 FCFA">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Image représentative</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="imagePath" type="file" accept=".jpg, .jpeg, .png, .gif" class="custom-file-input"
                                            id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choisir une image</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Creer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
