<?php
  session_start();
  include 'db.php';
  //include 'aksi.php';



/* Displays user information and some useful messages */


// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $username = $_SESSION['username'];
    
}
?>
<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Work Sans">

<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">

<meta name="viewport" content="width=device-width,initial-scale: 1.0, user-scalable"/>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="haha.js"></script>
<script src="addnote.js"></script>
<script src="time.js"></script>


<link rel="icon" type="image/gif/png" href="reallogo.png">
  <title>Realistech</title>

<style>
* {margin: 0; padding:0; box-sizing: border-box; }

body{font-family: 'Work Sans', serif; margin: 0 auto; background-color: #C6C8CA; 
}

a{
	text-decoration: none;
}

h1{color: #1a1d2b;
   margin-left: 30px;
   margin-top: 10px;
font-stretch: 10PX}

.header{
	width: 100%;
	height:50px;
	background-color: #0065ad;
	position: fixed;
	top:0;

}

.logo{
	float: left;
	margin-top: 10px;
	margin-left: 10px;
	
}



.logo a{
	font-size: 1.5em;
	color: #FFFFFF;
}

.logo a:hover{
	color: black;
}

.logo a span{
	font-weight:bold;
}

.container{
	width: 100%;
    margin-top:50px;

}

.sidebar{
	width: 250px;
	background-color: #31364c;
	float: left;
	position: fixed;

}

.content{
	margin-left: 250px;
	width: auto;
	height:100%;
	background-color: #C6C8CA;
	padding: 12px;
	padding-left: 15px;
}

ul.nav{
   
}

ul.nav li{
	list-style: none;
}

ul.nav li a{
	color: white;
	display: block;
	padding: 15px;

	

}

ul.nav li a:hover{
	background-color: #1a1d2b;
	
}

.current a{
	background-color: #1a1d2b;
	border-right: 6px solid red;;
}

.box{
	margin-top: 15px;

}

.box .boxtop{
	color:white;
	text-shadow: 0px 0px 1px black;
	background-color: #0072BB;
	padding:5px;
	font-weight: bold;
}
.box .boxpanel
{ 
    padding: 15px;
    background-color: #fff;

}

.boxbottom{
	margin-top: 20px;
	color:white;
	text-shadow: 0px 0px 1px black;
	background-color: #0072BB;
	padding:5px;
	font-weight: bold;
}

a.mobile{
    display:none;
    cursor: pointer;
    margin-top: 50px;

}

.logo img:hover{opacity: 0.7;}

.card{
	float: none ;
	margin-top: 15px;
    margin-left:-10px;
    text-align: center;
    padding-top: 20px;
    padding-bottom: 10px;

}

.card img{
	border: 2px solid #b9bcb8;
	border-radius: 50px;
}

.name{
	padding: 10px 0px;
	
	color: white;
	font-weight: weight;

}

.box1{
	background-color: #1a1d2b;
	width: 90%;
	height: 40px;
	margin: 1% 5% 0% 5%;
	float: left;
	text-align: center;
	padding:10px 6px;
	border-radius: 10px 10px 0px 0px;
	color: #fff;
}

.box2{
	
	background-color: white;
	width: 90%;
	height: auto;
	margin: 0px 4% 10px 5%;
	padding:5px 6px;
	float: left;


}
.box2 td{
   color:black;
   font-family: 'Titillium Web', sans-serif;
}

.bodynote{
	display:none;
	text-align: center;
}

.headernote{
	text-align: center;
	float: none;
	margin-top: 400px;
	

}

.boxcontainer{
	width: 100%;
	float: left;
}

.stockbox{
	width:35%;
	height: 250px;
	background-color: #e45641;
	margin: 2% 9%;
	float: left;
	padding:15px 8%;
	box-shadow: 10px 10px 5px #888888;

}



.calendarbox{
	width:35%;
	height: 250px;
	background-color: #20d62b;
	margin: 2% 2%;
	float: left;
    padding:12px 5%;
    box-shadow: 10px 10px 5px #888888;

}

textarea{
	width: 80%;
	height: 100px;
	font-size: 18px;
	background-color: #fff;
}

.itemno{
	width: 100%;
	text-align: center;
	font-size: 90px;
	color: white;
	margin-top: 5px;
}

.footer{
	width: 100%;
	height: 40px;
	background-color: black;
	text-align: center;
	margin-bottom: 0;
	color: white;
	padding: 10px;
	position: absolute;
}

.notetable td{
	text-align: justify;
	font-size: 18px;
	background-color: white;
	border:1px solid white;
}

.button {
  border: 0;
  outline: none;
  border-radius: 5px;
  padding: 5px 0;
  font-size: 14px;
 
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

.button-block {
  display: block;
  width: 20%;
  height: 30px;
  margin:0 auto;

}

.info:hover, .info:focus {
  background: #0164aa;
}

.last_update{
  font-size: 12px;
  color: white;
  padding: 0;
  text-align: center;
}

@media only screen and (min-width: 540px) and (max-width: 1100px){
  .stockbox{
  width:90%;
  height: 250px;
  
  margin: 2% 5%;
  padding:15px 16%;
  box-shadow: 10px 10px 5px #888888;

}



.calendarbox{
  width:90%;
  height: 250px;
  padding:0 5%;
  margin: 2% 5%;
  
   
  box-shadow: 10px 10px 5px #888888;

}
  table tr td {
    border: 1px solid #c4c5c6;
        
        padding: 0px;
        background-color: #edeeef; 
        text-align:center;
        font-size: 100%;}

}



@media only screen and (max-width: 540px){
	.sidebar{
		width: 100%;
        display: none;
        position: relative;
        
		
	}
	.content{
		margin-left: 0px;
		margin-top: -50px;
		

	}

	

	a.mobile{
    display:block;
    color:white;
    background-color:black;
    text-align: center;
    padding: 7px;
    border-bottom: 1px white;
    margin-top:50px;
    

}

a.mobile:active{
	background-color: #31364c;

}

.stockbox{
	width:90%;
	height: 250px;
	
	margin: 2% 5%;
	padding:15px 16%;
	box-shadow: 10px 10px 5px #888888;

}



.calendarbox{
	width:90%;
	height: 250px;
	
	margin: 2% 5%;
	
   
    box-shadow: 10px 10px 5px #888888;

}

h1{text-align: center;
}
	
}

@media only screen and (min-width: 700px){
	.sidebar{
		height:100%;
		display: block;
	}
}

img{
	margin: 0 10px;
}

</style>

</head>
<body>
<div class="header">
     <div class="logo"><a href="#"><img src="realispng.png" alt="logo" height="35px"></a></div>
     
</div>  

<a class="mobile" onclick="menu()">MENU</a>

<div class="container">
     <div class="sidebar">
         <ul class="nav">
             <div class="card">
                   <li>
                     <img src="man.png" height="70px" width="70px" alt="photo">
                    </li>
                  
                  
                     <li class="name">
                     <p style="color: #e3f0f7;"><?= $_SESSION['username'] ?>
                     </p>
                     </li>

                      

                  

     </div>
             <li class="current"><a href="#"><img src="right-menu-bars (1).png" width="14px">Dashboard</a></li>
             <li><a href="view.php"><img src="view.png" width="14px">View Inventory</a></li>
             <li><a href="update.php"><img src="update.png" width="14px">Update Inventory</a></li>
             <li><a href="import.php"><img src="upload.png" width="14px">Import Data</a></li>
             <li><a href="export.php"><img src="download.png" width="14px">Export Data</a></li>
             <li><a href="logout.php"><img src="logout.png">Logout</a></li>
         </ul>    
     </div>
     <div class="content">
           <h1>DASHBOARD</h1>

           <div class="boxcontainer">
               

               <div class="stockbox">
                   <h2 style="text-align: center;margin-bottom: 20px;color:white">Stock</h2>
                   <h4 style="text-align: center;">Total items in inventory</h4>
                   <?php 
                   $sql = "SELECT COUNT(itemname) FROM itemlist";

                   $result = $mysqli->query($sql);

                   $row = mysqli_fetch_array($result);

                   ?>
                   <div class="itemno">
                   <p><?php echo "$row[0]" ?></p>

                   
                   
                   </div>

                   <?php
                   $sql = "SELECT last_update FROM itemlist ORDER BY id DESC LIMIT 1";

                   $result = $mysqli->query($sql);

                   $row = mysqli_fetch_array($result);

                   ?>
                   <div class="last_update">
                   <p>Last Update: <?php echo $row['last_update'] ?></p>
                   </div>
               </div>

               <div class="calendarbox">
               <h2 style="text-align: center;margin-bottom: 20px;color:white;">My Calendar</h2>
                  <?php
                  include 'calendar.php'
                  ?>
               </div>

           </div>
            
          <div class="box1">
              <h3>Note</h3>
          </div>                     
               
          <div class="box2">

          

          

                <?php
                       $sql=" SELECT id,note FROM notes";


                        $result = $mysqli->query($sql);

                       
                        
                        while($row = mysqli_fetch_array($result))

                        {
                        	?>
                     <table class="notetable">
                        <?php
                        foreach ($result as $row) {
                       ?>
                        	<tr>
                        	  
                        	  <td>
                            <?php       	
                        	 echo '<p>- '. $row['note'].'</p>';
                        	 ?>
                        	  </td>
                        	  <td style="width: 50px;">
                             <?php
                               echo "<a href=\"aksi.php?id=".$row['id']."\"><img src='checks.png' width='60%'></a>";
                             ?>
                             </td>
                        	</tr>
                        	<?php  	
                        }

                    
                   ?>                        	</table>
                      <?php  	
                        }

                    
                   ?>
               <p> </p>
          </div>  


          
          <div class="headernote">
          <img src="addblack.png" id="adds" height="30px" width="30px">
          </div>

          <div class="bodynote">
              <h3>Add New Note</h3>
              
           
          
            <form action="aksi.php" method="post">
               
               <textarea type="text" name="nota" placeholder="Leave your note here.."></textarea>
               <br>
               
               <button class="button info button-block" name="tambah" />Add</button>
               
            </form>   
          </div>
              
        </div> 
         

     </div>
         
</div>  

</body>
</html>
