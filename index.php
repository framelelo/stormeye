<?php

require_once 'autoload.php';
if (isset($_GET['p'])) {
    $p = $_GET['p'];
    switch ($p) {
        case 'home':
            showHomePage();
            break;
            
        case 'subscribe':
            addUsers();
            break;

        case 'login':
            loginUser();
            break;

        default:
            showNoPage();
            break;
    }
}
