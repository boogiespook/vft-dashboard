<?php
if ( (!isset($_GET['key'])) || ($_GET['key'] != "OGM0NzMxZDk4ODAxMTUzNTJkOTliN")) {
exit("Unable to connect to site");
}

include 'dbconnect.php';
connectDB();

    //fetch table rows from mysql db
    $sql = "select * from data";
    $result = mysqli_query($db, $sql) or die("Error in Selecting " . mysqli_error($db));

    //create an array
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    echo json_encode($emparray);

    //close the db connection
    mysqli_close($db);
?>
