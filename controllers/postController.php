<?php

function createPosts()
{
    if ($_POST) {
        $id_user = $_SESSION['user']['id'];
        $content = $_POST['postContent'];
        $image = $_POST['userPicture'];

        $result = createPost($id_user, $content, $image);
        if ($result) {
            echo 'Publication créée';
        } else {
            echo 'Une erreur s\'est produite.';
        }
    }

    showHomePage();
}

function updatePosts(){
    if ($_POST) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $image = $_POST['image'];
        $result = updatePost($id, $title, $content, $image);
        if ($result) {
            echo 'Publication mise à jour';
        } else {
            echo 'Une erreur s\'est produite.';
        }
    }
}
