<?php
require ("Entities/CoffeeEntity.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
//Contains database related code for the Coffee page.
class CoffeeModel 
{

    //Get all coffee types from the database and return them in an array.
    function getDrinksTypes() {
        require ('Credentials.php');

        $sql = $pdo->prepare("SELECT DISTINCT type FROM coffee");
        $sql->execute();
        $types = array();

        //Get data from database.
        while ($row = $sql->fetch()) {
            array_push($types, $row[0]);
        }

        //return result.
        return $types;
    }

    //Get coffeeEntity objects from the database and return them in an array.
    function getDrinksByType($type) 
    {
        //Connection to db
        require 'Credentials.php';
        $sql = $pdo->prepare("SELECT * FROM coffee WHERE type LIKE '$type'");
        $sql->execute();

        $coffeeArray = array();

        //Get data from database.
        while  ($row = $sql->fetch()) {
            $id          = $row[0];
            $name        = $row[1];
            $type        = $row[2];
            $price       = $row[3];
            $image       = $row[4];
            $shot        = $row[5];
            $description = $row[6];

            //Create coffee objects and store them in an array.
            $coffee = new CoffeeEntity($id, $name, $type, $price, $image, $shot, $description);
            array_push($coffeeArray, $coffee);
        }
        //return result
        return $coffeeArray;
    }

    function getDrinksById($id) 
    {
        //Connection to db
        require ('Credentials.php');

        $sql = $pdo->prepare("SELECT * FROM coffee WHERE id = $id");
        $sql->execute();

        //Get data from database.
        while  ($row = $sql->fetch()) {
            $id          = $row[0];
            $name        = $row[1];
            $type        = $row[2];
            $price       = $row[3];
            $image       = $row[4];
            $shot        = $row[5];
            $description = $row[6];

            //Create coffee
            $coffee = new CoffeeEntity($id, $name, $type, $price, $image, $shot, $description);
            
        }
    
        return $coffee;
    }

    function insertCoffee(CoffeeEntity $coffee)
    {
        //Connection to db
        require ('Credentials.php');

        $result = $pdo->prepare("INSERT INTO `coffee`(`name`, `type`, `price`, `image`, `shot`,`description`) VALUES ('$coffee->name','$coffee->type','$coffee->price','Images/Coffee/$coffee->image', '$coffee->shot', '$coffee->description')");

        $result->execute(array(
            ":name"        =>$coffee->name, 
            ":type"        =>$coffee->type, 
            ":price"       =>$coffee->price, 
            ":image"       =>"Images/Coffee/".$coffee->image,
            ":shot"        =>$coffee->shot, 
            ":description" =>$coffee->description));
    }

    function updateCoffee($id, CoffeeEntity $coffee) 
    {
        //Connection to db
        require ('Credentials.php');

        $result = $pdo->prepare("UPDATE coffee
                            SET name = '$coffee->name', type = '$coffee->type', price = '$coffee->price', image = 'Images/Coffee/$coffee->image', shot = '$coffee->shot',  description = '$coffee->description'
                          WHERE id = $id");
        $result->execute(array(
            ":name"        =>$coffee->name, 
            ":type"        =>$coffee->type, 
            ":price"       =>$coffee->price, 
            ":image"       =>"Images/Coffee/".$coffee->image,
            ":shot"        =>$coffee->shot, 
            ":description" =>$coffee->description));
                          
    }

    function deleteCoffee($id) 
    {
        //Connection to db
        require ('Credentials.php');

        $sql = $pdo->prepare("DELETE FROM coffee WHERE id = $id");
        $sql->execute();
        
    }

}

?>
