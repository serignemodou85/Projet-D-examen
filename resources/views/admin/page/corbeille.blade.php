@extends('admin.layouts.app')

@section('content')
    <div class="row column_title">
        <div class="col-md-12">
        <div class="page_title">
            <h2>CORBEILLE</h2>
        </div>
        </div>
    </div>
    <br>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Corbeille</h2>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
                        <th>Nom</th>
                        <th>Prenom</th>
						<th>Adresse</th>
                        <th>Téléphone</th>
                    </tr>
                </thead>
                <tbody>
					@foreach ($utilisateurs as $utilisateur)
                    <tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox{{ $utilisateur->id }}" name="options[]" value="{{ $utilisateur->id }}">
								<label for="checkbox{{ $utilisateur->id }}"></label>
							</span>
						</td>
                        <td>{{ $utilisateur->nom }}</td>
                        <td>{{ $utilisateur->prenom }}</td>
                        <td>{{ $utilisateur->adresse }}</td>
                        <td>{{ $utilisateur->telephone }}</td>
                        <td>
                            <!-- Formulaire pour restaurer l'utilisateur -->
                            <form action="{{ route('admin.restore', $utilisateur->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Restaurer</button>
                            </form>
                            <!-- Formulaire pour supprimer définitivement l'utilisateur -->
                            <form action="{{ route('admin.forceDelete', $utilisateur->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer définitivement</button>
                            </form>
                        </td>
                    </tr>
					@endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
