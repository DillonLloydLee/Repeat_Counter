<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/RepeatCounter.php";

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    $app->get('/', function() use ($app) {
        return $app['twig']->render('root.twig');
    });

    $app->get('/results', function() use ($app) {
        $this_RepeatCounter = new RepeatCounter;
        $this_number = $this_RepeatCounter->countRepeats($_GET["text"], $_GET["search"]);
        return $app['twig']->render('results.twig', array("data" => $this_number));
    });

    return $app;
 ?>
