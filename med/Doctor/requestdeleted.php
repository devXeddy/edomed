<?php 

session_start();
ini_set('log_errors', 0);
error_reporting(0);

$docCode = $_SESSION['docCode'];
$id = $_SESSION['idRequest'];

if($docCode == NULL){
    header("location: ../index/index.php");
}

$conn = new mysqli('127.0.0.1', 'root', '', 'edomed2');
    if($conn->connect_error){
        die('connessione fallita: '.$conn->connect_error);

    }

$sql = "DELETE FROM richieste WHERE id = '$id'";
$result=mysqli_query($conn,$sql);


header("location: richieste.php");

?>