<!DOCTYPE html>
<html>
<head>
    @include('components.libraries')
</head>
<body body="body">
<!-- Nav Bar-->
    @include('components.navbar')
<!-- End NavBar -->
<header class="jumbotron" style="background-color:#6f42c1;color:white;">
  <div class="container">
    <h1>BL-Manager</h1>
        <ul>
            <li class="lead">@ Gestion Des Clients.</li>
            <li class="lead">@ Gestion Des Bons De Livraison.</li>
        </ul>
  </div>
</header> 

<div class="container">
    <h2>I.Specification technique:</h2>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5>Front-end</h5>
        </div>
        <div class="panel-body">
            <ul>
                <li>Architecture: HTML5</li>
                <li>Bootstrap v4 : Sylisation</li>
                <li>Fontawesome : Icons</li>
                <li>jQuery v3.4.0: Calcules et optimization des valeurs</li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5>Back-end:</h5>
        </div>
        <div class="panel-body">
            <ul>
                <li>Laravel v5.8: 
                <ul>
                    <li>Eloquant</li>
                    <li>Query builder</li>
                    <li>Controller, Model, blade, Migration</li>
                    <li>Injection des dependances</li>
                </ul>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5>Base des donnees:</h5>
        </div>
        <div class="panel-body">
            <ul>
                <li>MySql : SGBL</li>
                <ul>    C:\Users\michl\BL-Manager\config\database.php
                    <li>Host             : localhost</li>
                    <li>port             : 3306</li>
                    <li>Base des donnees : bl_manager_db</li>
                    <li>Username         : root</li>
                    <li>Mot de pass      : (aucun)</li>
                    <li>Toutes ces valeurs en ete saisie directement dans le fichier
                        <small class="error">'config\database.php'</small>
                    </li>
                </ul>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5>Application utlise et outils:</h5>
        </div>
        <div class="panel-body">
            <ul>
                <li>Visual Studio Code v1.37.1</li>
                <li>Xamp Server v3.2.4</li>
                <li>Composer</li>
                <li>Artisan</li>
                <li>Terminal de commande(Ms Windows 10.0.17763)</li>
            </ul>
        </div>
    </div>
    <hr>
    <h2>II.Controllers, Models et Migrarion:</h2>
    <h5>II.1.Controllers: +Controller (Defaut)</h5>
    <div class="col-md-12">
        <div class="row justify-content-md-between">
            <div class="card col-md-4">
                <div class="card-header">BIController</div>
                <div class="card-body">
                    <li>__construct()</li>
                    <li>listBL()</li>
                    <li>Ajouter()</li>
                    <li>Modifier()</li>
                    <li>Supprimer()</li>
                </div>
            </div>
            <div class="card col-md-4">
                <div class="card-header">ClientCoroller</div>
                <div class="card-body">
                    <li>__construct()</li>
                    <li>listClient()</li>
                    <li>Ajouter()</li>
                    <li>Modifier()</li>
                    <li>Supprimer()</li>
                </div>
            </div>
            <div class="card col-md-4">
                <div class="card-header">
                    DetailBLController
                </div>
                <div class="card-body">
                    <li>__construct()</li>
                    <li>details()</li>
                    <li>imprimer()</li>
            </div>
        </div>
    </div>
    <hr>
    <div class="col-md-12">
        <div class="row justify-content-md-between">
            <div class="col-md-6">
            <h5>II.2.Models:</h5>
                <div class="card">
                    <div class="card-header">BIController</div>
                    <div class="card-body">
                        <ul>
                            <li>BL</li>
                            <li>Client</li>
                            <li>DetailBL</li>
                            <li>+User (Defaut)</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            <h5>II.3.Migrations:</h5>
                <div class="card">
                    <div class="card-header">
                        DetailBLController
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>bls</li>
                            <li>clients</li>
                            <li>detail_b_l_s</li>
                            <li>+user (Defaut)</li>
                            <li>+password_reset (Defaut)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


 
                    
        
                    
                </div> 
</div>
</body>
</html>
