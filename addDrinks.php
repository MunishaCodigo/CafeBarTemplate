<?php 
require ("Model/CoffeeModel.php");

    
    if($_GET['drink']=='add')
    {
        $name  = $_POST["txtName"];
        $type  = $_POST["ddlType"];
        $price = $_POST["txtPrice"];
        $image = $_POST["ddlImage"];
        $shot  = $_POST["shot"];
        $description = $_POST["txtReview"];

        $coffee = new CoffeeEntity(-1, $name, $type, $price, $image, $shot, $description);
        $coffeeModel = new CoffeeModel();
        $coffeeModel->insertCoffee($coffee);
    }
    elseif($_GET['drink']=='update')
    {
        $id   = $_POST["id"];
        $name = $_POST["txtName"];
        $type = $_POST["ddlType"];
        $price = $_POST["txtPrice"];
        $image = $_POST["ddlImage"];
        $shot  = $_POST["shot"];
        $description = $_POST["txtReview"];

        $coffee = new CoffeeEntity(-1, $name, $type, $price, $image, $shot, $description);
        $coffeeModel = new CoffeeModel();
        $coffeeModel->updateCoffee($id,$coffee);
    }
    else
    {
        $id   = $_POST["remove"];
        $coffeeModel = new CoffeeModel();
        $coffeeModel->deleteCoffee($id);  
    }
    

header("Location: cms.php");
die();
?>