<?php
require_once 'phpmailer/PHPMailerAutoload.php';//já tentei sem ../ também
// Inicia a classe PHPMailer
$mail = new PHPMailer();
// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

$nome = $_POST['name'];
$email = $_POST['email'];
$mensagem = $_POST['text'];

$mail->IsSMTP(true); // Define que a mensagem será SMTP
$mail->Host = "smtp.gmail.com"; // Endereço do servidor SMTP
$mail->Port = 587;
$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
$mail->SMTPSecure = 'tsl';
$mail->Username = 'magno.as19931993@gmail.com'; // Usuário do servidor SMTP
$mail->Password = 'plus2009'; // Senha do servidor SMTP

// Recebendo os dados
$recebenome     = $_POST["name"];
$recebemail     = $_POST["email"];
$recebemsg      = $_POST["text"];

// Definindo os cabeçalhos do e-mail
$headers  = "MIME-Version: 1.1\n";
$headers .= "Content-type:text/html; charset=utf-8 \n"; 
$headers .= "From: Formulario de contato\n"; 

// Destinatário do email
$mail->AddAddress('magno.as1993@gmail.com');

// Definindo o aspecto da mensagem
$mensagem   = "<h3>De:</h3> ";
$mensagem  .= $recebenome;
$mensagem  .= "<h3>Contato:</h3>";
$mensagem  .= $recebemail;
$mensagem  .= "<h3>Observações</h3>";
$mensagem  .= "<p>";
$mensagem  .= $recebemsg;
$mensagem  .= "</p>";

$mail->IsHTML(true);

// Enviando a mensagem para o destinatário
$enviar = mail($mail.'Contato pelo site - de: '.$recebenome.$mensagem.$headers);
$enviado = $enviar->Send();

// Resposta Automática, preparando o e-mail com a resposta.
$mensagem2  = "<p>Olá <strong>" . $recebenome . "</strong>.<p>Agradecemos sua visita ao nosso site e a oportunidade de receber-mos seu contato.
<br />Em breve responderemos sua questão através de correio eletrônico.</p><br><p>OBS.: Não é necessário responder esta mensagem!</p><br>";
$mensagem2 .= "<p>Atenciosamente<br />Firenze </p>";

// Enviando a resposta sutomática

$envia =  mail($recebemail,"Agradecemos sua visita ao nosso site",$mensagem2,$headers);

$enviado = $envia->Send();

// Exibe um alert que a mensagem foi enviada com sucesso.
echo '<script>
                alert("Mesagem enviada com sucesso!");history.go(-1);
          </script>';
		  echo "<meta http-equiv='refresh' content='2;URL=Faleconosco.php'>";

?>