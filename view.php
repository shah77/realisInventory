<?php
session_start();
include "action.php";
include 'db.php';

if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $username = $_SESSION['username'];
    
}

?>
<head>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Work Sans">

<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">

<meta name="viewport" content="width=device-width,initial-scale: 1.0, user-scalable"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="haha.js"></script>

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
	font-family: 'Courier New';
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
	margin: 1% 5%;
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
	margin: -10px 5% 10px 5%;
	padding:10px 6px;
	float: left;

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
	background-color: #ff5959;
	margin: 2% 9%;
	float: left;
	padding:15px 8%;
	box-shadow: 10px 10px 5px #888888;

}



.calendarbox{
	width:35%;
	height: 250px;
	background-color: #0be8aa;
	margin: 2% 2%;
	float: left;
    padding:12px 5%;
    box-shadow: 10px 10px 5px #888888;

}

textarea{
	width: 80%;
	height: 100px;
}

.itemno{
	width: 100%;
	text-align: center;
	font-size: 90px;
	color: white;
	margin-top: 20px;
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

.button {
  border: 0;
  outline: none;
  border-radius: 5px;
  padding: 8px 0;
  font-size: 12px;
 
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
  width: 80%;
  height: 30px;
  margin-left: 10%;
}

.search{
	float: right;
	margin:20px 0px;
	border: 2px solid #6a6b6d;
}

input{
	padding: 5px;
    border: 2px solid white;
}

.searchbutton{
    background-color: #0065ad;
    color: white;
    border: 2px solid #0065ad;
    border-radius: none;
    
    font-size: 14px;
    
    margin-left : -5px;
    
}



table tr td {
		border: 1px solid #c4c5c6;
        color: black;
        padding: 2px;
        background-color: #edeeef; 
        text-align:center;}

	table{width: 100%; border-collapse: collapse;}


@media only screen and (max-width: 880px){
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
	background-color: #ff5959;
	margin: 2% 5%;
	padding:15px 16%;
	box-shadow: 10px 10px 5px #888888;

}



.calendarbox{
	width:90%;
	height: 250px;
	background-color: #0be8aa;
	margin: 2% 5%;
	
    padding:15px 10%;
    box-shadow: 10px 10px 5px #888888;

}

h1{text-align: center;
}
	
}

@media only screen and (min-width: 880px){
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
                     <p><?= $_SESSION['username'] ?>
                     </p>
                     </li>
             </div>        
             <li><a href="home.php"><img src="right-menu-bars (1).png" width="14px">Dashboard</a></li>
             <li class="current"><a href="view.php"><img src="view.png" width="14px">View Inventory</a></li>
             <li><a href="update.php"><img src="update.png" width="14px">Update Inventory</a></li>
             <li><a href="import.php"><img src="upload.png" width="14px">Import Data</a></li>
             <li><a href="export.php"><img src="download.png" width="14px">Export Data</a></li>
             <li><a href="logout.php"><img src="logout.png">Logout</a></li>
         </ul>    
     </div>
     <div class="content">
           <h1>MY INVENTORY</h1>
           <div class="search">
             <form action="view.php" method="POST">
             <input type="text" name="searchitem" placeholder="Search...">
             <input class="searchbutton" type="submit" name="search" value="search">    
             </form> 
           </div>

           <?php



if(isset($_POST['search']))
{
	$search = $_POST['searchitem'];

	$query = ("SELECT * FROM itemlist WHERE itemname LIKE '%".$search."%'");

	
		$search_result = filterTable($query);
}
else{
	$query = "SELECT * FROM itemlist";
	$search_result = filterTable($query);

}

function filterTable($query)
{
	$connect = mysqli_connect("localhost","root","","realisdb");
	$filter_Result = mysqli_query($connect,$query);
	return $filter_Result;
}
?>   

           <div class="box">
               <table width="100">
               	   <tr style="background-color: #31364c;color: white; height: 30px;">
               	   <th>NO</th>
               	   <th>ITEM</th>
               	   <th>PRICE</th>
               	   <th>ACTION</th>
               	   </tr>
               	   <?php
                     while($row = mysqli_fetch_array($search_result)):
                       ?>
               	   <tr>
               	   <td style="width:5%;"><?php echo $row["id"]; ?></td>
               	   <td style="text-align: left; padding: 5px;"><?php echo $row["itemname"]; ?></td>
               	   <td style="width:15%;"><b><?php echo "RM ". $row["price"]; ?></b></td>
                    
            

               	   <td width="90px"><a href="update.php?update=1&id=<?php echo $row["id"]; ?>" class="button info button-block">Edit</a>
               	   <a href="action.php?delete=1&id=<?php echo $row["id"]; ?>" class="button danger button-block">Delete</a></td>
                     
               	   </tr>

                     <?php
                        endwhile;

                     ?>

               </table>
           
           </div>
                     
     </div>
</div> 

</body>
</html>
