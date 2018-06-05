<?php
require ("Model/CoffeeModel.php");


//Contains non-database related function for the Coffee page
class CoffeeController {
    
    function createCoffeeTables($types)
    {
        $coffeeModel = new CoffeeModel();
        $coffeeArray = $coffeeModel->getDrinksByType($types);
        $result = "";
        
        //Generate a coffeeTable for each coffeeEntity in array
        foreach ($coffeeArray as $key => $coffee) 
        {
            if($coffee->shot =='Yes')
            {
         
            $result = $result ."
            <form method='post' action='index.php?action=add&id=$coffee->id'>
                <div class='col-sm-4 col-md-4 portfolio-item'>
                <img class='img-fluid' src='$coffee->image' alt=''>
                <div class='portfolio-caption'>
                    <h4 class='service-heading black'>$coffee->name</h4>
                    <p>Price - <i id='result'>$coffee->price</i> NOK</p>
                <input type='number' name='quantity' id='quantity$coffee->id' class='form-control' value='0' min='0'/>
                <div style='margin-top: 0.5rem;'>
                <label for='shot'>Doubleshot:</label>
                <select class='selectShot' id='shot$coffee->id' name='shot'>
                <option value='No'>No</option>
                <option value='Yes'>Yes</option>            
                </select>
                </div>

                <input type='hidden' name='hidden_name' id='name$coffee->id' value='$coffee->name' />
                <input type='hidden' name='hidden_price' id='price$coffee->id' value='$coffee->price' />
                <input type='button' name='add_to_cart' id='$coffee->id' style='margin-top:5px;'' class='btn btn-success form-control add_to_cart' value='Add to Cart' />
                </div>
            </div>";
             }  
            else
            {
            $result = $result ."
            <form method='post' action='index.php?action=add&id=$coffee->id'>
            <div class='col-md-4 col-sm-4 portfolio-item'>
            <img class='img-fluid' src='$coffee->image' alt=''>
            <div class='portfolio-caption'>
              <h4 class='service-heading black'>$coffee->name</h4>
              <p>Price - <i id='result'>$coffee->price</i> NOK</p>
              <input type='number' name='quantity' id='quantity$coffee->id' class='form-control' value='0' min='0'/>
              <div class='mt-adjust'></div>
              <input type='hidden' name='hidden_name' id='name$coffee->id' value='$coffee->name' />
              <input type='hidden' name='hidden_price' id='price$coffee->id' value='$coffee->price' />
              <input type='button' name='add_to_cart' id='$coffee->id' style='margin-top:5px;'' class='btn btn-success form-control add_to_cart' value='Add to Cart' />
            </div>
            </div>";
            }  
        }
        
        return $result;
        
    }
    
    function allDrinks($types)
    {
        $coffeeModel = new CoffeeModel();
        $coffeeArray = $coffeeModel->getDrinksByType($types);

        //Generate a coffeeTable for each coffeeEntity in array
       
        $result ="
        <div class='scrol'>
        <table class='table'>
          <thead id='all_drinks'>
            <tr>
              <th>Image</th>
              <th>Product Name</th>
              <th>Product Type</th>
              <th>Price</th>
              <th>Doubleshots</th>
              <th>Description</th>
              <th colspan='2'>Action</th>
            </tr>
          </thead>
          <tbody>";
           foreach ($coffeeArray as $key => $coffee) 
           {
            $result = $result ."<tr>
              <td><img src='$coffee->image' class='img-fluid'></td>
              <td>$coffee->name</td>
              <td>$coffee->type</td>
              <td>$coffee->price NOK</td>
              <td>$coffee->shot</td>
              <td>$coffee->description</td>
              <td><button class='btn btn-primary btn-xl' onclick='update($coffee->id)'>Edit</button></td>
              <td><button class='btn btn-danger btn-xl' onclick='remove($coffee->id)'><i class='fa fa-trash-o'></i></button></td>
            </tr>";
            }
          
        
        return $result."</tbody>
        </table>
        </div>";
        
    }

    // display select options from database
    function CreateOptionValues(array $valueArray) 
    {
        $result = "";

        foreach ($valueArray as $value) {
            $result = $result . "<option value='$value'>$value</option>";
        }

        return $result;
    }

    // display selected options from database
    function CreateOptionValuesSelect(array $valueArray ,$type) 
    {
        $result = "";

        foreach ($valueArray as $value) {
          if($type == $value)
          {
            $result = $result . "<option value='$value' selected>$value</option>";
          }
          else
          { 
            $result = $result . "<option value='$value'>$value</option>";
          }
        }

        return $result;
    }

