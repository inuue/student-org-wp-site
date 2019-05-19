<?php

date_default_timezone_set('Etc/UTC');

$msg = '';
$response = '';
$error = '';
$name = $_POST["name"];
$surname = $_POST["surname"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$university = $_POST["university"];
$rok = $_POST["rok"];
$kierunek = $_POST["kierunekStudiow"];
$recommend = $_POST["recommend"];
$number101 = $_POST["number101"];
$casestudy = $_POST["casestudy"];
$netflix = $_POST["netflix"];

$date = date("Y-m-d H:i:s");

$servername = "######";
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
          $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection

          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
              $response = 'Błąd w formularzu. Spróboj ponownie.';
              $error = 'Błąd w formularzu. Spróboj ponownie.';
              echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Niestety coś poszło nie tak. Spróboj ponownie</div><div id="returnVal" style="display:none;">false</div>';
          }
          mysqli_set_charset($conn,"utf8");
          $sql = "INSERT INTO onwelo (name, surname, email, phone, uczelnia, rok, kierunek, skad, number101, casestudy, netflix, date)
          VALUES ('$name', '$surname', '$email', '$phone', '$university', '$rok', '$kierunek', '$recommend', '$number101', '$casestudy', '$netflix', '$date')";

          if ($conn->query($sql) === TRUE) {
              $response = 'true';
              echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Zgłoszenie zostało przesłane</div><div id="returnVal" style="display:none;">true</div>';
              $conn->close();
            } else {
              $error = 'An error with db connection... try again';
              echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Niestety coś poszło nie tak. Spróboj ponownie</div><div id="returnVal" style="display:none;">false</div>';
            }
        if(array_key_exists('email', $_POST) && $response == 'true' ) {
              $msgTop = 'Email uwzględniony, brak błedów. Rozpoczynam przesyłanie wiadomości.';
              if ($response == 'true') {
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
                      $mail->Subject = 'Zapisy na warsztaty Rekomendacje-101';
                      //Keep it simple - don't use HTML
                      $mail->isHTML(true);
                      //Build a simple message body
                      $mail->Body = "<p>Aplikacja przesłana ze strony SKN Data Science Management. </p></ br>";
                      $mail->Body .= "Podstawowe dane aplikanta: </ br>";
                      $mail->Body .= "<ul><li>Imię: ".$name."</li> </ br>";
                      $mail->Body .= "<li>Nazwisko: ".$surname."</li> </ br>";
                      $mail->Body .= "<li>Email: ".$email."</li> </ br>";
                      $mail->Body .= "<li>Numer telefonu: ".$phone."</li> </ br>";
                      $mail->Body .= "<li>Uczelnia: ".$university."</li> </ br>";
                      $mail->Body .= "<li>Rok studiów: ".$rok."</li> </ br>";
                      $mail->Body .= "<li>Kierunek: ".$kierunek."</li> </ br>";
                      $mail->Body .= "<li>źródło aplikacji: ".$recommend."</li></ul> </ br>";

                      $mail->Body .= "<p>Co Twoim zdaniem oznacza symbol 101 w nazwie wydarzenia?</p> </ br>";
                      $mail->Body .= "<p>".$number101."</p> </ br>";
                      $mail->Body .= "<p>Jakie rozwiązanie Twoim zdaniem najlepiej sprawdziłoby się w ramach case study przedstawionego na wykładzie i dlaczego?</p> </ br>";
                      $mail->Body .= "<p>".$casestudy."</p> </ br>";
                      $mail->Body .= "<p>Czy wiesz co to Netflix Prize? Jaki był efekt tego przedsięwzięcia?</p> </ br>";
                      $mail->Body .= "<p>".$netflix."</p> </ br>";

                      //Send the message, check for errors


                      if (!$mail->send()) {
                          //The reason for failing to send will be in $mail->ErrorInfo
                          //but you shouldn't display errors to users - process the error, log it on your server.
                          $response = 'Przepraszamy coś poszło nie tak. ';
                          $msg = ' Nie udało się przesłać zgłoszenia. Spróbój ponownie póżniej lub wyślij wiadomość na info@datasciencemanagement.pl';
                      } else {
                          $msg = 'Na wszystkie wiadomości będziemy odpowiadać po 15.10!';
                          echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Zgłoszenie zostało przesłane</div><div id="returnVal" style="display:none;">true</div>';


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



        //Success

    } else {
        //Validation error from empty form variables
        echo 'An error occurred on the form... try again';
    }
};

?>
