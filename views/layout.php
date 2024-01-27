<!DOCTYPE html>
<html lang="fr">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!--  GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom JS -->
    <script defer src="assets/js/script.js"></script>

    <title>Eye of the Storm: Plateforme Collaborative pour le Suivi du Cyclone Belal</title>
</head>

<body>
<!-- 
Header will be not be displayed for some specific pages -->
    <?php
    if (isset ($_GET['p']) && $_GET['p'] !== 'login' && $_GET['p'] !== 'subscribe') { ?>

        <header>
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand p-3" href="#">
                    <img class="logo-img" src="assets/img/Logo - The eye of Storm.png" alt="The Eye of Storm">
                </a>
                <button class="button-profile p-3" data-toggle="collapse" data-target="#profil-Dropdown">
                    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="The Eye of Storm">
                    <p class="ml-2 arrow-profile">
                        <i class="bi bi-caret-down-fill"></i>
                    </p>
                </button>
                <div class="collapse navbar-collapse p-4" id="profil-Dropdown">
                    <ul class="navbar-nav">
                        <li>
                            <a class="dropdown-item py-2" href="#">Mon profil</a>
                        </li>
                        <li>
                            <a class="dropdown-item py-2" href="#">Me déconnecter</a>
                        </li>

                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    <?php }; ?>
    <main>
        <?php echo $content; ?>
    </main>

    <footer>

    </footer>
    <!-- BOOSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>