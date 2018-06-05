<?php

require 'Controller/CoffeeController.php';
$coffeeController = new CoffeeController();

if(isset($_POST['types']))
{
    //Fill page with coffees of the selected type
    $coffeeTables = $coffeeController->createCoffeeTables($_POST['types']);
}
elseif (isset($_POST['update']))
 {
	//Update the data in db
    $coffeeTables = $coffeeController->updateDrinks($_POST['update']);
    
}
elseif (($_POST['drinks'])=="add")
 {
	//Fill new drinks in db
    $coffeeTables = $coffeeController->addNewDrinks();

}
elseif (($_POST['drinks'])=="all")
 {
	//Show all drinks
    $coffeeTables = $coffeeController->allDrinks('%');
}
else 
{
    //Page is loaded for the first time, no type selected -> Fetch all types
    $coffeeTables = $coffeeController->createCoffeeTables('%');
}

//Output page data
echo $content = $coffeeTables;

?>
