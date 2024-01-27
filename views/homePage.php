<?php

function showHomePage()
{
    global $isConnected;
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
<div class="narrow-width">
    <?php if($isConnected) {?>
        <section class="sec-publish">
        <div class="container py-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn-publish custom-double-border text-center" data-bs-toggle="modal" data-bs-target="#publishModal">
            Créer une publication...
            </button>
            <!-- Modal -->
            <?php require_once 'views/components/publishModal.php' ?>
        </div>
    </section>
    <?php } ?>
    
    <section class="sec-posts">
        <div class="container pb-5 auth-container">
            <div class="card p-0">
                <div class="my-3 mx-2 profile-section d-flex align-items-center">
                    <div class="custom-double-border profile-image-container">
                        <img src="https://source.unsplash.com/random/1920x1080" alt="Cyclone Belal" class="rounded-circle profile-image">
                    </div>
                    <span>Username</span>
                </div>
                <img src="https://source.unsplash.com/random/1920x1080" class="card-image-top" alt="...">
                <div class="card-body">
                    <div class="py-2 d-flex align-items-center justify-content-end border-bottom border-secondary">
                        <span><i class="bi bi-chat-fill p-2"></i></span> <span class="count">44</span><span><i class="bi bi-heart-fill like-btn p-2 liked"></i></span> <span class="count"> 55</span>
                    </div>
                    <p class="card-text mt-3">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-sm btn-primary customise-btn">... En savoir plus</a>
                </div>
            </div>
        </div>
    </section>
</div>
    
<?php
    $content = ob_get_clean();
    require "layout.php";
}
