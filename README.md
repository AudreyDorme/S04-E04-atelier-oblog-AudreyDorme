# Atelier oBlog

## Objectifs

- Avancer sur le projet oBlog :tada:
- Dynamiser le code HTML/CSS de l'intégrateur :rainbow:
- Continuer à structurer plus proprement nos données avec la POO et les `class` :nerd_face:
- :warning: Pour chaque étape, coder dans une **branche git spécifique**, puis **commiter** et enfin **fusionner dans master** une fois l'étape terminée

## Code fourni

- Une intégration HTML/CSS toute prête et déjà mise en place !
- Les pages d'accueil et d'un article sont déjà prêtes.
- Un fichier `bonus/inc/data.php` à utiliser à l'étape des bonus (donc on le laisse de côté pour le moment :pray:)
  
## Rappels divers

- Le site est structuré autour d'un fichier index.php qui affiche différents templates selon la valeur de `$_GET['page']` (ou `filter_input(INPUT_GET, 'page')`).
- Une classe définit des propriétés et des méthodes pour ses futures instances.
- Chaque propriété, chaque méthode peut être définie en accès `public` (accessible depuis l'extérieur de la classe) ou `private` (accessible uniquement depuis l'intérieur du code de la classe), selon son utilisation/but.

## Fonctionnement des pages

- La page d'accueil est composée de plusieurs templates appelés par `index.php`. On peut s'aider de ce [schéma](images/home.png) pour comprendre son fonctionnement.
- Pour la page d'un article, on se base sur l'url pour charger le bon **template** et le bon **article** depuis `data.php`. On peut aussi s'aider de ce [schéma](images/article.png) pour comprendre son fonctionnement.

## Étapes

### Étape 1 - Dynamiser l'affichage des catégories et auteurs :boom:

_On va dynamiser les templates, pour afficher les données des catégories et auteurs qui se trouvent dans le fichier data.php._

> N'hésitez pas à faire plusieurs commits, avec des messages clairs :ok_hand:

Créer une branche `dynamiser` et se placer dedans.

1. On veut dynamiser les catégories affichées dans la sidebar :
    - récupérer la liste des catégories en PHP
    - itérer sur la liste dans les templates adaptés et afficher les catégories dynamiquement
2. On veut aussi dynamiser les auteurs affichés dans la sidebar :
    - récupérer la liste des auteurs en PHP
    - itérer sur la liste dans le template adapté et afficher les auteurs dynamiquement

Pour t'aider, voici un [petit schéma](images/sidebar.png) représentant ce qu'il faut faire.

Ajouter et commiter les modifications avec git :)  
Revenir sur la branche `master` et y fusionner la branche `dynamiser`.  

<details><summary>Exemple de code pour la liste des auteurs</summary>

```html
<!-- Auteurs: https://getbootstrap.com/docs/5.0/components/card/#list-groups -->
<div class="card">
    <div  class="card-header">Auteurs</div >
    <ul class="list-group list-group-flush">
        <?php foreach ($authors as $authorId => $authorName) : ?>
        <li class="list-group-item"><?= $authorName ?></li>
        <?php endforeach; ?>
    </ul>
</div>
```

</details>

### Étape 2 - Liens internes :anchor:

_On continue à dynamiser le site, cette fois en gérant les liens entre les pages._

> N'hésitez pas à faire plusieurs commits, avec des messages clairs :ok_hand:

Créer une branche `liens` et se placer dedans.

#### Dans la sidebar à droite :

- définir le lien vers chaque page catégorie 
- l'URL d'un lien ressemblera à `index.php?page=category&id=4` (ici `4` pour la catégorie dont l'id est 4)
- définir le lien vers chaque page auteur (même principe que pour les catégories)
- l'URL d'un lien ressemblera à `index.php?page=author&id=3` (ici `3` pour l'auteur dont l'id est 3)
- :warning: **l'id doit être géré dynamiquement au sein de l'itération**

Vérifier que tous les liens fonctionnent bien.  

> :hand: Quand on clique sur les liens générés, la page affichée ne contient qu'un titre et c'est normal !  
> Les articles liés seront affichés aux étapes 4 et 5.

Ajouter et commiter les modifications avec git :)  
Revenir sur la branche `master` et y fusionner la branche `liens`.  

