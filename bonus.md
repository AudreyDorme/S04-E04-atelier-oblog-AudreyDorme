# Bonus

## Bonus - Sous-objets :fearful:

_On améliore la façon de stocker les données du site. Il y a quelques conséquences à gérer !_

> N'hésitez pas à faire plusieurs commits, avec des messages clairs :ok_hand:

Créer une branche `sub-objects` et se placer dedans.  

1. Remplacer le fichier inc/data.php par celui fourni dans bonus/inc/data.php.
2. Confirmer que, sur la page d'accueil et sur la page d'un article, une **Fatal Error** se déclenche au niveau des articles
    - c'est normal : les propriétés `author` et `category` sont désormais des _Objets_ (auparavant, c'était des _String_)
    - trouver comment afficher le nom de l'auteur et de la catégorie _sans modifier le fichier inc/data.php_
    - :warning: un nouveau problème va se poser, pour la gestion des liens vers les pages de l'auteur et de la catégorie  
    - temporairement désactiver les liens en mettant un _dummy id_ du type `#`
3. Confirmer que les pages d'une catégorie ou d'un auteur n'affichent plus la liste des articles
    - c'est normal : les fonctions de récupération des listes d'articles doivent tenir compte de la nouvelle façon de stocker les données
    - trouver comment corriger le problème dans les fonctions appropriées

Vérifier que l'affichage sur la page d'accueil et la page d'un article est conforme.  
Ajouter et commiter les modifications avec git :)  
Revenir sur la branche `master` et y fusionner la branche `sub-objects`.  

<details><summary>Indices</summary>

- l'erreur vient de la tentative de faire un `echo` d'un objet (instance d'une classe)
- on ne veut pas afficher l'objet complet, juste une de ses propriétés
- on peut « enchaîner » l'accès aux propriétés d'un objet dans un objet avec plusieurs opérateurs `->`

</details>

## Mega Bonus - Objets uniques

_On corrige les problèmes relevés à l'étape précédente, toute en améliorant encore le stockage des données._

> N'hésitez pas à faire plusieurs commits, avec des messages clairs :ok_hand:

Créer une branche `unique-objects` et se placer dedans.

- Il y a de la duplication de code dans `inc/data.php` : on a (potentiellement) plusieurs instances similaires créés pour un même auteur, ou une même catégorie.
- Il faut trouver un moyen d'identifier de façon _unique_ tel auteur ou telle catégorie, afin de ne plus créer ces multiples instances similaires.
- Modifier les templates pour prendre en compte ces modifications (attention, travail fastidieux).

Vérifier que l'affichage sur l'ensemble du site est conforme. Bien faire attention aux _liens_.  
Ajouter et commiter les modifications avec git :)  
Revenir sur la branche `master` et y fusionner la branche `unique-objects`.

<details><summary>Indices</summary>

- Pour identifier de façon unique une ressource, le plus simple, c'est d'avoir un _identifiant unique_ pour chaque ressource.
- Bien analyser les tableaux `$dataAuthorsList` et `$dataCategoriesList`, notamment leurs clés.

</details>

### Bonus _je m'occupe_ - Améliorations

Créer une branche `mes-ameliorations` et se placer dedans.

- Il y a encore pleins de choses qui pourraient être améliorées…
- … on te laisse effectuer ces améliorations :wink: