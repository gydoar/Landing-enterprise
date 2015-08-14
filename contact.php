<?php
header('Content-Type: text/html; charset=utf-8');

if(isset($_POST['email'])) {
 
     
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "administracion@promocionales-enterprise.com";
    

    $email_subject = "Un nuevo cliente necesita promocionales";
 
   
    $first_name = $_POST['nombre']; // required 
    $email_from = $_POST['email']; // required
	$phone = $_POST['telefono']; // required
    $comments = $_POST['mensaje']; // required
 
    $email_message = "Detalles de nuestro cliente.\n\n";
 
    
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
 
    $email_message .= "Nombre: ".clean_string($first_name)."\n";
    $email_message .= "Correo electrónico: ".clean_string($email_from)."\n";
	$email_message .= "Numero de Telefono: ".clean_string($phone)."\n";
    $email_message .= "Mensaje: ".clean_string($comments)."\n\n\n";
 

// create email headers
 
$headers = 'From: '.$email_from."\r\n".

'Cc: soporte@suwwweb.com' . "\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers); 
header("Location: /articulos/gracias.html");
?>
 
<!-- include your own success html here -->

 
<?php
 
}

?>