<?php
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
function addUsers()
{
    if ($_POST) {
        
        $picture = $_POST['userPicture'];
        $username = $_POST['registerUsername'];
        $email = $_POST['registerEmail'];
        $password = $_POST['registerPassword'];
        $confirmedPassword = $_POST['confirmRegisterPassword'];
        

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


