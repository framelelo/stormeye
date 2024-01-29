<?php

require_once 'autoload.php';

if (isset($_GET["p"])) {
    $p = $_GET["p"];

    switch ($p) {
        case 'home':
            createPosts();
            break;

        case 'subscribe':
            addUsers();
            break;

        case 'login':
            loginUser();
            break;

        case 'logout':
            logOut();
            break;

        case 'delete':
            if (isset($_GET['id']) && isset($_GET['image'])) {
                $id = $_GET['id'];
                $picture = $_GET['image'];

                deletePosts($id, $picture);
            }
            break;

        case 'update':
            updatePosts();
            break;
        default:
            showNoPage();
            break;
    }
}
