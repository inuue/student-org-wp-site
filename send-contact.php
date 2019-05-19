<?php



	iconv_set_encoding("internal_encoding", "UTF-8");

	//$headers .= 'Reply-To: Person Name <person.name@example.com>';
  add_action( 'phpmailer_init', 'wpset_phpmailer_init' );
  function wpset_phpmailer_init( PHPMailer $phpmailer ) {
  $phpmailer->Host = '######';
  $phpmailer->Port = 465; // could be different
  $phpmailer->Username = '######'; // if required
  $phpmailer->Password = '######'; // if required
  $phpmailer->SMTPAuth = true; // if required

  $phpmailer->IsSMTP();
}
	if (isset($_POST["submit"])) {

    $from = 'no-reply@datasciencemanagement.pl';
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $mail = $_POST["email"];
    $msg = $_POST["msg"];
    $date = date("Y-m-d H:i:s");
    $to = '######';
		$subject = 'Wiadomość z formularza na stronie SKN ';
		$message = "Zgłoszenie przez formualrz na stornie internetowej: $name, $surname, $mail, $msg, $date";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";



// More headers
    $headers .= "From: $from\r\nReply-to: $mail";

		//'From: '.$email."\r\n" .
        //'Reply-To: '.$email."\r\n" .
        'X-Mailer: PHP/' . phpversion();


		$body = "$message";

		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}

		//Check if message has been entered
		/*if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}*/
		//Check if simple anti-bot test is correct
		/*if ($human !== 5) {
			$errHuman = 'Your anti-spam is incorrect';
		}*/

		// If there are no errors, send the email
		if (!$errName) {
			if (mail ($to, $subject, $body, $headers)) {
				$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
			} else {
				$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
			}
		}
	}
?>

<html class="thnku" lang="pl">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Formularz kontaktowy</title>
    <link rel="stylesheet" href="/style/main.css">
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
<?php if (!empty($result)) {
    echo "<h2>$result</h2>";
} ?>
<a href="/"><div class="button">Wróć do strony głównej</div></a>
</div>
</body>
</html>
