<?php 

session_start();


$docCode = $_SESSION['docCode'];
$name = $_POST['name'];
$cognome = $_POST['cognome'];
$age = $_POST['age'];
$date = date("d/m/Y");
$phoneNumber = $_POST['phoneNumber'];
$email = $_POST['email'];
$PatientUsername = $name . rand(21,890) . "usr";
$PatientPassword = $cognome . rand(18456, 76345) . rand(1,10);
$actualDate = date("d/m/Y");

if($docCode == NULL){
    header("location: ../index/index.php");
}

$conn = new mysqli('127.0.0.1', 'root', '', 'edomed2');
    if($conn->connect_error){
        die('connessione fallita: '.$conn->connect_error);

    }



$sql = "INSERT INTO pazienti (name, cognome, age, date, numberphone, email, username, password, doccode) VALUES ('$name', '$cognome', '$age', '$date', '$phoneNumber', '$email', '$PatientUsername', '$PatientPassword', '$docCode');";
mysqli_query($conn,$sql);


    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../includes/PHPMailer.php';
    require '../includes/SMTP.php';
    require '../includes/Exception.php';

    use function PHPSTORM_META\map;


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
          <h5 class='text-teal-700'>Congratulazioni! Sei un nostro paziente!</h5>
          <hr>
          <div class='space-y-3'>
            <p class='text-gray-700'>Sei stato aggiunto alla lista di pazienti di uno dei nostri medici.</p>
            <p class='text-gray-700'>
              da questo momento potrai entrare nella tua area personale attraverso il nostro sito utilizzando le seguenti 
              credenziali:
            </p>
              <hr>
            <p>
              Username: $PatientUsername
              <br>
              Password: $PatientPassword
            </p>
            <hr>
              
            <p class='text-gray-700'>
              potrai utilizzare la tua area personale per gestire i tuoi eventuali appuntamenti e per richiederne di nuovi.
            </p>
          </div>
          <hr>
         edomed, $actualDate
        </div>
      </div>
    </div>
  </body>
</html>
    
    ";


    $mail = new PHPMailer(true);

    $mail->isSMTP();

    $mail->Host = 'smtp.gmail.com';

    $mail->SMTPAuth = 'true';

    $mail->Username = 'noreply.edomed@gmail.com';

    $mail->Password = 'Edoardo2004';

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    $mail->Port = '587';

    $mail->setFrom='noreply.edomed@gmail.com';

    $mail -> Subject = "Congratulazioni! edoMed";

    $mail->addAddress("$email");

    $mail->Body = $message;

    $mail->isHTML(true);

    
    $mail->send();

    session_start();




header("location: pazienti.php");

?>