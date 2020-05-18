
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
  $this->load->model('fullcalendar_model');
 }

 function index()
 {
  $this->load->view('fullcalendar');
 }

 function load()
 {
  $name = $_SESSION['username'];
  $email = $_SESSION['emailaddress'];
  $event_data = $this->fullcalendar_model->fetch_all_event($email);
  foreach($event_data->result_array() as $row)
  {
   $data[] = array(
    'id' => $row['id'],
    'title' => $row['title'],
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
   $this->fullcalendar_model->insert_event($data);



  }
 }
 function update()
 {
  $name = implode($_SESSION['username']);
  if($this->input->post('id'))
  {
   $data = array(
    'title'   => $this->input->post('title'),
    'start_event' => $this->input->post('start'),
    'end_event'  => $this->input->post('end')
   );

   $this->fullcalendar_model->update_event($data, $this->input->post('id'));
  }
     $mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.mailgun.org';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'postmaster@sandboxaea20dd704434c90afa8bb9243767d46.mailgun.org';                     // SMTP username
    $mail->Password   = 'ccfc97954dace942efcd0e0d9d4842c9-3e51f8d2-5dacb6e5';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
   
    //Recipients
    $mail->setFrom('postmaster@sandboxaea20dd704434c90afa8bb9243767d46.mailgun.org', 'Yourspace');
    $mail->addAddress('devel4800test@gmail.com', $name);     // Add a recipient
   
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
    $mailadmin->Username   = 'postmaster@sandboxaea20dd704434c90afa8bb9243767d46.mailgun.org';                     // SMTP username
    $mailadmin->Password   = 'ccfc97954dace942efcd0e0d9d4842c9-3e51f8d2-5dacb6e5';                               // SMTP password
    $mailadmin->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mailadmin->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
   
    //Recipients
    $mailadmin->setFrom('postmaster@sandboxaea20dd704434c90afa8bb9243767d46.mailgun.org', 'Yourspace');
    $mailadmin->addAddress('devel4800test@gmail.com', $name);     // Add a recipient
   
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
  $name = implode($_SESSION['username']);
  if($this->input->post('id'))
  {
   $this->fullcalendar_model->delete_event($this->input->post('id'));
  }
  $mail2 = new PHPMailer(true);

  try {
      //Server settings
      $mail2->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
      $mail2->isSMTP();                                            // Send using SMTP
      $mail2->Host       = 'smtp.mailgun.org';                    // Set the SMTP server to send through
      $mail2->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail2->Username   = 'postmaster@sandboxaea20dd704434c90afa8bb9243767d46.mailgun.org';                     // SMTP username
      $mail2->Password   = 'ccfc97954dace942efcd0e0d9d4842c9-3e51f8d2-5dacb6e5';                               // SMTP password
      $mail2->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail2->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
     
      //Recipients
      $mail2->setFrom('postmaster@sandboxaea20dd704434c90afa8bb9243767d46.mailgun.org', 'Yourspace');
      $mail2->addAddress('devel4800test@gmail.com', $name);     // Add a recipient
     
      // Content
      $mail2->isHTML(true);                                  // Set email format to HTML
      $mail2->Subject = 'Booking Deletion';
     
      $body = "Hi $name, this is to confirm that your appointment has been cancelled";
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
      $mail2Admin->Username   = 'postmaster@sandboxaea20dd704434c90afa8bb9243767d46.mailgun.org';                     // SMTP username
      $mail2Admin->Password   = 'ccfc97954dace942efcd0e0d9d4842c9-3e51f8d2-5dacb6e5';                               // SMTP password
      $mail2Admin->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail2Admin->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
     
      //Recipients
      $mail2Admin->setFrom('postmaster@sandboxaea20dd704434c90afa8bb9243767d46.mailgun.org', 'Yourspace');
      $mail2Admin->addAddress('devel4800test@gmail.com', $name);     // Add a recipient
     
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