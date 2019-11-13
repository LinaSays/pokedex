<?php

require __DIR__.'/../vendor/autoload.php';

require __DIR__.'/../app/controllers/MainController.class.php';

$router = new AltoRouter();
$base_uri = $_SERVER['BASE_URI'];
$router->setBasePath( $base_uri );

$router->map('GET', '/', ['MainController', 'home'], 'homepage');
$router->map('GET', '/pokemon/[i:id]', ['MainController', 'pokemon'], 'pokemon');
$router->map('GET', '/pokemons/types', ['MainController', 'pokemonType'], 'types');
$router->map('GET', '/pokemons/types/[i:id]', ['MainController', 'allPokemonByType'], 'pokemon_par_type');

$match = $router->match();

if ($match == false) {
    http_response_code(404);
    echo 'Not found';
} else {
    $target = $match['target'];
    
    $controllerName = $target[0];
    $methodName = $target[1];
  
    $controller = new $controllerName( $router );
  
    
    $viewVars = $match['params'];
    $viewVars['base_uri'] = $base_uri;
  
    $controller->$methodName($viewVars);
  
  }
