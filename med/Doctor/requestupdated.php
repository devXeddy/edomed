<?php 

session_start();

$docCode = $_SESSION['docCode'];

if($docCode == NULL){
    header("location: ../index/index.php");
}

$namePatient = $_SESSION['nameRequest'];
$cognomePatient = $_SESSION['cognomeRequest'];
$emailPatient = $_SESSION['emailRequest'];
$date = $_POST['date'];
$idPatient = $_SESSION['idRequest'];
$name = ucwords($_SESSION['name']);
$cognome = ucwords($_SESSION['cognome']);
$actualDate = date("d/m/Y");
$PatientUsername = $name . $idPatient . "usr";
$PatientPassword = hash("md5", $name);


$conn = new mysqli('127.0.0.1', 'root', '', 'edomed2');
    if($conn->connect_error){
        die('connessione fallita: '.$conn->connect_error);

    }


$sql = "DELETE FROM richieste WHERE id = '$idPatient'";
$result=mysqli_query($conn,$sql);

$sql = "INSERT INTO appuntamenti (namepatient, cognomepatient, emailpatient, date, doccode) VALUES ('$namePatient', '$cognomePatient', '$emailPatient', '$date', '$docCode');";
$result=mysqli_query($conn,$sql);

$sql = "INSERT INTO archivioappuntamenti (name, cognome, email, doccode, date) VALUES ('$namePatient', '$cognomePatient', '$emailPatient', '$docCode', '$date')";
mysqli_query($conn,$sql);
/*if ($conn->query($sql) === TRUE) {
    echo " deleted successfully";
  } else {
    echo "Error: " . $conn->error;
  }*/



  $message = "
  <html>
  <head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <style>
       /* Add custom classes and styles that you want inlined here */
    </style>
  </head>
  <body class='bg-light'>
    <div class='container'>
      <div class='card my-10'>
        <div class='card-body'>
          <h1 class='h3 mb-2'>edoMed</h1>
          <h5 class='text-teal-700'>conferma del tuo appuntamento</h5>
          <hr>
          <div class='space-y-3'>
            <p class='text-gray-700'>Buone notizie! il tuo appuntamento è stato confermato da un nostro medico!</p>
            <p class='text-gray-700'>
              Buone notizie da edoMed! il tuo appuntamento è appena stato confermato. Sei stato/a associato/a al Dr. $cognome.
          	  dovrai presentarti nella seguente data: $date. Puoi accedere alla tua area personale attraverso le credenziali
              contenute alla fine di questo messaggio. Troverai maggiori informazioni riguardanti il tuo medico e il tuo appuntamento
            </p>
            <p class='text-gray-700'>
              Sei pregato di presentarti nella data e nell'orario corretto, eventuali ritardi non assicureranno la tua visita presso il nostro centro.
            </p>
            <hr>
            <p class='text-gray-700'>
              Login: Username: $PatientUsername, Password: $PatientPassword
            </p>

            <p class='text-gray-700'>
              accedi alla tua <a href='personalarea.php' target='_blank'>area personale</a> per visualizzare più dettagli
            </p>
          </div>
          <hr>
          <h5 class='text-teal-700'>edoMed, $actualDate</h5>
        </div>
      </div>
    </div>
  </body>
</html>
  ";

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  require '../includes/PHPMailer.php';
  require '../includes/SMTP.php';
  require '../includes/Exception.php';

  use function PHPSTORM_META\map;



  $mail = new PHPMailer(true);

  $mail->isSMTP();

  $mail->Host = 'smtp.gmail.com';

  $mail->SMTPAuth = 'true';

  $mail->Username = 'noreply.edomed@gmail.com';

  $mail->Password = 'Edoardo2004';

  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

  $mail->Port = '587';

  $mail->setFrom='noreply.edomed@gmail.com';

  $mail -> Subject = "appuntamento Confermato!";

  $mail->addAddress("$emailPatient");

  $mail->Body = $message;

  $mail->isHTML(true);

  
  $mail->send();


  header("location: richieste.php");



?>