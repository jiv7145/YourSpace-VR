
<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
class Fullcalendar extends CI_Controller {
  

 public function __construct()
 {
  parent::__construct();
  $this->load->model('Fullcalendar_model');
 }

 function index()
 {
  $this->load->view('Fullcalendar');
 }

 function load()
 {
  $name = $_SESSION['username'];
  $email = $_SESSION['emailaddress'];
  $event_data = $this->Fullcalendar_model->fetch_all_event($email);
  foreach($event_data->result_array() as $row)
  {
   $data[] = array(
    'id' => $row['id'],
    // 'title' => $row['title'],
    'start' => $row['start_event'],
    'end' => $row['end_event']
   );
  }
  echo json_encode($data);


 }
 function loadBooked(){
    $name = $_SESSION['username'];
    $email = $_SESSION['emailaddress'];
    $event_data = $this->Fullcalendar_model->fetch_all_event_booked($email);

    foreach($event_data->result_array() as $row)
    {
     $data[] = array(
      'id' => $row['id'],
    //   'title' => $row['title'],
      'start' => $row['start_event'],
      'end' => $row['end_event']
     );
    }
    echo json_encode($data);

 }

 function insert()
 {
  $name = $_SESSION['username'];
  $email = $_SESSION['emailaddress'];
  if($this->input->post('title'))
  {
   

   $data = array(
    'title'  => $this->input->post('title'),
    'start_event'=> $this->input->post('start'),
    'end_event' => $this->input->post('end'),
    'admin'=>('False'),
    'name'=>implode($name),
    'email' =>$email
   );
   $this->Fullcalendar_model->insert_event($data);



  }
 }

 function update()
 {
    $email = $_SESSION['emailaddress'];
  $name = implode($_SESSION['username']);
  if($this->input->post('id'))
  {
   $data = array(
    'title'   => $this->input->post('title'),
    'start_event' => $this->input->post('start'),
    'end_event'  => $this->input->post('end')
   );

   $this->Fullcalendar_model->update_event($data, $this->input->post('id'));
  }
     $mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.mailgun.org';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'admin@yourspacecounselling.net';                     // SMTP username
    $mail->Password   = 'cd62fc8a0e80dd32f21f4db9a85ce31b-e5e67e3e-61e180c5';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('admin@yourspacecounselling.net', 'Yourspace');
    $mail->addAddress($email, $name);     // Add a recipient
   
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Booking Update';
   
    $body = "Hi $name, You have updated your appointment <br>";
     $body   .= "Start: ";
     $body .= $this->input->post('start');
    $body   .="<br> End: ";
    $body .=$this->input->post('end');
    $mail->Body  = $body;
   

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

$mailadmin = new PHPMailer(true);

try {
    //Server settings
    $mailadmin->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mailadmin->isSMTP();                                            // Send using SMTP
    $mailadmin->Host       = 'smtp.mailgun.org';                    // Set the SMTP server to send through
    $mailadmin->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mailadmin->Username   = 'admin@yourspacecounselling.net';                     // SMTP username
    $mailadmin->Password   = 'cd62fc8a0e80dd32f21f4db9a85ce31b-e5e67e3e-61e180c5';                               // SMTP password
    $mailadmin->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mailadmin->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mailadmin->setFrom('admin@yourspacecounselling.net', 'Yourspace');
    $mailadmin->addAddress('yourspacecounselling@hotmail.com', 'Michael');     // Add a recipient
   
    // Content
    $mailadmin->isHTML(true);                                  // Set email format to HTML
    $mailadmin->Subject = 'Booking Update';
   
    $body = "Appointment has been updated <br>";
    $body   .=  "Name: $name <br>";
     $body   .= "Start: ";
     $body .= $this->input->post('start');
    $body   .="<br> End: ";
    $body .=$this->input->post('end');
    $mailadmin->Body  = $body;
   

    $mailadmin->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
 }

 function delete()
 {
    $email = $_SESSION['emailaddress'];
  $name = implode($_SESSION['username']);
  if($this->input->post('id'))
  {
   $this->Fullcalendar_model->delete_event($this->input->post('id'));
  }
  $mail2 = new PHPMailer(true);

  try {
      //Server settings
      $mail2->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
      $mail2->isSMTP();                                            // Send using SMTP
      $mail2->Host       = 'smtp.mailgun.org';                    // Set the SMTP server to send through
      $mail2->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail2->Username   = 'admin@yourspacecounselling.net';                     // SMTP username
      $mail2->Password   = 'cd62fc8a0e80dd32f21f4db9a85ce31b-e5e67e3e-61e180c5';                               // SMTP password
      $mail2->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail2->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
  
      //Recipients
      $mail2->setFrom('admin@yourspacecounselling.net', 'Yourspace');
      $mail2->addAddress($email, $name);     // Add a recipient
     
      // Content
      $mail2->isHTML(true);                                  // Set email format to HTML
      $mail2->Subject = 'Booking Deletion';
     
      $body = "Hi $name, this is to confirm that your appointment has been cancelled <br>";
      $body .= "If you need to cancel your appointment for any reason before 24 hours of your appointment, you will be entitled to a full refund.<br>Cancel your appointment on the website and request a refund by emailing yourspacecounselling@hotmail.com with your PayPal Transaction ID attached.<br>If you cancel within 24 hours of your appointment, you are no longer entitled to a refund at this time.";
      $mail2->Body  = $body;
     
  
      $mail2->send();
      echo 'Message has been sent';
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail2->ErrorInfo}";
  }

  $mail2Admin = new PHPMailer(true);

  try {
      //Server settings
      $mail2Admin->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
      $mail2Admin->isSMTP();                                            // Send using SMTP
      $mail2Admin->Host       = 'smtp.mailgun.org';                    // Set the SMTP server to send through
      $mail2Admin->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail2Admin->Username   = 'admin@yourspacecounselling.net';                     // SMTP username
      $mail2Admin->Password   = 'cd62fc8a0e80dd32f21f4db9a85ce31b-e5e67e3e-61e180c5';                               // SMTP password
      $mail2Admin->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail2Admin->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
  
      //Recipients
      $mail2Admin->setFrom('admin@yourspacecounselling.net', 'Yourspace');
      $mail2Admin->addAddress('yourspacecounselling@hotmail.com', 'Michael');     // Add a recipient
     
      // Content
      $mail2Admin->isHTML(true);                                  // Set email format to HTML
      $mail2Admin->Subject = 'Booking Deletion';
     
      $body = "An appointmnent has been deleted, please check the calendar";
      $mail2Admin->Body  = $body;
     
  
      $mail2Admin->send();
      echo 'Message has been sent';
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail2->ErrorInfo}";
  }
 }

}

?>