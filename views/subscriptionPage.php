<?php

ob_start();
function showSubscription()
{
?>
  <!-- Section: Design Block -->
  <section class="bg-container overflow-hidden">
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
      <div class="row gx-lg-5 align-items-center mb-5">
        <div class="col-lg-5 mb-5 mb-lg-0 position-relative">
          <div class="card bg-glass">
            <div class="card-body px-4 py-5 px-md-5">
              <h2 class="mb-4 text-center">S'inscrire</h2>
              <form method="post" enctype="multipart/form-data">

                <!-- Username input -->
                <div class="image-upload-btn text-center">
                  <label class="title-image rounded-circle bg-dark" for="image-upload">
                    <i class="bi bi-person-bounding-box"></i>
                  </label>
                  <input type="file" name="userPicture" id="image-upload" accept=".jpeg,.png,.jpg" onchange="previewFile()">

                </div>


                <!-- Username input -->
                <div class="form-outline mb-3">
                  <input type="text" class="form-control-plaintext border-secondary border-top-0 border-right-0 border-left-0 shadow-none" name="registerUsername" placeholder="Nom" required>
                </div>
                <!-- Email input -->
                <div class="form-outline mb-3">
                  <input type="email" class="form-control-plaintext border-secondary border-top-0 border-right-0 border-left-0 shadow-none" name="registerEmail" placeholder="Email" required>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-3">
                  <input type="password" class="form-control-plaintext border-secondary border-top-0 border-right-0 border-left-0 shadow-none" name="registerPassword" placeholder="Mot de passe" required>
                </div>

                <!-- Password Confirmation input -->
                <div class="form-outline mb-3">
                  <input type="password" class="form-control-plaintext border-secondary border-top-0 border-right-0 border-left-0 shadow-none" name="confirmRegisterPassword" placeholder="Confirmer le mot de passe" required>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block customise-btn mb-4 w-100">
                  S'inscrire
                </button>

                <!-- Register buttons -->
                <div class="text-center">
                  <div>
                    <p class="mb-0">J'ai déjà un compte : <a href="?p=login" class="customise-link">Se connecter</a>
                    </p>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-6 mb-5 mb-lg-0 d-none d-lg-block" style="z-index: 10">
          <h1 class="my-3 display-5 fw-bold ls-tight heading">
          The Eye Of  Storm <br>
           
          </h1>
          <h2 class="headline text-light">Bravons la tempête ENSEMBLE</h2>
         
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->

<?php
};
$content = ob_get_clean();
