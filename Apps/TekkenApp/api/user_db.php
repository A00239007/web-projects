<?php
    function getUsers()
    {
        $query="Select * from user order by name;";
        try{
            global $db;
            $users = $db->query($query);
            $users = $users->fetchAll(PDO::FETCH_ASSOC);
            echo '{"users": '.json_encode($users).'}';
        } catch (Exception $ex) {
            echo '{"error":{"text":'.$e->getMessage().'}}';
        }
    }
    
    function getUsersById($id)
    {
        $query= "Select * from user where id = '$id';";
        try{
            global $db;
            $users = $db->query($query);
            $user = $users->fetch(PDO::FETCH_ASSOC);
            header("Content-Type: application/json",TRUE);
            echo json_encode($user);
        } catch (PDOException $ex) {
            echo '{"error":{"text":'.$ex->getMessage().'}}';
        }
    }
    
    function getUserByName($name)
    {
        $query = "select * from user where upper(name) like ".'"%'.$name.'%"'."order by name;";
        
        try
        {
            global $db;
            $users = $db->query($query);
            $user = $users->fetch(PDO::FETCH_ASSOC);
            header("Content-Type: application/json",true);
            echo json_encode($user);
        } catch (Exception $ex) {
            echo '{"error":{"text":'.$ex->getMessage().'}}';
        }
    }
    
    function addUser()
    {
        global $app;
        $request=$app->request();
        $user=json_decode($request->getBody());
        $name=$user->name;
        $email=$user->email;
        $query = "insert into user(name, email) values('$name', '$email');";
        
        try
        {
            global $db;
            $users=$db->exec($query);
            $user->id=$db->lastInsertId();
            echo json_encode($user);
        } catch (Exception $ex) {
            echo '{"error":{"text":'.$ex->getMessage().'}}';
        }
    }
    
    function updateUser($id)
    {
        global $app;
        $request=$app->request();
        $user=json_decode($request->getBody());
        $name=$user->name;
        $email=$user->email;
        $query="update user set name='$name', email = '$email' where id='$id';";
        try{
            global $db;
            $db->exec($query);
            echo json_encode($user);
        } catch (Exception $ex) {
            echo '{"error":{"text":'.$ex->getMessage().'}}';
        }
    }
    
    function deleteUser($id)
    {
        $query="delete from user where id='$id';";
        echo $query;
        try{
            global $db;
            $db->exec($query);
        } catch (Exception $ex) {
            echo '{"error":{"text":'.$ex->getMessage().'}}';
        }
    }
?>

