<?php

ob_start();

function showHomePage(){?>
    <div class="row justify-content-evenly align-items-center">
        Le cyclone Belal a frappé violemment la région côtière, provoquant des inondations massives et des vents destructeurs. Les autorités ont lancé des opérations de secours pour évacuer les habitants et fournir une assistance d'urgence. Les dégâts matériels sont considérables, et les efforts de reconstruction sont en cours.
    </div>
    <section class="sec-publish">
        <div class="container">
            <!-- Button trigger modal -->
            <button type="button" class="btn-publish text-center" data-bs-toggle="modal" data-bs-target="#publishModal">
                J'ai des choses à dire
            </button>
            <!-- Modal -->
            <div class="modal " id="publishModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Créer une publication</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post">
                                <!-- Content input -->
                                <div class="form-outline mb-3">
                                    <textarea name="publishContent" class="form-control-plaintext border-secondary border" id="" cols="30" rows="2"></textarea>
                                </div>
                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block customise-btn mb-4 w-100">
                                    Je m'exprime
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
};
$content = ob_get_clean();
