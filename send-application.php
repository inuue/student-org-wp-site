<?php

date_default_timezone_set('Etc/UTC');

$msg = '';
$response = '';
$name = $_POST["name"];
$surname = $_POST["surname"];
$phone = $_POST["tel"];
$email = $_POST["email"];
$date = date("Y-m-d H:i:s");

$servername = "######";
$username = "######";
$password = "######";
$dbname = "######";


if(isset($_FILES['file'])){
   $errors= array();
   $file_name = $_FILES['file']['name'];
   $file_size =$_FILES['file']['size'];
   $file_tmp =$_FILES['file']['tmp_name'];
   $file_type=$_FILES['file']['type'];
   $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));

   $expensions= array("doc","pdf","docx","jpg");

   if(in_array($file_ext,$expensions)=== false){
      $errors[]="Zły plik. Proszę dodać CV w formacie: pdf, docx, doc.";
   }

   if($file_size > 5097152){
      $errors[]='Plik musi byc mniejszy niż 5 MB';
   }

   if(empty($errors)==true){
      move_uploaded_file($file_tmp,"uploads/".$file_name);
      $msg = "Plik został załączony.";
   }else{
      $error = "Błędny format lub rozszerzenie pliku. Proszę dodać plik ponownie.";
   }
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL) == true) {

    $error = "Podany adres email był niepoprawny";

} else {
    //Validation passed

    if (isset($_POST['email']) && !empty(str_replace(' ', '', $_POST['email'])) && isset($_POST['name']) && !empty(str_replace(' ', '', $_POST['name']))) {
        //Tries inserting into database and add response to variable
        // Create connection
        if(isset($_POST['email'])) {
            $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection

          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
              $response = 'Błąd w formularzu. Spróboj ponownie.';
              $error = 'Błąd w formularzu. Spróboj ponownie.';
          }
          mysqli_set_charset($conn,"utf8");
          $sql = "INSERT INTO formData (name, email, date)
          VALUES ('$name', '$email', '$date')";

          if ($conn->query($sql) === TRUE) {
              $response = 'true';
              $conn->close();
            } else {
              $error = 'An error with db connection... try again';
            }
              if (array_key_exists('email', $_POST) && empty($errors)==true) {
                  date_default_timezone_set('Etc/UTC');

                  require 'PHPMailer-master/PHPMailerAutoload.php';

                  //Create a new PHPMailer instance
                  $mail = new PHPMailer;
                  //Tell PHPMailer to use SMTP - requires a local mail server
                  //Faster and safer than using mail()
                  $mail->isSMTP();                                      // Set mailer to use SMTP
                  $mail->Host = 'ssl0.ovh.net';  // Specify main and backup SMTP servers
                  $mail->SMTPAuth = true;                               // Enable SMTP authentication
                  $mail->Username = 'no-reply@datasciencemanagement.pl';                 // SMTP username
                  $mail->Password = 'noreplyMail';                           // SMTP password
                  $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                  $mail->Port = 465;
                  $mail->CharSet = 'UTF-8';
                  $mail->addAttachment("uploads/".$file_name);
                  //Use a fixed address in your own domain as the from address
                  //**DO NOT** use the submitter's address here as it will be forgery
                  //and will cause your messages to fail SPF checks
                  $mail->setFrom('no-reply@datasciencemanagement.pl', 'SKN Data Science Management');
                  //Send the message to yourself, or whoever should receive contact for submissions

                  $mail->addAddress('rafal.sypien@gmail.com', 'Rafał Sypień');
                  $mail->addAddress('rekrutacja@onwelo.com', 'Rekrutacja Onwelo');
                  //Put the submitter's address in a reply-to header
                  //This will fail if the address provided is invalid,
                  //in which case we should ignore the whole request
                  if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {

                      $mail->Subject = 'Młodszy Konsultant BI i Big Data';
                      //Keep it simple - don't use HTML
                      $mail->isHTML(true);
                      //Build a simple message body
                      $mail->Body = "<p>Aplikacja przesłana ze strony SKN Data Science Management. </p></ br>";
                      $mail->Body .= "Podstawowe dane aplikanta: </ br>";
                      $mail->Body .= "<ul><li>Imię: ".$name."</li> </ br>";
                      $mail->Body .= "<li>Nazwisko: ".$surname."</li> </ br>";
                      $mail->Body .= "<li>Email: ".$email."</li> </ br>";
                      $mail->Body .= "<li>Numer telefonu: ".$phone."</li></ul> </ br>";
                      $mail->Body .= "<p>W załączeniu znajdą Państwo CV kandydata.</p> </ br>";
                      $mail->Body .= "<p>Pozdrawiamy, </p>";
                      $mail->Body .= "<p>Zespół SKN Data Sience Managment</p>";
                      //Send the message, check for errors
                      if (!$mail->send()) {
                          //The reason for failing to send will be in $mail->ErrorInfo
                          //but you shouldn't display errors to users - process the error, log it on your server.
                          $response = 'Przepraszamy coś poszło nie tak. ';
                          $error = ' Nie udało się przesłać aplikacji. Spróbój ponownie póżniej lub wyślij wiadomość na info@datasciencemanagement.pl';
                      } else {
                          $msgTop = 'Aplikacja została przesłana do firmy';
                          $msg = 'Przypominamy, że firma skontaktuje się tylko z wybranymi kandydatami. W razie dodatkowych pytań jesteśmy dostępni pod adresem: info@datasciencemanagement.pl';

                      }
                  } else {
                      $error = 'Niestety adres e-mail był nie poprawny. Nie mogliśmy przesłac wiadomości';

                  }
              } else {
                  //Failure
                  $msg = 'Przepraszamy coś poszło nie tak. Spróbój ponownie póżniej lub wyślij wiadomość na info@datasciencemanagement.pl';
                  $error = 'Niestety wystąpił błąd podczas wysyłania aplikacji. Spróboj ponownie';
              }
          } else {
              $response = 'An error occurred on the form... try again';
              $error = 'An error occurred on the form... try again';
          }




        //Success

    } else {
        //Validation error from empty form variables
        $error = 'An error occurred on the form... try again';
    }
};

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Formularz kontaktowy</title>
    <link rel="stylesheet" href="wp-content/themes/skn/style/main.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <style>
      html {
        height: 100%;
      }
      body {
        font-family: Roboto;
        display: table;
        background-image: url(wp-content/themes/skn/img/bgsolid.jpg);
        background-size: 100% 100%;
        background-repeat: no-repeat;
        height: 100%;
      }
      .thanks {
        display: table-cell;
        vertical-align: middle;
        margin-top: 80px;
        color: #fff;
        height: 100%;
        width: 70%;
        text-align: center;
        margin: auto;
      }
      .button {
        margin: auto;
        margin-top: 25px;
        background-color:#f48d42;
      }
      .fblike h3 {
        display: inline-block;
        margin: 3px;
        margin-right: 10px;
      }
      .thanks h2 {
        margin-bottom: 100px;
        max-width: 800px;
        font-weight: 300;
        margin: auto;
      }
    </style>

</head>
<body>
  <div class="thanks">
<?php if (!empty($msgTop)) {
    echo "<h1>$msgTop</h1>
    <h2> $msg</h2>";
} else {
echo "<h2>$error</h2>";
}?>


<a href="/"><div class="button">Wróć na stronę główną</div></a>
</div>
</body>
</html>
