@extends('admin.layouts.app')

@section('content')
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>MESSAGES REÇUS</h2>
            </div>
        </div>
    </div>
    <br>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Action</th> <!-- Colonne pour le bouton Répondre -->
                </tr>
            </thead>
            <tbody>
                @foreach($message as $msg)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $msg->nom }}</td>
                        <td>{{ $msg->email }}</td>
                        <td>{{ $msg->message }}</td>
                        <td>{{ $msg->created_at->format('d-m-Y H:i') }}</td>
                        <td class="text-center">
                            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=<?= urlencode($msg->email) ?>&su=<?= urlencode('Réponse au message de : ' . $msg->nom . ' - ' . $msg->message) ?>"
                            class="btn btn-outline-primary btn-sm d-flex align-items-center justify-content-center"
                            style="border-radius: 8px; font-weight: 600; padding: 8px 15px; transition: 0.3s; box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.2);"
                            target="_blank">
                                <i class="fas fa-envelope me-2"></i> Répondre
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