    //add new drinks in db
    function addNewDrinks()
    {

    return $table =
    "<form class='wrapper' action='addDrinks.php?drink=add' method='post'>
       <fieldset>
        <legend>Add a new Drink</legend>
        <label for='name'>Name <span class='red'>*</span></label>
        <input type='text' class='inputField' name='txtName' required/><br/>
  
        <label for='type'>Type </label>
        <select class='inputField' name='ddlType'>
            ".$this->CreateOptionValues($this->getDrinksTypes()).
            "</select></br>

        <label for='price'>Price <span class='red'>*</span></label>
        <input type='text' class='inputField' name='txtPrice' required/><br/>
        <label for='image'>Image </label>
        <select class='inputField' name='ddlImage'>
        <option value=''>Select one</option>"
        .$this->getImages().
        "</select></br>

        <label for='shot'>Doubleshot</label>
        <select class='inputField' name='shot'>
            <option value='No'>No</option>
            <option value='Yes'>Yes</option>            
            </select></br>
        <label for='review'>Description </label>
        <textarea cols='50' rows='6' class='textField' name='txtReview'></textarea>
        <div class='btn-center'>
        <input type='submit' class='btn btn-primary btn-xl' value='Add'>
        </div>
    </fieldset>
  </form>";
  }

      //update drinks in db
    function updateDrinks($id)
    {

    $coffee = $this->getDrinksById($id);
    $coffee->image = str_replace("Images/Coffee/","","$coffee->image");
    $result = "
        <form class='wrapper' action='addDrinks.php?drink=update' method='post'>
        <fieldset>
        <legend>Edit drinks</legend>
        <label for='name'>Name <span class='red'>*</span></label>
        <input type='text' class='inputField' name='txtName' value='".$coffee->name."' required/><br/>

        <label for='type'>Type </label>
        <select class='inputField' name='ddlType'>
            <option value=''>Select one</option>"
        .$this->CreateOptionValuesSelect($this->getDrinksTypes(),$coffee->type).
            "</select><br/>

        <label for='price'>Price <span class='red'>*</span></label>
        <input type='text' class='inputField' name='txtPrice' value='".$coffee->price."' required/><br/>

        <label for='image'>Image </label>
        <select class='inputField' name='ddlImage'>
        <option value=''>Select one</option>"
        .$this->getSelectedImages($coffee->image).
        "</select></br>
                <label for='shot'>Doubleshot</label>
        <select class='inputField' name='shot'>
        ".$this->CreateOptionValuesSelect($this->getShots(),$coffee->shot)."           
            </select></br>
        <label for='review'>Description </label>
         <textarea cols='50' rows='6' class='textField' name='txtReview'>".$coffee->description."</textarea>
        <input type='hidden' value='".$coffee->id."' name=id>
        <div class='btn-center'>
        <input type='submit' class='btn btn-primary btn-xl' value='Update'>
        </div>
      </fieldset>
    </form>";
    
    return $result;

    }


    //Returns list of files in a folder.
    function getImages() 
    {
        //Select folder to scan
        $handle = opendir("Images/Coffee");

        //Read all files and store names in array
        while ($image = readdir($handle)) {
            $images[] = $image;
        }

        closedir($handle);

        //Exclude all filenames where filename length < 3
        $imageArray = array();
        foreach ($images as $image) {
            if (strlen($image) > 2) {
                array_push($imageArray, $image);
            }
        }

        //Create <select><option> Values and return result
        $result = $this->CreateOptionValues($imageArray);
        return $result;
    }
        //Returns list of files in a folder.
    function getSelectedImages($name) 
    {
        //Select folder to scan
        $handle = opendir("Images/Coffee");

        //Read all files and store names in array
        while ($image = readdir($handle)) {
            $images[] = $image;
        }

        closedir($handle);

        //Exclude all filenames where filename length < 3
        $imageArray = array();
        foreach ($images as $image) {
            if (strlen($image) > 2) {
                array_push($imageArray, $image);
            }
        }

        //Create <select><option> Values and return result
        $result = $this->CreateOptionValuesSelect($imageArray ,$name);
        return $result;
    }

    //Get Methods
    function getDrinksById($id) 
    {
        $coffeeModel = new CoffeeModel();
        return $coffeeModel->getDrinksById($id);
    }

    function getDrinksByType($type) 
    {
        $coffeeModel = new CoffeeModel();
        return $coffeeModel->getDrinksByType($type);
    }

    function getDrinksTypes() 
    {
        $coffeeModel = new CoffeeModel();
        return $coffeeModel->getDrinksTypes();
    }

    function getShots() 
    {
        return $shots =array('Yes','No');
    }


}

?>
