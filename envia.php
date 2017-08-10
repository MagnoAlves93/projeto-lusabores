<?php
$to = "lusabores.encomendas@gmail.com"; ###################ALTERAR PARA O EMAIL DESEJADO
$nome = $_POST['name'];
$email = $_POST['email'];
$msg = utf8_decode($_POST['text']);
$msg = nl2br($msg);

if($nome == NULL || $email == NULL || $msg == NULL):
?>
<script language="JavaScript">alert('Existem campos obrigatórios não preenchidos!');
location.href='Faleconosco.html';
</script>
<?

exit;
endif;

$mensagem->CharSet = 'utf-8';

date_default_timezone_set('America/Sao_Paulo');
$mensagem = "Mensagem enviada por: ".$nome." em: ".date("d/m/Y - H:i")."\n
Abaixo seguem os dados do usuário:\n
E-mail: ".$email."\n
A mensagem enviada a você foi a seguinte: \n
".$msg;
$headers = $nome;
mail($to,$headers,$mensagem);
?>

<script language="JavaScript">alert('Sua mensagem foi enviada com Sucesso!');
location.href='Faleconosco.html';
</script>