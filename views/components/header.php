    <!-- 
Header will be not be displayed for some specific pages -->
    <?php
    global $base_url, $isConnected;
    if (isset($_GET['p']) && $_GET['p'] !== 'login' && $_GET['p'] !== 'subscribe') { ?>
        <header class="sticky-top">
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand px-3 py-2" href="<?php $base_url ?>?p=home">
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
                        <?php if ($isConnected) { ?>
                            <li class="text-light border-bottom mb-3 text-username"><?php echo $_SESSION['user']['username'];?></li>
                            <li>
                                <a class="dropdown-item py-2" href="<?php $base_url ?>?p=profile">Mon profil</a>
                            </li>
                            <li>
                                <a class="dropdown-item py-2" href="<?php $base_url ?>?p=logout">Me déconnecter</a>
                            </li>
                        <?php } else { ?>
                            <li>
                                <a class="dropdown-item py-2" href="<?php $base_url ?>?p=login">Se Connecter</a>
                            </li>
                            <li>
                                <a class="dropdown-item py-2" href="<?php $base_url ?>?p=subscribe">S'inscrire</a>
                            </li>
                        <?php }; ?>
                    </ul>
                </div>
            </nav>
        </header>
    <?php }; ?>