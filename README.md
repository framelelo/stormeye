<p align="center">
  <a href="https://zupimages.net/up/24/05/83cy.png">
    <img src="https://zupimages.net/up/24/05/83cy.png" alt="Logo" width=250 height=auto>
  </a>

  <h3 align="center">The Eye of Storm</h3>

</p>


## Sommaire

- [A quoi sert l'application ?](#introduction)
- [Instructions d'utilisation](#instructions-dutilisation-)
- [Comment ça marche ? ](#comment-ca-marche-)
- [Bugs and feature requests](#bugs-and-feature-requests)
- [Creators](#creators)
- [Thanks](#thanks)
- [Copyright and license](#copyright-and-license)


## Introduction

<p align="center">
    The Eye of Storm est une plateforme en ligne permettant aux utilisateurs de publier des informations concernant le cyclone Belal...
  </p>
<p align="center">
    Le partage d'information et d'image pour que tous les usagers de l'application soit au courant des dégâts ou avancés du cyclone...
  </p>

## Instructions d'utilisation : 

- Enregistrement d'un compte en un clic et moins d'une minute :
  -  Une photo de votre plus beau :)
  -  Nom d'utilisateur
  -  Email
  -  Mot de passe

- Connexion
  Aussi simple que bonjour, il faut entrer : 
  -  Email
  -  Mot de passe
 
- Publier votre première publication dans toujours le respect et la courtoisie :
  -  Télécharger votre image 
  -  Un petit commentaire


## Comment ça marche ?

Le projet a été conçu sur la bse d'un MVC classique avec donc des dossiers pour séparer les fichiers en fonction de leur utilité. <br>

Pour trouver les liaisons entre l'application et la base de données, il faudra aller depuis la source du projet : <br>
Les fichiers permettent de gérer les données de la base de données et donc d'interagir avec, les fichiers concernés pour exécuter les requêtes sont :

```text
models/
 ├── authModel.php
 └── postmodel.php
    
```

Exemple d'une fonction pour la connexion d'utilisateur :<br>

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

Pour les controllers qui récupèrent les valeurs des champs depuis les différents formulaires, ils sont accessibles :

```text
controllers/
 ├── authController.php
 └── postController.php
    
```

Un exemple de la fonction depuis le dossier Controllers, pour la création de post :

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

## Bugs and feature requests

Have a bug or a feature request? Please first read the [issue guidelines](https://reponame/blob/master/CONTRIBUTING.md) and search for existing and closed issues. If your problem or idea is not addressed yet, [please open a new issue](https://reponame/issues/new).



## Creators

**Creator 1**

- <https://github.com/framelelo>

## Thanks

Some Text

## Copyright and license

Code and documentation copyright 2023-2024 the authors. Code released under the [MIT License](https://reponame/blob/master/LICENSE).

Enjoy :metal:
