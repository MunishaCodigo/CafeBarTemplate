<?php
session_start();

//insert cart data in db

if(!empty($_SESSION["shopping_cart"]))
{   
    //Connection to db
    require ('Model/Credentials.php');
    $total        = $_POST['tot_price'];
    $count = 0;
    foreach($_SESSION["shopping_cart"] as $keys => $values)
    {
        $count++;
        $name         = $_POST['name'][$keys];
        $quantity     = $_POST['quantity'][$keys];
        $shot         = $_POST['shot'][$keys];
        $price        = $_POST['price'][$keys];

        $result = $pdo->prepare("INSERT INTO `coffee_cart`(`name`, `quantity`, `shot`, `price`, `total`) VALUES ('$name', '$quantity', '$shot', '$price', '$total')");

        $result->execute();

    }
}

?> 
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Beverages</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative.css" rel="stylesheet">
    <link href="css/cms.css" rel="stylesheet">

  </head>

  <body id="page-top" class="cms_coffee">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php">Hugs with Mugs</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="cms.php">CMS</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
<div class="receipt">
<div class="text-center mt-2 mb-2">Receipt</div>
<?php 
if(!empty($_SESSION["shopping_cart"]))
{ ?>
<div class="text-center mt-3 mb-3"><em>Thank you for shopping</em><br><?php echo $_POST['tot_price'];?> NOK at <em>"Hugs with Mugs"</em></div>
<?php }?>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr>  
            <th width="40%">Product Name</th>  
            <th width="10%">Quantity</th>
            <th width="10%">Doubleshots</th>  
            <th width="20%">Price</th>  
            <th width="15%">Total</th>  
        </tr>
<?php 
if(!empty($_SESSION["shopping_cart"]))
{   
    $count = 0;
    foreach($_SESSION["shopping_cart"] as $keys => $values)
    {
        $count++;
        $name         = $_POST['name'][$keys];
        $quantity     = $_POST['quantity'][$keys];
        $shot         = $_POST['shot'][$keys];
        $price        = $_POST['price'][$keys];
        $total        = $_POST['total'][$keys];
      
       
    ?>
        <tr>
            <td><?php echo $name;?></td>
            <td><?php echo $quantity;?></td>
            <td><?php echo $shot;?></td>
            <td align="right"><?php echo $price;?> NOK</td>
            <td align="right"><?php echo $total;?> NOK</td>
        </tr>
      
    <?php }?>
    
    <tr>
        <td colspan="3" align="right">Total</td>  
        <td colspan="2" align="right"><?php echo $_POST['tot_price'];?> NOK</td>  
        
    </tr>

<?php } else
{?>
    <tr>
        <td colspan="5" align="center">
            Your Cart is Empty!
        </td>
    </tr>
    
<?php }?>
    </table>
    </div>
    <div class="text-center mt-3 mb-3"><em>Have a Wonderful Day</em> 
        <div><img src="Images/icon/face.svg" width="50px" height="50px"></div>
    </div>
</div>

<?php 
unset($_SESSION["shopping_cart"]);   
?>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>


    <!-- Custom scripts for this template -->
    <script src="js/cart.js"></script>
    <script type="text/javascript"></script>
  </body>

</html>