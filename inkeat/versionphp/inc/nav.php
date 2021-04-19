<?php 
    session_start();
?>
<nav>
    <a href="/inkeat/index"><img src="/inkeat/images/logo-small.png" alt="Logo"></a>
    <input type="checkbox" id="expandNav">
    <label for="expandNav" class="open-nav-responsive"><img src="/inkeat/images/icons/bars-solid.svg" alt="image-bars"></label>
    <ul>
        <a href="/inkeat/index"><li>Accueil</li></a>
        <a href="/inkeat/pages/carte"><li>Carte</li></a>
        <a href="/inkeat/pages/reserver"><li>Réserver</li></a>
        <a href="/inkeat/index#contact"><li>Contact</li></a>
        <?php if(!empty($_SESSION)) { ?>
            <a href="/inkeat/pages/user"><li>Mon compte</li></a>
            <a href="/inkeat/pages/logout"><li>Déconnexion</li></a>
        <?php } else { ?>
            <a href="/inkeat/pages/login"><li>Espace client</li></a>
        <?php } ?>
    </ul>
</nav>