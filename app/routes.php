<?php

use Symfony\Component\HttpFoundation\Request;


// Home page

$app->get('/', function () use ($app) {
    $articles = $app['dao.movie']->findAll();
    return $app['twig']->render('index.html.twig', array('movies' => $movies));
})->bind('home');


$app['dao.movies'] = $app->share(function ($app) {
    $movieDAO = new MyMovies\DAO\MovieDAO($app['db']);
    $movieDAO->setCategorieDAO($app['dao.categorie']);
    return $movieDAO;
});

// Détails sur un film
$app->get('/movie/{id}', function($id) use ($app) {
    $medicament = $app['dao.movie']->find($id);
    return $app['twig']->render('movie.html.twig', array('movie' => $movie));
})->bind('movie');