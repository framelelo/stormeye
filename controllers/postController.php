<?php
/*
 * create post in db
 * 
 * @return void 
*/
function createPosts(): void
{
    if ($_POST) {
        $id_user = $_SESSION['user']['id'];
        $content = $_POST['postContent'];

        $image =  time() . $_FILES['userPicture']['name'];
        $temp_folder = $_FILES['userPicture']['tmp_name'];
        $upload_folder = ROOT_PATH . "/uploads/" . $image;

        $maxFileSize = 2097152;
        $fileSize = $_FILES['userPicture']['size'];

        // Check if a file was uploaded successfully
        if ($image) {
            // Check file size
            if ($fileSize > $maxFileSize) {
                echo '<div class="modal-error"><p>La taille de votre image est trop lourde.</p></div>';
            } else {
                // Move uploaded file
                move_uploaded_file($temp_folder, $upload_folder);
            }
        } else {
            // No file uploaded, use default image
            $image = '';
        }

        $result = createPost($id_user, $image, $content);
        if ($result) {
            echo header('Location: ?p=home');
        } else {
            echo '<div class="modal-error"><p>Une erreur s\'est produite.</p></div>';
        }
    }

    // showHomePage();
    $posts = getAllPosts();
    showHomePage($posts);
}
/*
 * update post in db
 * 
 * @param int $id
 * 
 * @return void

*/
function updatePosts(int $id): void
{
    global $base_url;
    
    if ($_POST) {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $content = $_POST['postContent'];
            
            $picture = null;

            if (!empty($_FILES['postPicture']['name'])) {

                $picture = $_FILES['postPicture']['name'];
                $temp_folder = time() . $_FILES['postPicture']['tmp_name'];
                $upload_folder = ROOT_PATH . "/uploads/" . $picture;

                $result = move_uploaded_file($temp_folder, $upload_folder);
                if (!$result) {
                    echo '<div class="modal-error"><p>Merci de vérifier.</p></div>';
                }
            }


            $update = updatePost($id, $picture, $content);

            if ($update) header("location:$base_url?p=home");
            else echo '<div class="modal-error"><p>Merci de vérifier !</p></div>';
        }
    }

    $posts = getAllPosts();
    showHomePage($posts);
}

/*
 * update delete post in db
 * 
 * @param int $id, 
 * @param string $picture
 * 
 * @return void

*/
// Delete post indivually
function deletePosts(int $id, string $picture): void
{
    $picturePath = "uploads/" . $picture;

    if (file_exists($picturePath)) {
        unlink($picturePath);
    }
    deletePost($id);

    header('Location: ?p=home');
}
