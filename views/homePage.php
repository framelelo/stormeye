<?php

function showHomePage()
{
    ob_start();
?>
    <div class="container">
        <div class="row justify-content-evenly align-items-center">
            <p>
                Le cyclone Belal a frappé violemment notre île, provoquant des inondations massives et des vents destructeurs.

            </p>
            <p> Les autorités ont lancé des opérations de secours pour évacuer les habitants et fournir une assistance d'urgence. Les dégâts matériels sont considérables, et les efforts de reconstruction sont en cours.
            </p>
        </div>
    </div>

    <section class="sec-publish">
        <div class="container">
            <!-- Button trigger modal -->
            <button type="button" class="btn-publish text-center" data-bs-toggle="modal" data-bs-target="#publishModal">
                J'ai des choses à dire
            </button>
            <!-- Modal -->
           <?php require_once 'views/components/publishModal.php' ?>
        </div>
    </section>
    <section class="sec-posts">
        <div class="container my-3 auth-container">
            <div class="row my-5">
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://source.unsplash.com/random/1920x1080" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-sm btn-primary customise-btn">... En savoir plus</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://source.unsplash.com/random/1920x1080" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-sm btn-primary customise-btn">... En savoir plus</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://source.unsplash.com/random/1920x1080" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-sm btn-primary customise-btn">... En savoir plus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
    $content = ob_get_clean();
    require "layout.php";
}
