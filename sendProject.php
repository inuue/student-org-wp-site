<?php

date_default_timezone_set('Etc/UTC');

$msg = '';
$response = '';
$name = $_POST["name"];
$email = $_POST["email"];
$date = date("Y-m-d H:i:s");

$servername = "######.######.db";
$username = "######";
$password = "######";
$dbname = "######";





if (!filter_var($email, FILTER_VALIDATE_EMAIL) == true) {

    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Proszę podać poprawny adres email</div><div id="returnVal" style="display:none;">false</div>';

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
              $response = 'An error occurred on the form... try again';
              echo 'An error occurred on the form... try again';
          }
          mysqli_set_charset($conn,"utf8");
          $sql = "INSERT INTO formData (name, email, date)
          VALUES ('$name', '$email', '$date')";

          if ($conn->query($sql) === TRUE) {
              $msgTop = 'Wiadomośc została wysłana.';
              $response = 'true';
              echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Dodaliśmy twój kontakt do bazy projektowej.</div><div id="returnVal" style="display:none;">true</div>';
              if ($response == 'true') {
                  date_default_timezone_set('Etc/UTC');

                  require '../../../PHPMailer-master/PHPMailerAutoload.php';

                  //Create a new PHPMailer instance
                  $mail = new PHPMailer;
                  //Tell PHPMailer to use SMTP - requires a local mail server
                  //Faster and safer than using mail()
                  $mail->isSMTP();                                      // Set mailer to use SMTP
                  $mail->Host = '######t';  // Specify main and backup SMTP servers
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
                      $mail->Subject = 'SKN Data Science Management - Zapisano na projekt';
                      //Keep it simple - don't use HTML
                      $mail->isHTML(false);
                      //Build a simple message body
                      $mail->Body = "Pierwszy etap rejestracji. Wiadomość od: " .$email;
                      //Send the message, check for errors
                      if (!$mail->send()) {
                          //The reason for failing to send will be in $mail->ErrorInfo
                          //but you shouldn't display errors to users - process the error, log it on your server.
                          $response = 'Przepraszamy coś poszło nie tak. ';
                          $msg = ' Nie udało się przesłać zgłoszenia. Spróbój ponownie póżniej lub wyślij wiadomość na info@datasciencemanagement.pl';
                      } else {
                          $msg = 'Na wszystkie wiadomości będziemy odpowiadać po 15.10!';

                      }
                  } else {
                      $msg = 'Niestety adres e-mail był nie poprawny. Nie mogliśmy przesłac wiadomości';
                      echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Niestety coś poszło nie tak. Spróboj ponownie</div><div id="returnVal" style="display:none;">false</div>';

                  }
              } else {
                  //Failure
                  echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>error sending email</div><div id="returnVal" style="display:none;">false</div>';

              }
          } else {
              $msg = 'Przepraszamy coś poszło nie tak. Spróbój ponownie póżniej lub wyślij wiadomość na info@datasciencemanagement.pl';
              $response = 'An error occurred on the form... try again';
              echo 'An error occurred on the form... try again';
          }

          $conn->close();
        } else {
          echo 'An error with db connection... try again';
        }


        //Success

    } else {
        //Validation error from empty form variables
        echo 'An error occurred on the form... try again';
    }
};

?>
