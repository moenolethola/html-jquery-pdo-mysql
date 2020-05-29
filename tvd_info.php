<?php
include_once("./DBConnection.php");
$conn = $params = $query = $stmt = $msg = $admin = "";
$count = 0;

if(isset($_SESSION['nvUserRole']))
{
     $admin = $_SESSION['nvUserRole'] == "Administrator"? "Administrator" : "";
     $nvEditor = (!empty($_SESSION['nvSuper']) || !empty($_SESSION['nvAdmin']))? true : false;
}

try
{
    //initialise connection
    $conn = new DBConnection();

    //set query
    $query = "SELECT * FROM tvd_info";

    //execute query
    $stmt = $conn->executeQuery($query);
    //get number of records
    $count = $stmt->rowCount();

    if ($count > 0)
    {
        $tvd_row = $stmt->fetchObject();
    }
    //close connection
    $conn->closeConnection();
}
catch(Exception $e)
{
    echo $e->getMessage();
}


?>