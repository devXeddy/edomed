<?php 

$docCode = $_POST['docCode'];
$docPassword = $_POST['docPassword'];

$conn = new mysqli('127.0.0.1', 'root', '', 'edomed2');
    if($conn->connect_error){
        die('connessione fallita: '.$conn->connect_error);

    }else{
        echo "connessione riuscita";
    }



    $sql = "SELECT * FROM medici WHERE docCode = '$docCode' and password = '$docPassword'";

    $result=mysqli_query($conn,$sql);
    $conta=mysqli_num_rows($result);
    if($conta!=0){

        echo "utente trovato!";

        session_start();

        $row = $result->fetch_assoc();
        $name = $row['name'];
        $cognome = $row['cognome'];
        $email = $row['email'];

        $_SESSION['name'] = $name;
        $_SESSION['cognome'] = $cognome;
        $_SESSION['email'] = $email;
        $_SESSION['docCode'] = $docCode;

        header("location: DocDashboard.php");
    }
    else{
        $LoginError = "Hai inserito delle credenziali invalide, riprova";
        $_SESSION['LoginError'] = $LoginError;
        header("location: doctorlogin.php");
    }










?>