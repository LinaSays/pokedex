<?php

require __DIR__.'/models/Pokemon.class.php';
require __DIR__.'/models/Type.class.php';

$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

class DBData
{
    private $pdo;

    /**
     *  DB connection
     */
    public function __construct()
    {
        $dsn = 'mysql:dbname=pokedex;host=localhost;charset=UTF8';
        $username = getenv('USERNAME');
        $password = getenv('PASSWORD');
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ];
        $this->pdo = new PDO($dsn, $username, $password, $options);
    }

    public function getAllPokemons()
    {
      $query = "SELECT * FROM pokemon";
      $statement = $this->pdo->prepare($query);
      $statement->execute();
      $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Pokemon');
      return $results;
    }

    public function getPokemon($typeId)
    {
      $query = "SELECT *
      FROM pokemon
      LEFT JOIN pokemon_type
      ON pokemon.numero=pokemon_numero
      LEFT JOIN type
      ON type_id=type.id
      WHERE numero=:id";
      $statement = $this->pdo->prepare($query);
      $statement->execute([':id' => $typeId]);
      $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Pokemon');
      return $results;
    }

    public function getAllTypes()
    {
      $query = "SELECT * FROM type ORDER BY name";
      $statement = $this->pdo->prepare($query);
      $statement->execute();
      $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Type');
      return $results;
    }

    public function getAllPokemonsByType($typeId)
    {
        $query = "SELECT pokemon.nom, type.name, pokemon.numero, pokemon_numero
        FROM pokemon
        LEFT JOIN pokemon_type
        ON pokemon.numero=pokemon_numero
        LEFT JOIN type
        ON type_id=type.id
        WHERE type_id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->execute([':id' => $typeId]);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, 'Pokemon');
        return $results;
    }
}