<?php
    function getWines()
    {
        $query="Select * from wine order by name;";
        try{
            global $db;
            $wines = $db->query($query);
            $wines = $wines->fetchAll(PDO::FETCH_ASSOC);
            echo '("wines": '.json_encode($wines).')';
        } catch (Exception $ex) {
            echo '{"error":{"text":'.$e->getMessage().'}}';
        }
    }
    
    function getWinesById($id)
    {
        $query= "Select * from wine where id = '$id';";
        try{
            global $db;
            $wines = $db->query($query);
            $wine = $wines->fetch(PDO::FETCH_ASSOC);
            header("Content-Type: application/json",TRUE);
            echo json_encode($wine);
        } catch (PDOException $ex) {
            echo '{"error":{"text":'.$ex->getMessage().'}}';
        }
    }
    
    function getWinesByName($name)
    {
        $query = "select * from wine where upper(name) like ".'"%'.$name.'%"'."order by name;";
        
        try
        {
            global $db;
            $wines = $db->query($query);
            $wine = $wines->fetch(PDO::FETCH_ASSOC);
            header("Content-Type: application/json",true);
            echo json_encode($wine);
        } catch (Exception $ex) {
            echo '{"error":{"text":'.$ex->getMessage().'}}';
        }
    }
    
    function addWine()
    {
        global $app;
        $request=$app->request();
        $wine=json_decode($request->getBody());
        $name=$wine->name;
        $grapes=$wine->grapes;
        $country=$wine->country;
        $year=$wine->year;
        $description=$wine->description;
        $region=$wine->region;
        $query = "insert into wine(name, grapes, country, region, year, description) values('$name', '$grapes', '$country', '$region', '$year', '$description');";
        
        try
        {
            global $db;
            $wines=$db->exec($query);
            $wine->id=$db->lastInsertId();
            echo json_encode($wine);
        } catch (Exception $ex) {
            echo '{"error":{"text":'.$ex->getMessage().'}}';
        }
    }
    
    function updateWine($id)
    {
        global $app;
        $request=$app->request();
        $wine=json_decode($request->getBody());
        $name=$wine->name;
        $grapes=$wine->grapes;
        $country=$wine->country;
        $region=$wine->region;
        $year=$wine->year;
        $description=$wine->description;
        $query="update wine set name='$name', grapes='$grapes', country='$country', region='$region', year='$year', description='$description' where id='$id';";
        try{
            global $db;
            $db->exec($query);
            echo json_encode($wine);
        } catch (Exception $ex) {
            echo '{"error":{"text":'.$ex->getMessage().'}}';
        }
    }
    
    function deleteWine($id)
    {
        $query="delete from wine where id='$id';";
        echo $query;
        try{
            global $db;
            $db->exec($query);
        } catch (Exception $ex) {
            echo '{"error":{"text":'.$ex->getMessage().'}}';
        }
    }
?>

