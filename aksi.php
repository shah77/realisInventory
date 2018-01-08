<?php

include "db.php";




          if(isset($_POST['tambah'])){

          	$nota = $_POST['nota'];

          	$sql = ("INSERT INTO notes (note) "."VALUES ('$nota')");
            $mysqli->query($sql);

            header("location:home.php");
            }

            {
             $id = $_GET['id'];
            

             $sql = "DELETE FROM notes WHERE id='".$id."'";
             
             $mysqli->query($sql);
             
             header("location:home.php");
             
            }

             


?>