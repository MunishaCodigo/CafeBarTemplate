<?php
session_start();
require ('../Model/Credentials.php');

if(isset($_POST['login'])) 
{
  $user = $_POST['username'];
  $pass = $_POST['password'];

  if(empty($user) || empty($pass)) 
  {
    $message = 'All field are required';
  } 
  else 
  {
    $query = $pdo->prepare("SELECT username, password FROM admin WHERE 
    username=? AND password=? ");
    $query->execute(array($user,$pass));
    $row = $query->fetch(PDO::FETCH_BOTH);

    if($query->rowCount() > 0) 
    {
      $_SESSION['username'] = $user;
      header('location:../cms.php');
    } 
    else 
    {
      $message = "Username/Password is wrong";
    }


  }

}
?>
<!DOCTYPE html>
<html lang="en"> 
<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
	<title>Login</title>
	<meta name="description" content="">  
	<meta name="Zerka" content="">

   <!-- mobile specific metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 	<!-- CSS
   ================================================== -->
    
   <link rel="stylesheet" href="../css/login.css">
       
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
   <!-- script
   ================================================== -->
	
<style>
  ::-webkit-input-placeholder { /* Chrome */
  color: #503D3F;
  transition: opacity 0ms ease-in-out;
}
</style>

</head>

<body>
  <div class="container">
    <div class="box">
      </br></br>
      <div>
         <p class="logo">Hugs with mugs</p>
      </div>
      <form action="cms_login.php" method="POST">
        <fieldset>     
          <div class="wrapper">
            <i class="fa fa-user" aria-hidden="true"></i>
            <input type='text' name="username" placeholder="USERNAME" required="" />
          </div>    
         
          <div class="wrapper">
            <i class="fa fa-lock" aria-hidden="true"></i>
            <input type='password' name="password" placeholder="PASSWORD" required="" />
          </div>

          <input type="submit" name="login" value="LOGIN">  
          <a href="../index.php"><i class="fa fa-arrow-left"></i>  Back to Home</a>             
         

        </fieldset>
      </form>


      </div>

</div>
  

</body>
</html>