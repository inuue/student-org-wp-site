<?php



date_default_timezone_set('Etc/UTC');
$name = '';
$surname = '';
$mail = '';
$phone = '';
$student = '';
$kierunek = '';
$rok = '';
$why = '';
$msg = '';
$date = '';
$msg = '';

$name = $_POST["name"];
$surname = $_POST["surname"];
$mail = $_POST["email"];
$phone = $_POST["phone"];
$student = $_POST["student"];
$kierunek = $_POST["kierunek"];
$rok = $_POST["rok"];
$why = $_POST["why"];
$msg = $_POST["msg"];
$date = date("Y-m-d H:i:s");


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "datascienzbaza";

// Create connection
if($_POST['submit']) {
  $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn,"utf8");
$sql = "INSERT INTO formData (name, surname, email, msg, date)
VALUES ('$name', '$surname', '$mail', '$msg', '$date')";

if ($conn->query($sql) === TRUE) {
    $msg = 'Wiadomośc została wysłana, skontaktujemy się z Państwem najszybciej jak to możliwe!';
} else {
    $msg = 'Przepraszamy coś poszło nie tak. Spróbój ponownie póżniej lub wyślij wiadomość na info@datasciencemanagement.pl';
}

$conn->close();
}


;
//Don't run this unless we're handling a form submission
if (array_key_exists('email', $_POST)) {
    date_default_timezone_set('Etc/UTC');

    require '/PHPMailerAutoload.php';

    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    //Tell PHPMailer to use SMTP - requires a local mail server
    //Faster and safer than using mail()
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = '######';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = '######';                 // SMTP username
    $mail->Password = '######';                           // SMTP password
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
EOT;
        //Send the message, check for errors
        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            //but you shouldn't display errors to users - process the error, log it on your server.
            $msg = 'Przepraszamy coś poszło nie tak. Spróbój ponownie póżniej lub wyślij wiadomość na info@datasciencemanagement.pl';
        } else {
            $msg = 'Wiadomośc została wysłana, skontaktujemy się z Państwem najszybciej jak to możliwe!';
        }
    } else {
        $msg = 'Niestety adres e-mail był nie poprawny. Nie mogliśmy przesłac wiadomości';
    }
}
?>
<!DOCTYPE html>
<html class="thnku" lang="pl">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Formularz kontaktowy</title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style/main.css">
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-98230399-1', 'auto');
    ga('send', 'pageview');

    </script>
</head>
<body class="thankyou">
  <div class="thanks">
<h1>Dziękujemy za kontakt</h1>
<?php if (!empty($msg)) {
    echo "<h2>$msg</h2>";
} ?>
<a href="<?php echo get_home_url(); ?>"><div class="button">Wróć do strony głównej</div></a>
</div>
</body>
</html>
