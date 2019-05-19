<?php

date_default_timezone_set('Etc/UTC');

$msg = '';
$name = $_POST["name"];
$surname = $_POST["surname"];
$mail = $_POST["email"];
$phone = $_POST["phone"];
$student = $_POST["student"];
$kierunek = $_POST["kierunek"];
$source = $_POST["recommend"];
$rok = $_POST["rok"];
$why = $_POST["why"];
$msg = $_POST["msg"];
$date = date("Y-m-d H:i:s");


$servername = "datascienzbaza.mysql.db";
$username = "datascienzbaza";
$password = "dBsKn1234kn";
$dbname = "datascienzbaza";

// Create connection
if(isset($_POST['submit'])) {
    $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  mysqli_set_charset($conn,"utf8");
  $sql = "INSERT INTO formData (name, surname, email, msg, date)
  VALUES ('$name', '$surname', '$mail', '$msg', '$date')";

  if ($conn->query($sql) === TRUE) {
      $msgTop = 'Wiadomośc została wysłana.';
  } else {
      $msg = 'Przepraszamy coś poszło nie tak. Spróbój ponownie póżniej lub wyślij wiadomość na info@datasciencemanagement.pl';
  }

  $conn->close();
} elseif (isset($_POST['submitRekrutacja'])) {
    $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  mysqli_set_charset($conn,"utf8");
  $sql = "INSERT INTO form_rekrutacja (name, surname, email, phone, student, kierunek, rok, why, msg, source, date)
  VALUES ('$name', '$surname', '$mail', '$phone', '$student', '$kierunek', '$rok', '$why', '$msg', '$source', '$date')";

  if ($conn->query($sql) === TRUE) {
      $msgTop = 'Dziękujemy za przesłanie zgłoszenia.';
  } else {
      $msg = 'Przepraszamy coś poszło nie tak. Spróbój ponownie póżniej lub wyślij wiadomość na info@datasciencemanagement.pl';
  }

  $conn->close();
} elseif(isset($_POST['submitNews'])) {
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    mysqli_set_charset($conn,"utf8");
    $sql = "INSERT INTO newsletter (email, date)
    VALUES ('$mail', '$date')";

    if ($conn->query($sql) === TRUE) {
        $msgTop = 'Dziękujemy za zapisanie się do naszego newslettera!';
    } else {
        $msg = 'Przepraszamy coś poszło nie tak. Spróbój ponownie póżniej lub wyślij wiadomość na info@datasciencemanagement.pl';
    }

    $conn->close();
};


//Don't run this unless we're handling a form submission
if($_POST['submitNews']) {
} elseif (array_key_exists('email', $_POST)) {
    date_default_timezone_set('Etc/UTC');

    require '../../../PHPMailer-master/PHPMailerAutoload.php';

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
    //Use a fixed address in your own domain as the from address
    //**DO NOT** use the submitter's address here as it will be forgery
    //and will cause your messages to fail SPF checks
    $mail->setFrom('no-reply@datasciencemanagement.pl', 'SKN Data Science Management');
    //Send the message to yourself, or whoever should receive contact for submissions
    $mail->addAddress('rafal.sypien@gmail.com', 'Rafał Sypień');
    //Put the submitter's address in a reply-to header
    //This will fail if the address provided is invalid,
    //in which case we should ignore the whole request
    if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
        $mail->Subject = 'SKN Data Science Management - formularz kontaktowy';
        //Keep it simple - don't use HTML
        $mail->isHTML(false);
        //Build a simple message body
        $mail->Body = <<<EOT
Wiadomośc przesłana za pośrednictwem formularza na stronie internetowej:

  Email nadawcy: {$_POST['email']}
  Imie: {$_POST['name']}
  Nazwisko: {$_POST['surname']}
  Telefon: {$_POST['phone']}
  Student: {$_POST['student']}
  Rok: {$_POST['rok']}
  Kierunek: {$_POST['kierunek']}
  Dlaczego: {$_POST['why']}
  Tekst wiadomości: {$_POST['msg']}
  Źródło aplikacji: {$_POST['recommend']}
EOT;
        //Send the message, check for errors
        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            //but you shouldn't display errors to users - process the error, log it on your server.
            $msgTop = 'Przepraszamy coś poszło nie tak. ';
            $msg = ' Nie udało się przesłać zgłoszenia. Spróbój ponownie póżniej lub wyślij wiadomość na info@datasciencemanagement.pl';
        } else {
            $msg = 'Na wszystkie wiadomości będziemy odpowiadać po 15.10!';
        }
    } else {
        $msg = 'Niestety adres e-mail był nie poprawny. Nie mogliśmy przesłac wiadomości';
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Formularz kontaktowy</title>
    <link rel="stylesheet" href="style/main.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <style>
      html {
        height: 100%;
      }
      body {
        font-family: Roboto;
        display: table;
        background-image: url(img/bgsolid.jpg);
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
      }
      .fblike h3 {
        display: inline-block;
        margin: 3px;
        margin-right: 10px;
      }
      .thanks h2 {
        margin-bottom: 100px;
      }
    </style>
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-98230399-1', 'auto');
    ga('send', 'pageview');

    </script>
</head>
<body>
  <div class="thanks">
<?php if (!empty($msgTop)) {
    echo "<h1>$msgTop</h1>
    <h2> $msg</h2>";
} ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fblike"><h3>Polub nas na Facebooku!</h3><div class="fb-like" data-href="https://facebook.com/bigdatasgh/" data-layout="button" data-action="like" data-size="large" data-show-faces="false" data-share="false"></div></div>
<a href="/"><div class="button">Wróć do strony głównej</div></a>
</div>
</body>
</html>
