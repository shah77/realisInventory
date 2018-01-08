<?php
/* Displays all error messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Error</title>
  <?php include 'css/css.html'; ?>

  <style>
      .button {
  border: 0;
  outline: none;
  border-radius: 0px;
  padding: 5px 0;
  font-size: 18px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: .1em;
  background-color: #027fd8;
  color: #ffffff;
  -webkit-transition: all 0.5s ease;
  transition: all 0.5s ease;
  -webkit-appearance: none;
  
  margin-bottom: 10px;
}
.button:hover, .button:focus {
  background: #0164aa;
}

.button-block {
  display: block;
  width: 30%;
  height: 50px;
  margin: 0 auto;

}
  </style>
</head>
<body>
<div class="form">
    <h1>Error</h1>
    <p>
    <?php 
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ): 
        echo $_SESSION['message'];    
    else:
        header( "location: index.php" );
    endif;
    ?>
    </p>     
    <a href="index.php"><button class="button button-block"/>Home</button></a>
</div>
</body>
</html>
