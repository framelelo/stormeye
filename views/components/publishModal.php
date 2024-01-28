<div class="modal" id="publishModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">J'ai des choses à dire...</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <!-- Image input -->
                    <div class="image-upload-btn text-center">
                        <label class="image-label bg-dark w-100" for="image-upload">
                            <i class="bi bi-image-fill"></i>
                        </label>
                        <input type="file" name="userPicture" id="image-upload" accept=".jpeg,.png,.jpg" onchange="previewFile()">
                        <div class="img-preview"></div>
                    </div>

                    <!-- Content input -->
                    <div class="form-outline mb-3">
                        <textarea name="postContent" class="form-control-plaintext border-secondary border p-2" id="" cols="30" rows="4"></textarea>
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