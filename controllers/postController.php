<?php

function createPosts()
{
    if ($_POST) {
        $id_user = $_SESSION['user']['id'];
        $content = $_POST['postContent'];
        $image =  $_FILES['userPicture']['name'];
        $temp_folder = $_FILES['userPicture']['tmp_name'];
        $upload_folder = ROOT_PATH . "/uploads/" . $image;

        $maxFileSize = 2097152;
        $fileSize = $_FILES['userPicture']['size'];

        // Check if a file was uploaded successfully
        if ($image) {
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
            echo header('Location: ?p=home');
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
    global $base_url;

    if ($_POST) {
        if (isset($_POST['postID'])) {
            $id = $_POST['postID'];
            $content = $_POST['postContent'];

            // Handle file upload
            if (!empty($_FILES['userPicture']['name'])) {
                $image = time() . '_' . $_FILES['userPicture']['name'];
                $temp_folder = $_FILES['userPicture']['tmp_name'];
                $upload_folder = ROOT_PATH . "/uploads/" . $image;

                $move = move_uploaded_file($temp_folder, $upload_folder);
                if (!$move) {
                    echo "Merci de vérifier.";
                    return;
                }
            } else {
                // If no new image is uploaded, keep the existing image name
                $image = $_FILES['userPicture']['name'];
            }

            $result = updatePost($id, $image, $content);

            if ($result) {
                header("location:$base_url?p=home");
            } else {
                echo '<p class="message px-2">Merci de vérifier !</p>';
            }
        }
    }

    showForm();
}


// Delete post indivually
function deletePosts($id, $picture)
{
    $picturePath = "uploads/" . $picture;

    if (file_exists($picturePath)) {
        unlink($picturePath);
    }
    deletePost($id);

    header('Location: ?p=home');
}
