<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

require_once('config.php');
$email = $_POST['email'];
$query = "SELECT * FROM user where correo = '$email'";
$result = $conexion->query($query);
$row = $result->fetch_assoc();

if($result->num_rows > 0){
  $mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp-mail.outlook.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'PruebaCMIE@outlook.com';
    $mail->Password   = 'prueba123';
    $mail->Port       = 587;

    $mail->setFrom('PruebaCMIE@outlook.com', 'Prueba');
    $mail->addAddress($_POST['email'], $_POST['nombre']);
    $mail->isHTML(true);
    $mail->Subject = 'Recuperación de contraseña';
    $mail->Body    = 'Hola, este es un correo generado para solicitar tu recuperación de contraseña, por favor, visita la página de <a href="localhost/CMIE/recuperacion/change_password.php?id='.$row['id'].'">Recuperación de contraseña</a>';

    $mail->send();
    header("Location: ../../includes/login.php?message=ok");
} catch (Exception $e) {
  header("Location: ../../includes/login.php?message=error");
}

}else{
  header("Location: ../../includes/login.php?message=not_found");
}

?>
