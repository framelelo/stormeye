<?php

function showHomePage($posts)
{
    global $isConnected, $base_url;
    ob_start();
?>
    <div class="narrow-width py-5">
        <?php if ($isConnected) { ?>
            <section class="sec-publish">
                <div class="container py-3">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn-publish custom-double-border text-center" data-bs-toggle="modal" data-bs-target="#publishModal">
                        Créer une publication...
                    </button>
                </div>
            </section>
        <?php }else{
            echo '<a class="btn-connexion text-center my-5 nounderline" href="' . $base_url . '?p=login">Se Connecter</a>';
        } ?>

        <section class="sec-posts">
            <div class="container pb-5 auth-container">
                <?php if (!$posts) {

                    echo '<h2 class="text-center text-light">Sois le premier à publier..</h2>';
                    
                }

                foreach ($posts as $p) { ?>
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
                                        <button type="button" class="dropdown-item py-2" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $p['id']; ?>">
                                            Modifier
                                        </button>
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
                                <!--  <span><i class="bi bi-chat-fill p-2"></i></span> <span class="count">44</span>
                                <span><i class="bi bi-heart-fill like-btn p-2 liked"></i></span>
                                <span class="count"> 55</span>-->
                                <span>
                                    <?php $postDate = new DateTime($p['date']);
                                    $currentDate = new DateTime();

                                    $timeAgo = $currentDate->diff($postDate);

                                    $formattedTimeAgo = '';

                                    if ($timeAgo->y > 0) {
                                        $formattedTimeAgo .= $timeAgo->y . ' an' . ($timeAgo->y > 1 ? 's' : '') . ' ';
                                    } elseif ($timeAgo->m > 0) {
                                        $formattedTimeAgo .= $timeAgo->m . ' mois' . ($timeAgo->m > 1 ? 's' : '') . ' ';
                                    } elseif ($timeAgo->d > 0) {
                                        $formattedTimeAgo .= $timeAgo->d . ' jour' . ($timeAgo->d > 1 ? 's' : '') . ' ';
                                    } elseif ($timeAgo->h > 0) {
                                        $formattedTimeAgo .= $timeAgo->h . ' hr' . ($timeAgo->h > 1 ? 's' : '') . ' ';
                                    } elseif ($timeAgo->i > 0) {
                                        $formattedTimeAgo .= $timeAgo->i . ' min' . ($timeAgo->i > 1 ? 's' : '') . ' ';
                                    } else {
                                        $formattedTimeAgo .= $timeAgo->s . ' sec' . ($timeAgo->s > 1 ? 's' : '') . ' ';
                                    }

                                    // Output the formatted time ago information
                                    echo '<span> Il y a ' . $formattedTimeAgo . '</span>'; ?></span>
                                
                            </div>
                            <p class="card-text my-3">
                                <?= $p['content'] ?>
                            </p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
    </div>

    <?php foreach ($posts as $p) { ?>

        <!--MODAL UPDATE-->

        <div class="modal" id="updateModal<?php echo $p['id']; ?>" tabindex="-1">

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modifier ma pensée...</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" enctype="multipart/form-data" action="<?= $base_url ?>?p=update&id=<?= $p['id'] ?>">
                            <!-- Image input -->
                            <div class="image-upload-btn">
                                <div class="img-container mb-3" id="previewContainer">
                                    <img alt="The Eye of Storm" id="previewImage">
                                </div>
                                <label class="image-label bg-dark w-100" for="image-upload" id="image-label">
                                    <i class="bi bi-image-fill"></i>
                                </label>
                                <input type="file" name="postPicture" class="my-2" id="image-upload" accept=".jpeg,.png,.jpg" onchange="previewFile()">
                            </div>

                            <!-- Content input -->
                            <div class="form-outline mb-3">
                                <textarea name="postContent" class="form-control-plaintext border-secondary border p-2" id="" cols="30" rows="4" placeholder="<?= $p['content'] ?>" require></textarea>
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
<?php };
    $content = ob_get_clean();
    require "layout.php";
}
