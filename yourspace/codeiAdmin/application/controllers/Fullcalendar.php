
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
  $event_data = $this->fullcalendar_model->fetch_all_event();
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
    $mail->Subject = 'Booking confirmation';
    $mail->Body    = "Hi $name,<br> You have successfully booked an appointment";
   

   // $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

  }
 }

 function update()
 {
  if($this->input->post('id'))
  {
   $data = array(
    'title'   => $this->input->post('title'),
    'start_event' => $this->input->post('start'),
    'end_event'  => $this->input->post('end')
   );

   $this->fullcalendar_model->update_event($data, $this->input->post('id'));
  }
 }

 function delete()
 {
  if($this->input->post('id'))
  {
   $this->fullcalendar_model->delete_event($this->input->post('id'));
  }
 }

}

?>