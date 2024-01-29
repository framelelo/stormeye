
<div class="modal" id="updateModal" tabindex="1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier la publication</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <!-- Image input -->
                    <div class="image-upload-btn">
                        <div class="img-container mb-3" id="previewContainer">
                            <img alt="The Eye of Storm" id="previewImage">
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
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block customise-btn mb-4 w-100">
                        Je m'exprime
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>