<p align="center">
  <a href="https://zupimages.net/up/24/05/83cy.png">
    <img src="[https://zupimages.net/up/24/05/83cy.png](https://zupimages.net/up/24/07/crpo.png)" alt="Logo" width=250 height=auto>
  </a>

  <h3 align="center">The Eye of Storm</h3>

</p>


## Sommaire

- [A quoi sert l'application ?](#introduction)
- [Instructions d'utilisation](#instructions-dutilisation-)
- [Comment ça marche ? ](#comment-ça-marche-)
- [Bugs et demandes](#bugs-et-demandes)
- [Créatrice](#créatrice--copyright)
- [Remerciements](#remerciements)


## Introduction

<p align="center">
 Le projet de conception du site vitrine pour l'association Well-Being of Strays avait pour objectif principal d'accroître la visibilité en ligne au-delà des réseaux sociaux. Les besoins comprenaient la présentation des animaux disponibles pour l'adoption, la facilitation de la collecte de dons via un lien PayPal, et l'information du public sur les événements à venir.</p>

  
<p align="center">  Les maquettes ont intégré des boutons 'Call-To-Action' pour encourager les dons, et la page d'accueil a été optimisée pour mettre en avant la section adoption. Sur le plan du développement, une interface utilisateur a été créée pour la gestion facile des fiches d'adoption et d'événements, avec des fonctionnalités CRUD. Un formulaire d'inscription a été ajouté pour permettre aux membres de gérer la partie dynamique du contenu, et les visiteurs peuvent consulter les fiches et utiliser un formulaire de contact. La méthodologie Agile a été suivie pour garantir la validation de chaque étape et répondre aux besoins visuels et fonctionnels de l'association.
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

## Bugs et demandes

Pour tous les bugs ou autres demandes, merci de signaler sur : framelelelo89@gmail.com



## Créatrice & copyright


- <https://github.com/framelelo>

## Remerciements

Merci pour votre intérêt à cette application que j'espère pourront servir.



Enjoy :metal:
