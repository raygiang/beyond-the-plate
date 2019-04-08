<?php
    $con=mysqli_connect('localhost','root','','cookbook');
    $q = isset($_POST['query']) ? $con->real_escape_string($_POST['query']) : '';

    $result = mysqli_query($con,"select * from countries where countryName like '%" . $q ."%'");
    
    $rows=array();
    while($row = mysqli_fetch_assoc($result)) 
    {
        $rows[] = array_map("utf8_encode", $row);
    }
    echo json_encode($rows);
?>
