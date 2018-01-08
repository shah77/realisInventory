<?php
/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy(); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Error</title>
  <?php include 'css/css.html'; ?>

<style>

.button {
  border: 0;
  outline: none;
  border-radius: 0;
  padding: 5px 0;
  font-size: 18px;
 
  text-transform: uppercase;
  letter-spacing: .1em;
  
  color: #ffffff;
  -webkit-transition: all 0.5s ease;
  transition: all 0.5s ease;
  -webkit-appearance: none;
  
  margin-bottom: 5px;
}

.info{
    background-color: #027fd8;
}

.danger{
    background-color: #f23624;
}

.danger:hover, .danger:focus {
  background: #db1502;
}

.info:hover, .info:focus {
  background: #0164aa;
}

.button-block {
  display: block;
  width: 40%;
  height: 50px;
  margin:0 auto;
}
</style>
</head>

<body>
    <div class="form">
          <h1>Opps!</h1>
              
          <p><?= 'You have been logged out!'; ?></p>
          
          <a href="index.php"><button class="button info button-block"/>Home</button></a>

    </div>
</body>
</html>
