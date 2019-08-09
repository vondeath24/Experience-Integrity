<?php
if(isset($_GET['vkey']))
{
    require_once 'server.php';
    //require_once 'server2LocalMachine.php';
    $vkey = $_GET['vkey'];

    $resultSet = $db->prepare("SELECT vkey, verified FROM useraccounts
    WHERE vkey=:vkey AND verified = 0 LIMIT 1");

    $resultSet->bindParam(':vkey', $vkey);
    $resultSet->execute();

    $numRows = $resultSet->rowCount();

    if($numRows == 1)
    {
        //Validate email

        $update = $db->prepare("UPDATE useraccounts set verified = 1 WHERE vkey=:vkey LIMIT 1");
        $update->bindParam(':vkey', $vkey);
        $update->execute();

        if($update)
        {
            echo "Your account has been verified and you are ready to log in!";
            echo "<a href='index.php'> Return Home </a>";
        }
        else
        {
            echo $message;
        }
    }else{
        echo "This account is invlaid or already validated.";

    }
}
else
{
    die("something went wrong");
}
?>