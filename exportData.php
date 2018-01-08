<?php
//include database configuration file
include 'db2.php';

//get records from database
$query = $db->query("SELECT * FROM itemlist ORDER BY id ASC");



if($query->num_rows > 0){
    $delimiter = ",";
    $filename = "itemlist_" . date('Y-m-d') . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');
    
    //set column headers
    $fields = array('id', 'itemname', 'price');
    fputcsv($f, $fields, $delimiter);
    
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
       
        $lineData = array($row['id'], $row['itemname'], $row['price']);
        fputcsv($f, $lineData, $delimiter);
    }
    
    //move back to beginning of file
    fseek($f, 0);
    
    //set headers to download file rather than displayed

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');


    //output all remaining data on a file pointer
    fpassthru($f);
}
exit;

?>