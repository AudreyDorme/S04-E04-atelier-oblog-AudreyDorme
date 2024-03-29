<?php

// index.php est le fichier point d'entrée unique de notre site
// => quelle que soit la page demandée, on passe toujours et
// uniquement par index.php
// Avantage, on factorise une partie du code qui est nécessaire à
// toutes les pages, par exemple l'inclusion de la classe Article
// ou l'inclusion des templates header et footer

// ===========================================================
// Inclusion des fichiers nécessaires
// ===========================================================

require __DIR__ . '/inc/classes/Article.php';
require __DIR__ . '/inc/classes/Author.php';
require __DIR__ . '/inc/classes/Category.php';
// ===========================================================
// Récupération des données nécessaires à toutes les pages
// du site (pour le moment on ne récupère que la page à
// afficher, mais d'autres données viendront se rajouter
// plus tard)
// ===========================================================

// -----------------------------------------------------
// Récupération de la page à afficher
// -----------------------------------------------------

// Par défaut, on considère qu'on affichera la page d'accueil
$pageToDisplay = 'home';
// Mais si un paramètre 'page' est présent dans l'URL, c'est
// qu'on veut afficher une autre page
if (isset($_GET['page']) && $_GET['page'] !== '') {
    $pageToDisplay = $_GET['page'];
}

// ===========================================================
// Chaque page nécessite une préparation différente car elle
// affiche des informations différentes
// ===========================================================

// ------------------
// Page d'Accueil
// ------------------
if ($pageToDisplay === 'home') {
    // Récupération du tableau Php contenant la liste
    // d'objets Article
    require __DIR__ . '/inc/data.php';
    $articlesList = $dataArticlesList;
} else if ($pageToDisplay === 'article') {
    // ------------------
    // Page Article
    // ------------------

    // Récupération du tableau Php contenant la liste
    // d'objets Article
    require __DIR__ . '/inc/data.php';
    $articlesList = $dataArticlesList;
    // On souhaite récupérer uniquement les données de l'article
    // à afficher
    $articleId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    // filter_input renvoie null si la paramètre n'existe pas
    // et false si le filtre de validation échoue
    // On s'assure donc de ne pas tomber ni sur false, ni sur null
    if ($articleId !== false && $articleId !== null) {
        $articleToDisplay = $articlesList[$articleId];
    } else {
        // Si l'id n'est pas fourni, on affiche la page d'accueil
        // plutôt que d'avoir un message d'erreur
        $pageToDisplay = 'home';
    }

} else if ($pageToDisplay === 'author') {
    // ------------------
    // Page Auteur
    require __DIR__ . '/inc/data.php';
    $authorsList = $dataAuthorsList;

    $authorId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    // filter_input renvoie null si la paramètre n'existe pas
    // et false si le filtre de validation échoue
    // On s'assure donc de ne pas tomber ni sur false, ni sur null
    if ($authorId !== false && $authorId !== null) {
        $authorToDisplay = $authorsList[$authorId];
    } else {
        // Si l'id n'est pas fourni, on affiche la page d'accueil
        // plutôt que d'avoir un message d'erreur
        $pageToDisplay = 'home';
    }

} else if ($pageToDisplay === 'category') {
    // ------------------
    // Page Catégorie
    require __DIR__ . '/inc/data.php';
    $categoriesList = $dataCategoriesList;

    $categorieId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    // filter_input renvoie null si la paramètre n'existe pas
    // et false si le filtre de validation échoue
    // On s'assure donc de ne pas tomber ni sur false, ni sur null
    if ($categorieId !== false && $categorieId !== null) {
        $categorieToDisplay = $categoriesList[$categorieId];

        // on veut creer un tableau avec les articles de categorieId (l'id recupéré dans l'url)
        $categorieId = [];
        // creer un tableau vide categArticles
        $cateArticle = [];
        // parcourir le tableau de tous les articles 
foreach ($dataArticlesList as $article){
// si l'article en cours à la categorie égale à $categorieToDisplay->category alors on l'ajoute dans le tableau categArticles
    if ($categorieToDisplay == $article->category){
        $cateArticle = [$article->category];
        var_dump ($cateArticle);
        // var_dump($article);
    }
}

        // le tableau categArticle sera dispo dans le template category.tpl.php il restera plus qu'a afficher les articles de ce tableau
    } else {
        // Si l'id n'est pas fourni, on affiche la page d'accueil
        // plutôt que d'avoir un message d'erreur
        $pageToDisplay = 'home';
    }
}
    // ------------------


// ===========================================================
// Affichage
// ===========================================================


// Rappel : les variables définies dans index.php, et dans les
// fichiers inclus par index.php (inc/data.php par exemple)
// seront accessibles dans le code des templates inclus
// ci-dessous

require __DIR__ . '/inc/templates/header.tpl.php';
require __DIR__ . '/inc/templates/' . $pageToDisplay . '.tpl.php';
require __DIR__ . '/inc/templates/footer.tpl.php';