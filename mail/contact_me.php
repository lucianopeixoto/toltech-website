<?php
// Check for empty fields
if(empty($_POST['name'])    ||
  empty($_POST['email'])    ||
  empty($_POST['phone'])    ||
  empty($_POST['message'])  ||
  !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
    echo "Informações não fornecidas!";
    return false;
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = 'contato@toltech.com.br'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Contato através do site da Toltech - Nome: $name";
$email_body = "Recebemos uma mensagem através do site da Toltech.\n\n"."Detalhes:\n\nNome: $name\n\nEmail: $email_address\n\nTelefone: $phone\n\nMensagem:\n$message";
$headers = "From: noreply@toltech.com.br\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
return true;
?>
