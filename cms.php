<?php
 require 'Model/Credentials.php';
  session_start();
  if(!isset($_SESSION['username']))
  {
    // not logged in
    header('Location: CMS/cms_login.php');
    exit();
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
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="CMS/logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
<div class="sidenav">
  <a id="all_drinks" href="#">All Drinks</a>
  <a id="add_new" href="#">Add New Drinks</a>

</div>
<div id="db_content" class="main">

</div>


    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>


    <!-- Custom scripts for this template -->


    <script src="js/cms.js"></script>
    <script type="text/javascript">

    function update(id)
    {
        var val =id;

        $.ajax({ 
        type: 'POST',
        url: 'beverages.php',
        data: { 'update': val },
        success: function(response) {
            $("#db_content").html(response);
        }
        });
    }

    function remove(id)
    {
        if(confirm("Are you sure you want to remove this product?"))
        {
            var val =id;

            $.ajax({ 
                type: 'POST',
                url: 'addDrinks.php?drink=remove',
                data: { 'remove': val },
                success: function(response) 
                {
                    $("#db_content").html(response);
                    
                }
            });
        }
        else
        {
            return false;
        }
    }


    </script>
  </body>

</html>
