<?php

function createPosts()
{
    if ($_POST) {
        $id_user = $_SESSION['user']['id'];
        $content = $_POST['postContent'];
        $image = time() . '_' . $_FILES['userPicture']['name'];
        $temp_folder = $_FILES['userPicture']['tmp_name'];
        $upload_folder = ROOT_PATH . "/uploads/" . $image;

        $maxFileSize = 2097152;
        $fileSize = $_FILES['userPicture']['size'];

        // Check if a file was uploaded successfully
        if ($_FILES['userPicture']['error'] == UPLOAD_ERR_OK) {
            // Check file size
            if ($fileSize > $maxFileSize) {
                echo '<div class="modal"><p>La taille de votre image est trop lourde.</p></div>';
            } else {
                // Move uploaded file
                move_uploaded_file($temp_folder, $upload_folder);
            }
        } else {
            // No file uploaded, use default image
            $image = 'default_post_img.png';
        }

        $result = createPost($id_user, $image, $content);
        if ($result) {
            echo 'Publication créée';
        } else {
            echo 'Une erreur s\'est produite.';
        }
    }

    // showHomePage();
    $posts = getAllPosts();
    showHomePage($posts);
}


function updatePosts()
{
    if ($_POST) {
        $id = $_POST['id'];
        $content = $_POST['content'];
        $image = $_POST['image'];
        $result = updatePost($id, $image, $content);
        if ($result) {
            echo 'Publication mise à jour';
        } else {
            echo 'Une erreur s\'est produite.';
        }
    }
}

// Delete post indivually
function deletePosts()
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        deletePost($id);
    }
    header('Location: ?p=home');
}
