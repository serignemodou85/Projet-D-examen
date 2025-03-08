@extends('admin.layouts.app')

@section('content')
    <div class="row column_title">
        <div class="col-md-12">
        <div class="page_title">
            <h2>GESTION DES ADMINISTRATEURS</h2>
        </div>
        </div>
    </div>
    <br>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('alert_type'))
        <script>
            const alerts = {
                success_alert: {
                    title: "Suppression réussie",
                    text: "Admin supprimé avec succès",
                    icon: "success",
                },
                success_alert1: {
                    title: "Restauration réussie",
                    text: "Utilisateur restauré avec succès",
                    icon: "success",
                },
                success_alert2: {
                    title: "Suppression définitive réussie",
                    text: "Utilisateur supprimé définitivement avec succès",
                    icon: "success",
                },
                success_alert3: {
                    title: "Modification réussie",
                    text: "Utilisateur modifier avec succès",
                    icon: "success",
                }
            };

            const alert = alerts["{{ session('alert_type') }}"];
            if (alert) {
                Swal.fire({
                    timer: 3000,
                    timerProgressBar: true,
                    title: alert.title,
                    text: alert.text,
                    icon: alert.icon,
                    width: '500px',
                    padding: '3em',
                    fontSize: '40px',
                    showConfirmButton: false,
                });
            }
        </script>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="container">
        <style>
            .table-wrapper{
                margin-right: 100px

            }

        </style>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Liste <b>Admin</b></h2>
                    </div>
                    <a href="{{ route('admin.corbeille') }}" class="corbeille-link" style="color: white">
                        CORBEILLE <i class="fas fa-trash-alt" title="Corbeille" ></i>
                    </a>
                </div>
            </div>
            <table class="table table-striped table-hover" id="tableform">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
                        <th style="width: 200px;">Nom</th>
                        <th style="width: 200px;">Prenom</th>
						<th style="width: 200px;">Email</th>
                        <th style="width: 100px;">Telephone</th>
                    </tr>
                </thead>
                <tbody>
					@foreach ($utilisateurs as $utilisateur)

                    <tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
                        <td style="width: 100px;">{{ $utilisateur->nom }}</td>
                        <td style="width: 100px;">{{ $utilisateur->prenom }}</td>
                        <td style="width: 100px;">{{ $utilisateur->email }}</td>
                        <td style="width: 50px;">{{ $utilisateur->telephone }}</td>
                        <td>
                            <a href="#editEmployeeModal{{ $utilisateur->id }}" class="edit" data-toggle="modal">
    							<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
							</a>

                            <a href="#deleteEmployeeModal{{ $utilisateur->id }}" class="delete" data-toggle="modal">
								<i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
					<!-- Modifier un utilisateur -->
					<div id="editEmployeeModal{{ $utilisateur->id }}" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="post" action="{{ route('admin.ModifierAdmin', $utilisateur->id) }}">
                                    @csrf
                                    @method('PUT') <!-- Pour les requêtes PUT -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Modifier Un Utilisateur</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Nom</label>
                                            <input type="text" name="nom" class="form-control" required value="{{ $utilisateur->nom }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Prenom</label>
                                            <input type="text" name="prenom" class="form-control" required value="{{ $utilisateur->prenom }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <textarea class="form-control" name="email" required>{{ $utilisateur->email }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Telephone</label>
                                            <input type="text" name="telephone" class="form-control" required value="{{ $utilisateur->telephone }}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Retour">
                                        <input type="submit" class="btn btn-success" value="Modifier Admin">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


					<!-- Supprimer Modal HTML -->
                    <div id="deleteEmployeeModal{{ $utilisateur->id }}" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="{{ route('admin.SupprimerAdmin', $utilisateur->id) }}">
                                    @csrf
                                    @method('DELETE') <!-- Spécifie une requête DELETE -->

                                    <div class="modal-header bg-danger text-white">
                                        <h4 class="modal-title">Confirmer la Suppression</h4>
                                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>

                                    <div class="modal-body">
                                        <p class="font-weight-bold">Êtes-vous sûr de vouloir supprimer ce client ?</p>
                                        <p class="text-warning"><small>Cette action est irréversible et entraînera la perte définitive des données de ce client.</small></p>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                        <button type="submit" class="btn btn-danger">Confirmer la Suppression</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
					@endforeach
                </tbody>
            </table>


        </div>
    </div>

	<!-- Ajouter un client -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="post" action="{% url 'clientajout' %}">
				{% csrf_token %}
					<div class="modal-header">
						<h4 class="modal-title">Ajouter Client</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Nom</label>
							<input type="text" name="nom" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Prenom</label>
							<input type="text" name="prenom" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Adresse</label>
							<textarea class="form-control" name="adresse" required></textarea>
						</div>
						<div class="form-group">
							<label>Telephone</label>
							<input type="text" name="phone" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Retour">
						<input type="submit" class="btn btn-success" value="Ajouter Client">
					</div>
				</form>
			</div>
		</div>
	</div>


@endsection
