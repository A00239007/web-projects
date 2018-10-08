<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require 'Slim/Slim.php';
            require 'database.php';
            require 'wine_db.php';
            use Slim\Slim;
            \Slim\Slim::registerAutoloader();
            
            $app = new Slim();
            $app->get('/wines','getWines');
            $app->get('/wines/:id','getWinesById');
            $app->get('/wines/search/:query','getWinesByName');
            $app->post('/wines','addWine');
            $app->put('/wines/:id','updateWine');
            $app->delete('/wines/:id','deleteWine');
            $app->run();
        ?>
    </body>
</html>
