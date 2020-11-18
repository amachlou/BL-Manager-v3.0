<!DOCTYPE html>
<html>
<head>
    @include('components.libraries')
</head>
<body>
<!-- Nav Bar-->
    @include('components.navbar')
<!-- End Nav Bar-->

<!-- Start Form -->

<div class="container">
    <br>
    <div class="card">
        <h5 class="card-header">Gestion des clients</h5>
        <div class="card-body"> 
            <div class="col-md-12">
                <form class="text-center border border-light p-5" action="/client/modifier/{{ $id }}" method="POST">
                @csrf
                    <p class="h4 mb-4">Modifier un client</p>
                
                    <div class="form-row mb-4">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Nom" name="nom" value="{{ $nom }}" required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Prénom" name="prenom" value="{{ $prenom }}" required>
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <input type="text" class="form-control" placeholder="Numéro de téléphone" name="tel" value="{{ $tel }}" required>
                    </div>
                    <div class="form-row mb-4">
                        <input type="email" class="form-control mb-4" placeholder="E-mail" name="email" value="{{ $email }}" required>
                    </div>
                    <div>
                        <a href="/clients" type="submit" class="btn btn-warning btn-sm">
                            <i class="fa fa-bars"></i> Toutes Les Clients
                        </a>
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fa fa-save"></i> Enregistrer
                        </button>
                    </div>
                    <hr>
                </form>
            </div> 
        </div>
    </div> 
</div>

<!-- End Form -->
</body>
</html>