### Étape 3 - Classes Category & Author :sunglasses:

_On améliore la gestion des données._

> N'hésitez pas à faire plusieurs commits, avec des messages clairs :ok_hand:

Créer une branche `classes-category-author` et se placer dedans.

1. Dans le fichier `inc/data.php`, modifier le code pour utiliser les 2 variables fournies dans le spoiler ci-dessous
    - observer que les données transmises aux templates sont différentes
    - **en conséquence, il faudra plus tard (partie 3 ci-dessous) adapter le code des templates pour conserver un affichage correct, mais d'abord, nous devons créer les classes en codant la partie 2**
2. Créer deux nouvelles classes dans `inc/classes/` :
    - une classe `Category` pour structurer les données de chaque catégorie
    - une classe `Author` pour structurer les données de chaque auteur
    - ces 2 classes ressembleront beaucoup à la classe `Article` déjà créée
3. Corriger l'affichage des templates en mettant à profit ces deux nouvelles classes.
    - **rappel : `$object->property`**

Vérifier que toutes les pages sont toujours fonctionnelles.  
Ajouter et commiter les modifications avec git :)  
Revenir sur la branche `master` et y fusionner la branche `classes-category-author`.  

<details><summary>Indice(s)</summary>

- il faudra coder un ou des paramètre(s) optionnel(s) au constructeur afin de déterminer la valeur de la ou les propriété(s)

</details>

<details><summary>2 variables pour inc/data.php</summary>

```php
<?php

// [...]

// Les catégories
$dataCategoriesList = [
    // ID => objet Category
    1 => new Category('TeamBack'),
    2 => new Category('TeamFront'),
    3 => new Category('Collaboration'),
    4 => new Category('Ma Vie De Dev')
];

// Les auteurs
$dataAuthorsList = [
    // ID => objet Author
    1 => new Author('Maxime'),
    2 => new Author('Anthony'),
    3 => new Author('Alexandre'),
    4 => new Author('Dario'),
    5 => new Author('Julie'),
    6 => new Author('Lucie'),
    7 => new Author('Xavier')
];
```

</details>

### Étape 4 - Page catégorie :doughnut:

_On va améliorer la page d'une catégorie._

> N'hésitez pas à faire plusieurs commits, avec des messages clairs :ok_hand:

Créer une branche `page-category` et se placer dedans.

1. Dans le template category.tpl.php on veut afficher le nom de la catégorie dans un `<h1>` :
    - récupérer un objet `Category` à partir de son id
2. On veut également afficher la liste de tous les articles associés à cette catégorie :
    - récupérer un tableau d'objets `Article` à partir de la catégorie
    - modifier les templates pour afficher les données sur le site

Comme pour les étapes précédentes, ce sera plus clair avec [un schéma](images/categories.png)

Vérifier que la page s'affiche correctement.  
Ajouter et commiter les modifications avec git :)  
Revenir sur la branche `master` et y fusionner la branche `page-category`.  

<details><summary>Indices pour la récupération des articles d'une catégorie</summary>

- :warning: attention à ne pas récupérer **tous** les articles, mais bien uniquement ceux dont le nom de la catégorie correspond au nom de la catégorie demandée
- idée : on peut créer un tableau vide, qu'on remplira avec les articles de la catégorie, au fur et à mesure
- pour chaque article du site, **si** le nom de sa catégorie correspond à la catégorie demandée, **alors** ajouter l'article dans le tableau
- à la fin de l'itération, le tableau, à retourner, comprendra seulement les articles de la catégorie

</details>

### Étape 5 - Page auteur :icecream:

Créer une branche `page-author` et se placer dedans.

> C'est comme l'étape précédente, mais avec les auteurs au lieu des catégories :wink:

Vérifier que la page s'affiche correctement.  
Ajouter et commiter les modifications avec git :)  
Revenir sur la branche `master` et y fusionner la branche `page-author`.

**Fin de l'atelier :tada:**

## Bonus

En cliquant sur [ce lien](bonus.md), je confirme avoir terminé l'atelier avant l'heure et je confirme souhaiter être confronté à une demande qui n'aura pas été vue en cours.
