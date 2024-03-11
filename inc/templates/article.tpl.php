    <!-- Par défaut (= sur mobile) mon element <main> prend toutes les colonnes (=12)
            MAIS au dela d'une certaine taille, il n'en prendra plus que 9
            https://getbootstrap.com/docs/4.1/layout/grid/#grid-options -->
            <main class="col-lg-9">

    <!-- Je dispose une card: https://getbootstrap.com/docs/4.1/components/card/ -->
    <article class="card">
    <div class="card-body">
        <h2 class="card-title"><?= $articleToDisplay->title ?></h2>
        <p class="infos">
        Posté par <a href="#" class="card-link"><?= $articleToDisplay->author ?></a> le <time datetime="<?= $articleToDisplay->date ?>"><?= $articleToDisplay->getDateFr() ?></time> dans <a href="#"
            class="card-link">#<?= $articleToDisplay->category ?></a>
        </p>
        <p class="card-text">
            <?= $articleToDisplay->content ?>
        </p>
    </div>
    </article>

    <!-- Je met un element de navigation: https://getbootstrap.com/docs/4.1/components/pagination/ -->
    <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-between">
        <li class="page-item"><a class="page-link" href="index.php"><i class="fa fa-arrow-left"></i> Retour à l'accueil</a></li>
    </ul>
    </nav>

    </main>
