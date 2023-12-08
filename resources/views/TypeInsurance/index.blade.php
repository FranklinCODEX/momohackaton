@extends('mainlayout')

@section('title')
    Type d'assurance | Liste
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h3 class="card-title">Liste des différents type d'assurance disponible</h3>
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($collections as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->prix }}</td>
                            <td class="text-center">
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#modal-update-{{ $item->id }}">
                                    Modifier
                                </button>
                            </td>
                            <td class="text-center">
                                <form method="POST" action="{{ route('typeInsurance.destroy', $item->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

@foreach ($collections as $item)
    <div class="modal fade" id="modal-update-{{ $item->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modification</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action=" {{ route('typeInsurance.update', $item->id) }} " method="post"
                    enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input value="{{ $item->name }}" name="name" type="text" class="form-control"
                                    id="name" placeholder="Exp : Assurance Logement">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input value="{{ $item->description }}" name="description" type="text"
                                    class="form-control" id="description"
                                    placeholder="Exp : Cette offre permet aux assurés de bénificer des logement gratuitement pendant des années">
                            </div>
                            <div class="form-group">
                                <label for="prix">Prix(en FCFA)</label>
                                <input value="{{ $item->prix }}" name="prix" type="number" class="form-control"
                                    id="prix" placeholder="Exp : 15000 FCFA">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Image représentative</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="image" type="file" accept=".jpg, .jpeg, .png, .gif"
                                            class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choisir une
                                            image</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="prix">Image actuelle</label>
                                <img src=" {{ asset('storage/' . $item->imagePath) }}" alt="image" width="200"
                                    height="200">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Modifier</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endforeach

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

    <script type="text/javascript">
        $('.show_confirm').click(function(event) {

            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Voulez-vous vraiment le supprimer ?`,
                    text: "Cette suppression est irréversible",
                    icon: "danger",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });

        });
    </script>
@endsection
