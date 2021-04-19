<?php
    session_start();
    require_once '../inc/bd.php';
    require_once '../inc/functions.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>InkEat - Restaurant futuriste</title>
        <link rel="stylesheet" href="../style/common.css" />
        <link rel="stylesheet" href="style/user.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>
    <body>
        <header>
            <?php include '../inc/nav.php'; ?>
        </header>
        <main>
            <div class="container">
            <?php if(!empty($_SESSION['message'])) { ?>
            <div class="container">
                <div class="alert alert-info" role="alert">
                    <?php echo $_SESSION['message']; ?>
                </div>
            </div>
            <?php } $_SESSION['message'] = ""; ?>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="user-tab" data-bs-toggle="tab" data-bs-target="#user" type="button" role="tab" aria-controls="user" aria-selected="true">Mon compte</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="support-tab" data-bs-toggle="tab" data-bs-target="#support" type="button" role="tab" aria-controls="support" aria-selected="false">Support</button>
                </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Vos réservations :</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Nombre de personnes</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $req = $bdd->query("SELECT adultes,enfants,surmesure,date,heure FROM reservations WHERE user = ".$_SESSION['id']);
                                        $req->execute();
                                        while($res = $req->fetch(PDO::FETCH_ASSOC)) {
                                            echo "
                                            <tr>
                                                <td><i class='fas fa-calendar-alt'></i> {$res['date']} <i class='fas fa-clock'></i> {$res['heure']}</td>
                                                <td><i class='fas fa-user'></i> {$res['adultes']} <i class='fas fa-child'></i> {$res['enfants']}</td>
                                                <td><button type='button' class='btn btn-danger'> <i class='fas fa-trash-alt'></i> Supprimer</button></td>
                                            </tr>
                                            ";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12">
                            <h2>Vos Messages :</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Message</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $req = $bdd->query("SELECT message FROM messages WHERE email = '".$_SESSION['email']."'");
                                        $req->execute();
                                        while($res = $req->fetch(PDO::FETCH_ASSOC)) {
                                            echo "
                                            <tr>
                                                <td>{$res['message']}</td>
                                                <td><button type='button' class='btn btn-danger'> <i class='fas fa-trash-alt'></i> Supprimer</button></td>
                                            </tr>
                                            ";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="support" role="tabpanel" aria-labelledby="support-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Toutes les reservations :</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Utilisateur</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Nombre de personnes</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $req = $bdd->query("SELECT user,adultes,enfants,date,heure FROM reservations");
                                        $req->execute();
                                        while($res = $req->fetch(PDO::FETCH_ASSOC)) {
                                            echo "
                                            <tr>
                                                <td>{$res['user']}</td>
                                                <td><i class='fas fa-calendar-alt'></i> {$res['date']} <i class='fas fa-clock'></i> {$res['heure']}</td>
                                                <td><i class='fas fa-user'></i> {$res['adultes']} <i class='fas fa-child'></i> {$res['enfants']}</td>
                                                <td><button type='button' class='btn btn-danger'> <i class='fas fa-trash-alt'></i> Supprimer</button></td>
                                            </tr>
                                            ";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12">
                            <h2>Tous les messages :</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Prénom Nom</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $req = $bdd->query("SELECT * FROM messages");
                                        $req->execute();
                                        while($res = $req->fetch(PDO::FETCH_ASSOC)) {
                                            echo "
                                            <tr>
                                                <td>{$res['prenom']} {$res['nom']}</td>
                                                <td>{$res['email']}</td>
                                                <td>{$res['message']}</td>
                                                <td><button type='button' class='btn btn-danger'> <i class='fas fa-trash-alt'></i> Supprimer</button></td>
                                            </tr>
                                            ";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e2f494c86d.js" crossorigin="anonymous"></script>
    </body>
</html>