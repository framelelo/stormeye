<!-- 
Footer will be not be displayed for some specific pages -->
<?php
     if (isset($_GET['p']) && $_GET['p'] !== 'login' && $_GET['p'] !== 'subscribe') { ?>
     <footer class="bg-c-primary text-center text-white">
      <!-- Grid container -->
      <div class="container p-4 pb-0">
          <!-- Section: Social media -->
          <section>
             <p>Le cyclone Belal a frappé violemment notre île, provoquant des inondations massives et des vents destructeurs. <br> <span>BRAVONS LA TEMPÊTE ENSEMBLE...</span></p>
          </section>
          <!-- Section: Social media -->
      </div>
      <!-- Grid container -->
  <footer class="bg-c-primary text-center mt-auto text-white">
      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          ©<?php echo date('Y'); ?> Copyright:
          <a class="text-white" href="#">The Eye Of Storm</a>
      </div>
      <!-- Copyright -->
  </footer>
  <?php }; ?>