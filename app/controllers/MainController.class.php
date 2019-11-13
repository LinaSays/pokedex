<?php

require __DIR__.'/../DBdata.php';

class MainController {
    protected $router;

  public function __construct($router)
  {
    $this->router = $router;
  }

  public function home($viewVars = [])
  {
      $dbData = new DBData();

      $pokemons = $dbData->getAllPokemons();
      $viewVars['pokemons'] = $pokemons;
      $this->show('home', $viewVars);
  }

  public function pokemon($viewVars = [])
  {
      $dbData = new DBData();
      $typeId = $viewVars['id'];
      $pokemon = $dbData->getPokemon($typeId);
      $viewVars['pokemon'] = $pokemon;
      $this->show('pokemon', $viewVars);
  }

  public function pokemonType($viewVars = [])
  {
      $dbData = new DBData();
      $Types = $dbData->getAllTypes();
      $viewVars['types'] = $Types;
      $this->show('type', $viewVars);
  }

  public function allPokemonByType($viewVars = [])
  {
      $dbData = new DBData();
      $typeId = $viewVars['id'];
      $byType = $dbData->getAllPokemonsByType($typeId);
      $viewVars['bytype'] = $byType;
      $this->show('pokemonByType', $viewVars);
  }
  
  public function show($viewName, $viewVars = [])
  {
    $router = $this->router;

    extract($viewVars);

    // on inclue le header
    include __DIR__.'/../views/header.tpl.php';

    // puis la view demandée
    include __DIR__.'/../views/'.$viewName.'.tpl.php';

    // et enfin le footer
    include __DIR__.'/../views/footer.tpl.php';
  }
}