<?php
session_start();
include_once("../DBConnection.php");

$count = 0;

if (!empty($_POST['nvDesc']))
{
    $nvDesc = htmlspecialchars($_POST['nvDesc']);
    $nvVision = htmlspecialchars($_POST['nvVision']);
    $nvMission = htmlspecialchars($_POST['nvMission']);
    $nvPurpose = htmlspecialchars($_POST['nvPurpose']);
    $nvRegistrationRequirements = htmlspecialchars($_POST['nvRegistrationRequirements']);
    $fkiUserID = $_SESSION['intUserID'];
    $fkiStatusID = $_POST['fkiStatusID'];

    try
    {
        //initialise connection
        $conn = new DBConnection();

        //set INSERT query
        $query = "INSERT INTO tvd_info(nvDesc,
                                            nvVision,
                                            nvMission,
                                            nvPurpose,
                                            nvRegistrationRequirements,
                                            fkiStatusID,
                                            fkiUserID,
                                            dtDateCreated,
                                            dtDateLastUpdated)
                                    VALUES (:nvDesc,
                                            :nvVision,
                                            :nvMission,
                                            :nvPurpose,
                                            :nvRegistrationRequirements,
                                            :fkiStatusID,
                                            :fkiUserID,
                                            NOW(),
                                            NOW())";

        //set params
        $params = array(":nvDesc" => $nvDesc, ":nvVision" => $nvVision, ":nvMission" => $nvMission, ":nvRegistrationRequirements" => $nvRegistrationRequirements,
                        ":fkiStatusID" => $fkiStatusID, ":fkiUserID" => $fkiUserID);
        //execute query
        $stmt = $conn->executeQuery($query);
        //get number of records affected
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