<?php

	#Incluir wp load
	include '../../../../wp-load.php';
	$options = get_option("theme_settings");

	
	//Obtenemos las valores enviados
	$name    = $_POST['name'];
	$email   = $_POST['email'];
	$phone   = $_POST['phone'];
	$message = $_POST['message'];

	$address = isset( $_POST['address'] ) ? $_POST['address']  : "";
	$subject = isset( $_POST['subject'] ) ? $_POST['subject']  : "";


	//Email A quien se le rinde cuentas
	$webmaster_email1 = "informes@ingenioart.com";
	$webmaster_email2 = "webmaster@ingenioart.com";
	$webmaster_email3 = "jgomez@ingenioart.com";

	include("class.phpmailer.php");
 	include("class.smtp.php");

	$mail = new PHPMailer();

	/*$mail->IsSMTP(); // send via SMTP
	$mail->SMTPSecure = 'ssl'; 
	$mail->Host      = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->Port      = 465;
	$mail->SMTPAuth  = true; // turn on SMTP authentication
	$mail->Username  = "jgomez.4net@gmail.com"; // Enter your SMTP username
	$mail->Password  = ""; // SMTP password */

	$mail->From     = $email;
	$mail->FromName = $name;
	$mail->AddAddress( $webmaster_email1 );
	$mail->AddAddress( $webmaster_email2 );
	$mail->AddAddress( $webmaster_email3 );

	#Enviar las copias
	/*foreach( $admin_email_copias as $copia ):

		#Quitar espacios en blanco
		$copia = str_replace(' ', '', $copia);

		$mail->AddAddress( $copia );

	endforeach;*/

	$mail->IsHTML(true); // send as HTML

	$mail->Subject = "Formulario Web: Ingenioart";

	//Adjuntar Logo Imagen
	$mail->AddEmbeddedImage("images\logo.png", "logo", "logo.png");

	// Activar el almacenamiento en búfer de la salida
	ob_start();
		//Incluir Plantilla de Email
		include("template.php");
	//Devolver el contenido del búfer de salida
	$template_email = ob_get_contents();	
	//Limpiar (eliminar) el búfer de salida
	ob_clean();

	//Customizar el mensaje
	$mail->Body = $template_email;

	if($mail->Send()){
		echo "Su mensaje a sido enviado con éxito, estaremos respondiendo a la brevedad."; 
	} else {
		echo "Mailer Error: " . $mail->ErrorInfo ; 
	}

?>