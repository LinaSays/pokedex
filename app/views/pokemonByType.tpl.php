<section class="table">

    <?php foreach ($viewVars['bytype'] as $pokemon) : ?>

        <div class="table-pokemon">
            <img src="<?= $base_uri.'/img/'.$pokemon->getNumero().'.png' ?>" alt="" class="table-pokemon__image"> 
            <p>
            <a href="<?= $router->generate('pokemon', ['id'=>$pokemon->getNumero()]) ?>">
                    #<?= $pokemon->getNumero() ?> 
                    <?= $pokemon->getNom() ?>
                </a> 
            </p>
        </div>
        
    <?php endforeach; ?>

</section>