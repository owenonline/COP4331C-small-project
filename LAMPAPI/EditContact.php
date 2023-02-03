<?php
    $inData = getRequestInfo();

	$contactID = $inData["contactID"];
    $firstName = $inData["firstName"];
    $lastName = $inData["lastName"];
    $email = $inData["email"];
    $phoneNumber = $inData["phoneNumber"];

    $conn = new mysqli("localhost", "webappUser", "cop4331SmallProjectAPI", "COP4331");
    if ($conn->connect_error) 
    {
        returnWithError( $conn->connect_error );
    } 
    else
    {
        $stmt = $conn->prepare("UPDATE Contacts SET firstName = ?, lastName = ?,
        email = ?, phoneNumber = ? WHERE ID = ?");
        $stmt->bind_param("ssssi", $firstName, $lastName, $email, $phoneNumber, $contactID);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        returnWithError("");
    }

    function getRequestInfo()
    {
        return json_decode(file_get_contents('php://input'), true);
    }

    function sendResultInfoAsJson( $obj )
    {
        header('Content-type: application/json');
        echo $obj;
    }

    function returnWithError( $err )
    {
        $retValue = '{"error":"' . $err . '"}';
        sendResultInfoAsJson( $retValue );
    }

?>