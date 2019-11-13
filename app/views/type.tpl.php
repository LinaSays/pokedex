<section class="type">
    <p>Cliquez sur un type pour voir tous les Pokémon de ce type</p>
        <?php foreach ($viewVars['types'] as $type) : ?>

            <a href="<?= $router->generate('pokemon_par_type', ['id'=>$type->getId()]) ?>" class="type-list" style="background-color: #<?= $type->getColor() ?>">
                <?= $type->getName() ?>
            </a>
            
        <?php endforeach; ?>

</section>