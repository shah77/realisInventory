<?php



if(isset($_POST['search']))
{
	$search = $_POST['searchitem'];

	$query = ("SELECT * FROM medicines WHERE CONCAT('id','m_name','qty') LIKE '%".$search."%'");

	
		$search_result = filterTable($sql);
}
else{
	$query = "SELECT * FROM medicines";
	$search_result = filterTable($query);

}

function filterTable($query)
{
	$connect = mysqli_connect("localhost","root","","accounts");
	$filter_Result = mysqli_query($connect,$query);
	return $filter_Result;
}
?>





