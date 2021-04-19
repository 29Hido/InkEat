<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>InkEat - Restaurant futuriste</title>
        <link rel="stylesheet" href="../style/common.css" />
        <link rel="stylesheet" href="style/eco.css" />
    </head>
    <body>
        <header>
            <?php include '../inc/nav.php'; ?>
            <div class="header-main">
                <div class="header-main-image">
                    <img src="images/en-construction.png" alt="Image"/>
                </div>
                <div class="header-main-text">
                    <h1>InkEat</h1>
                    <p>3.. 2.. 1.. Goûtez au futur !</p>
                    <a href="../index">Découvrir</a>
                </div>
            </div>
        </header>

        <main>
            <div class="conteneur">
                <div>
                    <p>
                        Nous sommes deux étudiants de l'IUT A de Lille en DU Tremplin Informatique, au cours de notre formation, nous devons de réaliser le site internet d'un restaurant original.
                    </p>
                </div>
                <div>
                    <p>
                        Nous avons alors imaginé InkEat, un restaurant se basant sur l'impression 3D pour réaliser ses plats.
                        En effet, l'impression 3D permet aujourd'hui d'imprimer des repas comestible.
                        Le principal avantage est l'écologie. Ce procédé permet principalement l'utilisation de macro nutriments d'animaux peu appétissant en leur donnant un visuel agréable.
                    </p>
                </div>
                <div>
                    <p>
                        En effet, nous pouvons par exemple utiliser de la protéine de cricket lors de l'impression.
                        Un élevage de cricket est bien plus simple, rapide et n'émet peu de gaz a effet de serre comparé a un élevage de bœuf.
                        Pour 100 grammes, un steak haché moyen offre environ 25 grammes de protéines ; pour la même quantité, c’en est 69 grammes que l’on trouve dans les criquets. Les insectes comestibles sont également très riches en acides gras insaturés, comme les omégas 3 et 6 (qui aident à lutter contre le cholestérol), et en minéraux comme le fer et le calcium.
                    </p>
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
                        <li><a href="#"><span>></span> Accueil</a></li>
                        <li><a href="pages/carte.html"><span>></span> La carte</a></li>
                        <li><a href="pages/reserver.html"><span>></span> Réservation</a></li>
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
        </body>
</html>