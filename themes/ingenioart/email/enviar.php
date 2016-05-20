<?php
	
	//Obtenemos las valores enviados
	$name    = $_POST['nombre'];
	$from    = $_POST['email'];
	$message = $_POST['message'];


	//Email A quien se le rinde cuentas
	$webmaster_email = "operaciones@timcosac.com.pe";
	$webmaster_email2 = "jgomez.4net@gmail.com";

	include("./class.phpmailer.php");
 	include("./class.smtp.php");

	$mail = new PHPMailer();
	$mail->IsSMTP(); // send via SMTP
	$mail->SMTPSecure = 'ssl'; 

	$mail->Host      = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->Port      = 465;
	$mail->SMTPAuth  = true; // turn on SMTP authentication
	$mail->Username  = "jgomez.4net@gmail.com"; // Enter your SMTP username
	$mail->Password  = "ARLAC_RINO1EVER"; // SMTP password

	$mail->From     = $from;
	$mail->FromName = $name;
	$mail->AddAddress( $webmaster_email );
	$mail->AddAddress( $webmaster_email2 );

	$mail->IsHTML(false); // send as HTML
	$mail->Subject = "Consulta - Mensaje Timco Formulario";
	$mail->Body    = $message;

	if($mail->Send()){
		echo "Su mensaje a sido enviado con éxito, estaremos respondiendo a la brevedad."; 
	} else {
		echo "Mailer Error: " . $mail->ErrorInfo ; 
	}

?>