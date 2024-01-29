<?php

// Login function and direction to homepage
function loginUser()
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
                echo 'Une erreur s\'est produite.'; 
            }
        } else {
            echo 'Merci de remplir tous les champs.';
        }
    }
    showLogin();
}

// Register new accounts function 
function addUsers()
{
    if ($_POST) {
        
        $picture = $_POST['userPicture'];
        $username = $_POST['registerUsername'];
        $email = $_POST['registerEmail'];
        $password = $_POST['registerPassword'];
        $confirmedPassword = $_POST['confirmRegisterPassword'];
        
        $picture = $_FILES['userPicture']['name'];
        $temp_folder = $_FILES['userPicture']['tmp_name'];
        $upload_folder = ROOT_PATH . "/uploads/" . $picture;

        $maxFileSize = 2097152;
        $fileSize = $_FILES['userPicture']['size'];
        var_dump($fileSize);

        // Check if a file was uploaded successfully
        if ($picture) {
            // Check file size
            if ($fileSize > $maxFileSize) {
                echo '<div class="modal"><p>La taille de votre image est trop lourde.</p></div>';
            } else {
                // Move uploaded file
                move_uploaded_file($temp_folder, $upload_folder);
            }
        } else {
            // No file uploaded, use default image
            $picture = 'default_post_img.png';
        }


        if ($picture && $username && $email && $password && $confirmedPassword) {
            if ($password == $confirmedPassword) {
                $registerUsers = registerUsers($picture, $username, $email, $password);
                if ($registerUsers) {
                    header('Location: ?p=login');
                }
            } else {
                echo 'Mots de passe ne correspondent pas';
            }
        } else {
            echo 'Merci de remplir tous les champs.';
        }
    }
    showSubscription();
}

// Logout function and direction to homepage
function logOut()
{
    session_destroy();
    header('Location: ?p=home');
}