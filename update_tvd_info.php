<?php
session_start();
include_once("../DBConnection.php");

$count = 0;
if (!empty($_POST["id"]))
{
    $id = $_POST["id"];
    $nvDesc = $_POST["nvDesc"];
    $nvVision = $_POST["nvVision"];
    $nvMission = $_POST["nvMission"];
    $nvPurpose = $_POST["nvPurpose"];
    $nvRegistrationRequirements = $_POST["nvRegistrationRequirements"];
    $fkiUserID = $_SESSION["intUserID"];
    $fkiStatusID = $_POST["fkiStatusID"];

    try
    {
        //initialise connection
        $conn = new DBConnection();

        //set UPDATE query
        $query = "UPDATE tvd_info
                    SET nvDesc = :nvDesc,
                        nvVision = :nvVision,
                        nvMission = :nvMission,
                        nvRegistrationRequirements = :nvRegistrationRequirements,
                        fkiStatusID = :fkiStatusID,
                        fkiUserID = :fkiUserID,
                        dtDateLastUpdated = NOW()
                    WHERE ID=:id";
        //set params
        $params = array(":nvDesc" => $nvDesc, ":nvVision" => $nvVision, ":nvMission" => $nvMission, ":nvRegistrationRequirements" => $nvRegistrationRequirements,
                        ":fkiStatusID" => $fkiStatusID, ":fkiUserID" => $fkiUserID, ":id" => $id);
        //execute query
        $stmt = $conn->executeQueryWithParameters($query, $params);
        //get number of records
        $count = $stmt->rowCount();
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
     //close connection
     $conn->closeConnection();
}
echo $count;
?>