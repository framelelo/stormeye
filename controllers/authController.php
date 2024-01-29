<?php

/* 
 * Login controller
 * 
 * @return void

*/

// Login function and direction to homepage
function loginUser():void
{
    if ($_POST) {
        
        $email = $_POST['connectEmail'];
        $password = $_POST['connectPassword'];

        if ($email && $password) {
            $loginUser = loginUsers($email, $password);
            if ($loginUser) {
              header('Location: ?p=home');
            }
            else {
                echo '<div class="modal-error"><p>Une erreur s\'est produite.</p></div>'; 
            }
        } else {
            echo '<div class="modal-error"><p>Merci de remplir tous les champs.</p></div>';
        }
    }
    showLogin();
}
/* 
 * Register controller
 * 
 * @return void

*/
// Register new accounts function 
function addUsers():void
{
    if ($_POST) {
        
        $username = $_POST['registerUsername'];
        $email = $_POST['registerEmail'];
        $password = $_POST['registerPassword'];
        $confirmedPassword = $_POST['confirmRegisterPassword'];
        
        $picture = isset($_FILES ['userPicture']['name']) ? $_FILES['userPicture']['name'] : '';
        $temp_folder = $_FILES['userPicture']['tmp_name'];
        $upload_folder = ROOT_PATH . "/uploads/" . $picture;

        $maxFileSize = 2097152;
        $fileSize = $_FILES['userPicture']['size'];

        // Check if a file was uploaded successfully
        if ($picture) {
            // Check file size
            if ($fileSize > $maxFileSize) {
                echo '<div class="modal-error"><p>La taille de votre image est trop lourde.</p></div>';
            } else {
                // Move uploaded file
                move_uploaded_file($temp_folder, $upload_folder);
            }
        } 
        if ($picture && $username && $email && $password && $confirmedPassword) {
            if ($password == $confirmedPassword) {
                $registerUsers = registerUsers($picture, $username, $email, $password);
                if ($registerUsers) {
                    header('Location: ?p=login');
                }
            } else {
                echo '<div class="modal-error"><p>Mots de passe ne correspondent pas.</p></div>';
            }
        } else {
            echo '<div class="modal-error"><p>Merci de remplir tous les champs.</p></div>';
        }
    }
    showSubscription();
}

/* 
 * Logout
 * 
 * @return void

*/
// Logout function and direction to homepage
function logOut():void
{
    session_destroy();
    header('Location: ?p=login');
}