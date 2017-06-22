<?php

$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$assunto = $_POST["assunto"];
$mensagem = $_POST["mensagem"];
$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');

 $arquivo = "
  <style type='text/css'>
  body {
	  margin:0px;
	  font-family:Verdane;
	  font-size:12px;
	  color: #666666;
  }
  a{
	  color: #666666;
	  text-decoration: none;
  }
  a:hover {
	  color: #FF0000;
	  text-decoration: none;
  }
  </style>
    <html>
        <table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#F1F1F1'>
            <tr>
              <td>
  <tr>
                 <td width='500'>Nome: $nome</td>
                </tr>
                <tr>
                  <td width='320'>E-mail:<b> $email</b></td>
     </tr>
      <tr>
                  <td width='320'>Telefone:<b> $telefone</b></td>
                </tr>
     <tr>
                  <td width='320'>Assunto: $assunto</td>
                </tr>
                <tr>
                  <td width='320' height='80'><strong>Mensagem:</strong> $mensagem</td>
                </tr>
            </td>
          </tr>  
          <tr>
            <td>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></td>
          </tr>
        </table>
    </html>
  ";

//enviar
  
  // emails para quem será enviado o formulário
  $emailenviar = "victorlopescarnaval@gmail.com";
  $destino = $emailenviar;
  $assunto = "Contato pelo Site";

  // É necessário indicar que o formato do e-mail é html
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= "From:" . $nome;
  //$headers .= "Bcc: $EmailPadrao\r\n";
  
  $enviaremail = mail($destino, $assunto, $arquivo, $headers);
  if($enviaremail){
  $mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
  echo " <meta http-equiv='refresh' content='2;URL=mail_ok.php'>";
  } else {
  $mgm = "ERRO AO ENVIAR E-MAIL!";
  echo " <meta http-equiv='refresh' content='2;URL=mail_error.php'>";
  }
?>
