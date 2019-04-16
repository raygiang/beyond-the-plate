<?php

    $con=mysqli_connect('project-cookbook.caablfu69mfx.us-east-2.rds.amazonaws.com:3306','raygiang','cooking888','cookbook');
    $q = isset($_POST['query']) ? $con->real_escape_string($_POST['query']) : '';

    $result = mysqli_query($con,"select distinct name from ingredients where name like '%" . $q ."%'");
    
    $rows=array();
    while($row = mysqli_fetch_assoc($result)) 
    {
        $rows[] = array_map("utf8_encode", $row);
    }
    echo json_encode($rows);
?>
