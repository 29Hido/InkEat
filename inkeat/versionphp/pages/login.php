<?php
    require_once '../inc/bd.php';
    require_once '../inc/functions.php';
    error_reporting(E_ALL);
    $req = $bdd->prepare("INSERT INTO account VALUES(?);");
    if(isset($_POST)) {
        if(isset($_POST['connexion'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            if(accountExist($email, $bdd)){
                $infos = getAccountInfos($email,$bdd);
                $pass_hash = $infos['password'];
                if (password_verify($password, $pass_hash)) {
                    session_start();
                    $_SESSION['id'] = $infos['id'];
                    $_SESSION['email'] = $email;
                    $_SESSION['message'] = "Vous êtes maintenant connecté.";
                    header("Location: user");
                    $message = "Vous êtes maintenant connecté.";
                } else {
                    $erreur = "Ce couple email/mot de passe est invalide.";
                }
            } else {
                $erreur = "Aucun compte utilisant cette adresse email n'a été trouvé.";
            }
        } elseif (isset($_POST['inscription'])) {
            $email = $_POST['email'];
            if(accountExist($email, $bdd) == false){
                $message = "Vous êtes maintenant inscrit.";
                createAccount($_POST, $bdd);
            } else {
                $erreur = "Cette adresse email est déjà utilisé.";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>InkEat - Restaurant futuriste</title>
        <link rel="stylesheet" href="../style/common.css" />
        <link rel="stylesheet" href="style/login.css">
    </head>
    <body>
        <header>
            <?php include '../inc/nav.php'; ?>
            <div class="header-main">
                <div class="header-main-image">
                    <img src="../images/repas/repas-laby.png" alt="Image"/>
                </div>
                <div class="header-main-text">
                    <h1>InkEat</h1>
                    <p>Goûtez au futur !</p>
                    <a href="../index">Découvrir</a>
                </div>
            </div>
        </header>
        <main>
            <div class="container">
                <?php if(isset($erreur)) { echo $erreur; } ?>
                <?php if(isset($message)) { echo $message; } ?>
                <div class="choix-form">
                    <div>
                        <h2>Connexion</h2>
                        <div class="login">
                            <form method="POST">
                                <div>
                                    <label for="email">E-mail*</label>
                                    <input type="mail" name="email" id="email" placeholder="ex: john.doe@exemple.com" required>
                                </div>
                                <div>
                                    <label for="password">Mot de passe*</label>
                                    <input type="password" name="password" id="password" placeholder="Mot de passe" required>
                                </div>
                                <div class="form-submit">
                                    <input type="submit" name="connexion" value="Connexion">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div>
                        <h2>Inscription</h2>
                        <div class="sign_up">
                            <form method="POST">
                                <div>
                                    <div class="col-6">
                                        <div>
                                            <label for="nom" >Nom*</label>
                                            <input type="text" name="nom" id="nom" placeholder="ex: John" required>
                                        </div>
                                        <div>
                                            <label for="prenom">Prénom*</label>
                                            <input type="text" name="prenom" id="prenom" placeholder="ex: Doe" required>
                                        </div>
                                        <div>
                                            <label for="email">E-mail*</label>
                                            <input type="mail" name="email" id="email" placeholder="ex: john.doe@exemple.com" required>
                                        </div>
                                        <div>
                                            <label for="phone">Téléphone*</label>
                                            <input type="number" name="phone" id="phone" placeholder="ex: 0362104444" required>
                                        </div>
                                        <div>
                                            <label for="password">Mot de passe*</label>
                                            <input type="password" name="password" id="password" placeholder="Mot de passe" required>
                                        </div>
                                        <div>
                                            <label for="c_password">Confirmation*</label>
                                            <input type="password" name="c_password" id="c_password" placeholder="Confirmation" required>
                                        </div>
                                    </div>
                                    <div>
                                        <label><input type="checkbox" name="conditions" checked required> J'accepte les conditions générales d'utilisations </label>
                                    </div>
                                    <div class="form-submit">
                                        <input type="submit" name="inscription" value="Inscription">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <div class="pied">
                <div class="footer-image">
                    <img src="../images/logo-big.png" alt="Image">
                </div>
                <div class="footer-contact">
                    <h3><i></i>Nous contacter</h3>
                    <p>45, Rue Nicolas Leblanc, 59000 Lille</p>
                    <p>03 20 91 71 31</p>
                    <p>contact@inkeat.fr</p>
                </div>
                <div class="footer-plan">
                    <h3><i></i>Plan du site</h3>
                    <ul>
                        <li><a href="/index.html"><span>></span> Accueil</a></li>
                        <li><a href="carte.html"><span>></span> La carte</a></li>
                        <li><a href="reserver.html"><span>></span> Réservation</a></li>
                        <li><span>></span> CGU / CGV</li>
                    </ul>
                </div>
                <div class="footer-info">
                    <h3><i></i>Ink Eat</h3>
                    <p> Restaurant sur Lille, notre 
                        nourriture est 100% écologique
                        et contient des taux de 
                        macronutriments pensés par
                        nos spécialistes
                    </p>
                    <p>© InkEat 2021 - Tous droits réservés</p>
                </div>
            </div>
        </footer>
    
    <button class="buttonhaut" onclick="topFunction()" id="test"><i class="fas fa-arrow-up"></i></button>

    <script src="scripts/buttontop.js"></script>
    </body>
</html>