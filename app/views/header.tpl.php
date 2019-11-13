<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= $_SERVER['BASE_URI'] ?>/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">
    <title>Pokédex</title>
</head>
<body>
    <header class="entete">
        <div><a href="<?= $router->generate('homepage') ?>" class="entete-logo">Pokédex</a></div>
        <div class="entete-menu">
            <a href="<?= $router->generate('homepage') ?>">Liste</a>
            <a href="<?= $router->generate('types') ?>">Types</a>
        </div>
    </header>
