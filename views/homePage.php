<?php

function showHomePage($posts)
{
    global $isConnected, $base_url;
    ob_start();
?>
    <!-- <div class="container">
        <div class="row justify-content-evenly align-items-center">
            <p>
                Le cyclone Belal a frappé violemment notre île, provoquant des inondations massives et des vents destructeurs.

            </p>
            <p> Les autorités ont lancé des opérations de secours pour évacuer les habitants et fournir une assistance d'urgence. Les dégâts matériels sont considérables, et les efforts de reconstruction sont en cours.
            </p>
        </div>
    </div> -->
    <div class="narrow-width py-5">
        <?php if ($isConnected) { ?>
            <section class="sec-publish">
                <div class="container py-3">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn-publish custom-double-border text-center" data-bs-toggle="modal" data-bs-target="#publishModal">
                        Créer une publication...
                    </button>
                    <?php require_once 'views/components/publishModal.php'; ?>
                </div>
            </section>
        <?php } ?>

        <section class="sec-posts">
            <div class="container pb-5 auth-container">
                <?php foreach ($posts as $p) { ?>
                    <div class="card my-5 p-0">
                        <div class="my-3 mx-2 profile-section d-flex align-items-center justify-content-between">
                            <div class="left-content d-flex align-items-center">
                                <div class="custom-double-border profile-image-container">
                                    <img src="uploads/<?= getUserImage($p['id_user']) ?>" alt="Cyclone Belal" class="rounded-circle profile-image">

                                </div>
                                <span><?= getUsername($p['id_user']) ?></span>
                            </div>
                            <?php if ($isConnected && $p['id_user'] == $_SESSION['user']['id']) { ?>
                                <div class="dropdown">
                                    <button class="btn dropdown" type="button" id="settingsDropdown" data-toggle="dropdown">
                                        <i class="bi bi-three-dots"></i>
                                    </button>
                                
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item py-2" href="<?php $base_url ?>?p=update&id=<?= $p['id'] ?>">Modifier</a>
                                        <form action="<?= $base_url ?>?p=delete&id=<?= $p['id'] ?> &image=<?= $p['image'] ?>" method="post">
                                            <button type="submit" class="dropdown-item py-2">Supprimer</button>
                                        </form>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                        <img src="uploads/<?= $p['image'] ?>" class="card-image-top" alt="...">
                        <div class="card-body">
                            <div class="py-2 d-flex align-items-center justify-content-end border-bottom border-secondary">
                                <span><i class="bi bi-chat-fill p-2"></i></span> <span class="count">44</span>
                                <span><i class="bi bi-heart-fill like-btn p-2 liked"></i></span>
                                <span class="count"> 55</span>
                            </div>
                            <p class="card-text mt-3">
                                <?= $p['content'] ?>
                            </p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
    </div>

<?php
    $content = ob_get_clean();
    require "layout.php";
}
