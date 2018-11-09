<?php
    function getFighters()
    {
        $query="Select * from fighter order by name;";
        try{
            global $db;
            $fighters = $db->query($query);
            $fighter = $fighters->fetchAll(PDO::FETCH_ASSOC);
            echo '{"fighters": '.json_encode($fighter).'}';
        } catch (Exception $ex) {
            echo '{"error":{"text":'.$ex->getMessage().'}}';
        }
    }
    
    function getFighterById($id)
    {
        $query= "Select * from fighter where id = '$id';";
        try{
            global $db;
            $fighters = $db->query($query);
            $fighter = $fighters->fetch(PDO::FETCH_ASSOC);
            header("Content-Type: application/json",TRUE);
            echo json_encode($fighter);
        } catch (PDOException $ex) {
            echo '{"error":{"text":'.$ex->getMessage().'}}';
        }
    }
    
    function getFighterByName($name)
    {
        $query = "select * from fighter where upper(name) like ".'"%'.$name.'%"'."order by name;";
        
        try
        {
            global $db;
            $fighters = $db->query($query);
            $fighter = $fighters->fetch(PDO::FETCH_ASSOC);
            header("Content-Type: application/json",true);
            echo json_encode($fighter);
        } catch (Exception $ex) {
            echo '{"error":{"text":'.$ex->getMessage().'}}';
        }
    }
    
    function addFighter()
    {
        global $app;
        $request=$app->request();
        $fighter=json_decode($request->getBody());
        $name=$fighter->name;
        $play_style=$fighter->play_style;
        $age=$fighter->age;
        $gender=$fighter->gender;
        $description=$fighter->description;
        $query = "insert into fighter(name, play_style, age, gender, description) values('$name', '$play_style', '$age', '$gender', '$description');";
        
        try
        {
            global $db;
            $db->exec($query);
            $fighter->id=$db->lastInsertId();
            echo json_encode($fighter);
        } catch (Exception $ex) {
            echo '{"error":{"text":'.$ex->getMessage().'}}';
        }
    }
    
    function updateFighter($id)
    {
        global $app;
        $request=$app->request();
        $fighter=json_decode($request->getBody());
        $name=$fighter->name;
        $play_style=$fighter->play_style;
        $age=$fighter->age;
        $gender=$fighter->gender;
        $description=$fighter->description;
        $query="update fighter set name='$name', play_style='$play_style', age='$age', gender='$gender', description='$description' where id='$id';";
        try{
            global $db;
            $db->exec($query);
            echo json_encode($fighter);
        } catch (Exception $ex) {
            echo '{"error":{"text":'.$ex->getMessage().'}}';
        }
    }
    
    function deleteFighter($id)
    {
        $query="delete from fighter where id='$id';";
        echo $query;
        try{
            global $db;
            $db->exec($query);
        } catch (Exception $ex) {
            echo '{"error":{"text":'.$ex->getMessage().'}}';
        }
    }
?>

