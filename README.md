<p align="center">
  <a href="https://zupimages.net/up/24/05/83cy.png">
    <img src="https://zupimages.net/up/24/05/83cy.png" alt="Logo" width=250 height=auto>
  </a>

  <h3 align="center">The Eye of Storm</h3>

</p>


## Sommaire

- [A quoi sert l'application ?](#introduction)
- [Instructions d'utilisation](#instructions-dutilisation-)
- [Comment ça marche ? ](#whats-included)
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

Pour trouver les liaisons entre l'application et la base de données, il faudra aller depuis la source du projet : <br>
Les fichiers permettent de gérer les données de la base de données et donc d'interagir avec :

```text
models/
 ├── authController.php
 └── postController.php
    
```
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
