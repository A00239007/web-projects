
        <?php
            require 'Slim/Slim.php';
            require 'database.php';
            require 'fighter_db.php';
            require 'user_db.php';
            use Slim\Slim;
            \Slim\Slim::registerAutoloader();
            
            $app = new Slim();
            $app->get('/fighters','getFighters');
            $app->get('/users','getUsers');
            $app->get('/fighters/:id','getFighterById');
            $app->get('/users/:id','getUsersById');
            $app->get('/users/search/:query','getUserByName');
            $app->get('/fighters/search/:query','getFighterByName');
            $app->post('/fighters','addFighter');
            $app->post('/users','addUser');
            $app->put('/fighters/:id','updateFighter');
            $app->put('/users/:id','updateUser');
            $app->delete('/fighters/:id','deleteFighter');
            $app->delete('/users/:id','deleteUser');
            $app->run();
        ?>

