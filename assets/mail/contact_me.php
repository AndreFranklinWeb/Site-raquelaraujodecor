<?php
// Verifique se há campos vazios
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "Nenhum argumento fornecido!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Crie o email e envie a mensagem
$to = "andrefranklinweb@gmail.com"; // Adicione seu endereço de e-mail entre "", substituindo seunome@seudominio.com.br - É para onde o formulário enviará uma mensagem.
$email_subject = "Website Contact Form:  $name";
$email_body = "Você recebeu uma nova mensagem do formulário de contato do site.\n\n"."Aqui estão os detalhes:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@yourdomain.com\n"; // Este é o endereço de email a partir do qual a mensagem gerada será. Recomendamos o uso de algo como noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);
return true;         
?>