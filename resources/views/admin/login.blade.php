<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- Include MDBootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css">
    <link rel="stylesheet" href="{{asset('assets/admin/css/login.css')}}">

    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .h-custom {
            height: calc(100% - 73px);
        }

        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }
        .img-fluid {
            max-width: 80%;
            height: auto;
            transition: transform 0.5s ease-in-out, box-shadow 0.5s ease-in-out;
        }

        .img-fluid:hover {
            transform: scale(1.1); /* Agrandit l'image à 110% de sa taille normale */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Ajoute une ombre fluide */
        }
        .is-invalid {
            border-color: red;
        }

        .invalid-feedback {
            color: red;
            font-size: 0.875rem;
        }



    </style>
</head>
<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="{{asset('assets/admin/images/logo/logo_icon.png')}}" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    @if(Session::get('success'))
                    <div class="alert alert-success">
                        <strong>{{ Session::get('success') }}</strong>
                    </div>
                @endif

                    <form action="{{ route('handlogin') }}" method="POST">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="email" class="form-control form-control-lg {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                placeholder="Entrez une adresse email valide" name="email" value="{{ old('email') }}" required />
                            <label class="form-label" for="form3Example3">Adresse Email</label>
                            @if($errors->has('email'))
                                <p class="invalid-feedback">{{ $errors->first('email') }}</p>
                            @endif
                            <p class="error-message h5 fw-bold mt-2 mb-2"></p>
                        </div>
                        <br>

                        <div class="form-outline mb-3">
                            <input type="password" id="password" class="form-control form-control-lg {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                placeholder="Entrez votre mot de passe" name="password" required />
                            <label class="form-label" for="form3Example4">Mot de Passe</label>
                            @if($errors->has('password'))
                                <p class="invalid-feedback">{{ $errors->first('password') }}</p>
                            @endif
                            <p class="error-message h5 fw-bold mt-2 mb-2"></p>

                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">
                                    Remember me
                                </label>
                                <small class="">
                                    <a class="h6 ml-2" href="{{route("vitrine.index")}}" style="color: black;">Page Acceuil</a>
                                </small>
                                <small class="">
                                    <a class=" h6 text-white ml-2" style="color: black;" href="#">Mot de passe oublie</a>
                                </small>
                            </div>
                        </div>
                        @if(Session::get('error_msg'))
                            <div class="alert alert-danger">
                                <strong>{{ Session::get('error_msg') }}</strong>
                            </div>
                        @endif
                        @if(Session::get('debug_info'))
                            <div class="alert alert-warning">
                                <strong>Debug Info :</strong> {{ Session::get('debug_info') }}
                            </div>
                        @endif


                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button name="formlogin" id="btnSubmitlogin" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Se Connecter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <app-footer _ngcontent-ng-c2665693032="" _nghost-ng-c3965900266="">
            <div _ngcontent-ng-c3965900266="" data-wow-delay="0.1s" class="container-fluid text-white footer pt-5 mt-5 wow fadeIn" style="background: rgb(2, 18, 106); visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                <div _ngcontent-ng-c3965900266="" class="container py-5">
                    <div _ngcontent-ng-c3965900266="" class="row g-5">
                        @include('vitrine.section.accerapide')
                        @include('vitrine.section.contact')
                        @include('vitrine.section.formulaire')
                    </div>
                </div>
                <hr>
                @include('vitrine.section.footer')
            </div>
        </app-footer>

    </section>
    <!-- Include MDBootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>

    <script src="{{ asset('assets/login/js/global/Validator.js')}}"></script>
    <script src="{{ asset('assets/login/js/users/login.js')}}" defer></script>

    <!-- CDN SWEET ALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('admin.section.message')




</body>
</html>
