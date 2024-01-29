<?php

function showForm($post) {
    ob_start();
    ?>

    <div class="narrow-width d-flex justify-content-center flex-column h-100">
            <div class="card bg-light my-4 p-5">
                    <h5 class="text-center">Modifier la publication</h5>
                
                <div class="content">
                    <form method="post" enctype="multipart/form-data" action="?p=update">
                        <!-- Image input -->
                        <div class="image-upload-btn">
                        <div class="img-container img-preview" <?php if (!isset($post['image'])) ?> id="previewContainer">
                            <img src="uploads/<?= isset($post['image']) ? $post['image'] : ''; ?>" alt="Animaux en adoption à l'ile Maurice" class="img-fluid">
                        </div>
                            <label class="image-label bg-dark w-100" for="image-upload" id="image-label">
                                <i class="bi bi-image-fill"></i>
                            </label>
                            <input type="file" name="userPicture" id="image-upload" accept=".jpeg,.png,.jpg" onchange="previewFile()">
                        </div>
                        <!-- Content input -->
                        <div class="form-outline mb-3">
                            <textarea name="postContent" class="form-control-plaintext border-secondary border p-2" id="" cols="30" rows="4"></textarea>
                        </div>
                        
                        <input type="hidden" name="postID" value="<?php echo $_GET['id']; ?>">
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block customise-btn mb-4 w-100">
                            Je m'exprime plus encore
                        </button>
                    </form>
                </div>
            </div></div>r
    <?php
    $content = ob_get_clean();
    require_once 'layout.php';
}