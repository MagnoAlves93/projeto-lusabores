<?php
$to = "lusabores@gmail.com"; ###################ALTERAR PARA O EMAIL DESEJADO
$nome = $_POST['name'];
$email = $_POST['email'];
$msg = $_POST['text'];
$msg = nl2br($msg);

if($nome == NULL || $email == NULL || $assunto == NULL || $msg == NULL):
?>
<script language="JavaScript">alert('Existem campos obrigatórios não preenchidos!');
location.href='Faleconosco.html';
</script>
<?

exit;
endif;

$pattern = "^([A-Z_a-z])+@([a-zA-Z])+";
if(ereg($pattern,$email) == false):
?>
<script language="JavaScript">alert('O email não é válido');
location.href='Faleconosco.html';
</script>
<?

exit;
endif;

$mensagem = "Mensagem enviada por: ".$nome." em: ".date("d/m/Y - H:i")."\n <br />
Abaixo seguem os dados do usuário:\n <br />
E-mail: ".$email."\n <br />
Assunto: ".$assunto."\n <br />
A mensagem enviada a você foi a seguinte: \n <br />
".$msg;
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: $email <$email>\r\n";
mail($to,$mensagem,$headers);
?>

<script language="JavaScript">alert('Sua mensagem foi enviada com êxito!');
location.href='Faleconosco.html';
</script>