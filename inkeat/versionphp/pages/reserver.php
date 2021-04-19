<?php
    require_once '../inc/bd.php';
    require_once '../inc/functions.php';
    session_start();
    if(isset($_POST['reserver'])) {
        createReservation($_SESSION['id'], $_POST, $bdd);
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>InkEat - Restaurant futuriste</title>
        <link rel="stylesheet" href="../style/common.css" />
        <link rel="stylesheet" href="style/reserver.css" />
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
            <section>
                <h2>Reserver</h2>
                <div class="container">
                    <p>Les champs marqués d'un '*' sont obligatoire.</p>
                    <form class="form" method="POST">
                        <div class="row-one">
                            <div>
                                <label for="adultes">Nombre d'adultes* :</label>
                                <input type="number" min="0" name="adultes" id="adultes" placeholder="ex: 2" required>
                            </div>
                            <div>
                                <label for="enfants">Nombre d'enfants* :</label>
                                <input type="number" min="0" name="enfants" id="enfants" placeholder="ex: 1" required>
                            </div>
                            <div>
                                <label for="surmesure">Plats sur mesures* :</label>
                                <input type="number" min="0" name="surmesure" id="surmesure" placeholder="ex: 1" required>
                            </div>
                            <div>
                                <label for="nutri">Fichiers nutriments :</label>
                                <input type="file" name="nutri" id="nutri">
                            </div>
                            <div>
                                <label for="date">Date* :</label>
                                <input type="date" name="date" id="date" required>
                            </div>
                            <div>
                                <label for="hour">Heure* :</label>
                                <input type="time" name="hour" id="hour" placeholder="ex: 19:00" required>
                            </div>
                            <div>
                                <input type="text" name="verif" placeholder="Que font 7+2" class="input-verif" required>
                            </div>
                            <div>
                                <label><input type="checkbox" name="conditions" checked> J'accepte que mon adresse e-mail et mon numéro soient stockés pour recevoir une réponse</label>
                            </div>
                            <div class="form-submit">
                                <?php if(!empty($_SESSION['id'])) { ?>
                                    <input type="submit" name="reserver" value="RESERVER">
                                <?php } else { ?>
                                    <input type="submit"  value="Vous devez être connecté." disabled>
                                <?php } ?>
                            </div>
                        </div>
                    </form>
                </div>
            </section> 
        </main>
        <section>
            <h2>Horaires</h2>
            <div class="horaires">
                <div>
                    <h3>8H00-22H00</h3>
                    <p>LUN-VEN</p>
                </div>
                <div>
                    <h3>9H00-23H00</h3>
                    <p>SAMEDI</p>
                </div>
                <div>
                    <h3>9H00-00H00</h3>
                    <p>DIMANCHE</p>
                </div>
            </div>
        </section>
        <button class="buttonhaut" onclick="topFunction()" id="test"><i class="fas fa-arrow-up"></i></button>
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
                        <li><a href="../index.html"><span>></span> Accueil</a></li>
                        <li><a href="carte.html"><span>></span> La carte</a></li>
                        <li><a href="#"><span>></span> Réservation</a></li>
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

        <script src="../scripts/buttontop.js"></script>
        <script src="https://kit.fontawesome.com/e2f494c86d.js" crossorigin="anonymous"></script>
    </body>
</html>