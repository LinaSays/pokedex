<section class="detail-pokemon">
<h1 class="detail-pokemon__titre">Détails de <?= $viewVars['pokemon']['0']->getNom() ?></h1>
<div class="info">
    <div class="info-image">
        <img src="<?= $base_uri.'/img/'.$viewVars['pokemon']['0']->getNumero().'.png' ?>" alt="" class="info-image__position">
    </div>
    <div class="info-text">
        <h3 class="info-text__titre">
            #<?= $viewVars['pokemon']['0']->getNumero() ?> 
            <?= $viewVars['pokemon']['0']->getNom() ?>
        </h3>

        <div class="info-text__type">
            <?php foreach ($viewVars['pokemon'] as $pokemon) : ?>
                <div>
                    <a href="<?= $router->generate('pokemon_par_type', ['id'=>$pokemon->getType_id()]) ?>" class="info-text__list" style="background-color: #<?= $pokemon->getColor() ?>">
                    <?= $pokemon->getName() ?></a>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div>
            Statistiques
        </div>

        <div class="stat">
            <div class="stat-nom">
                <p>PV</p>
                <p>Attaque</p>
                <p>Défense</p>
                <p>Attaque Spé.</p>
                <p>Défense Spé.</p>
                <p>Vitesse</p>
            </div>

            <div>
                <p><?= $viewVars['pokemon']['0']->getPv() ?></p>
                <p><?= $viewVars['pokemon']['0']->getAttaque() ?></p>
                <p><?= $viewVars['pokemon']['0']->getDefense() ?></p>
                <p><?= $viewVars['pokemon']['0']->getAttaque_spe() ?></p>
                <p><?= $viewVars['pokemon']['0']->getDefense_spe() ?></p>
                <p><?= $viewVars['pokemon']['0']->getVitesse() ?></p>
            </div>

            <div>
                <div class="stat-bar-total">
                    <div class="stat-bar-value" style="width: <?=  $viewVars['pokemon']['0']->getPv() * 100 / 255 ?>%;"></div>
                </div>

                <div class="stat-bar-total">
                    <div class="stat-bar-value" style="width: <?=  $viewVars['pokemon']['0']->getAttaque() * 100 / 255 ?>%;"></div>
                </div>

                <div class="stat-bar-total">
                    <div class="stat-bar-value" style="width: <?=  $viewVars['pokemon']['0']->getDefense() * 100 / 255 ?>%;"></div>
                </div>

                <div class="stat-bar-total">
                    <div class="stat-bar-value" style="width: <?=  $viewVars['pokemon']['0']->getAttaque_spe() * 100 / 255 ?>%;"></div>
                </div>

                <div class="stat-bar-total">
                    <div class="stat-bar-value" style="width: <?=  $viewVars['pokemon']['0']->getDefense_spe() * 100 / 255 ?>%;"></div>
                </div>

                <div class="stat-bar-total">
                    <div class="stat-bar-value" style="width: <?=  $viewVars['pokemon']['0']->getVitesse() * 100 / 255 ?>%;"></div>
                </div>
               
            </div>
        </div>
    </div>
</div>
    
<p class="back">
    <a href="<?= $router->generate('homepage') ?>">Revenir à la liste</a>
</p>
</section>