 <?php
$date = date("d/m/Y h:i");

// ****** ATEN��O ********
// ABAIXO EST� A CONFIGURA��O DO SEU FORMUL�RIO.
// ****** ATEN��O ********

// RECEBE OS VALORES VINDO DO FORMUL�RIO E ATRIBUI AS VARI�VEIS
if (isset($_POST['nome'])) {
		$nome = $_POST['nome'];
	}
	
	if (isset($_POST['email'])) {
		$email = $_POST['email'];
	}
	
	if (isset($_POST['assunto'])) {
		$assunto = $_POST['assunto'];
	}
	
	
	
	if (isset($_POST['mensagem'])) {
		$mensagem = $_POST['mensagem'];
	}
	
	if (isset($_POST['g-recaptcha-response'])) {
    	$captcha_data = $_POST['g-recaptcha-response'];
	}
	
	// Se nenhum valor foi recebido, o usu�rio n�o realizou o captcha
	if (!$captcha_data) {
		echo '<p>Informa��es n�o enviadas. N�o esque�a de fazer a verifica��o antes de enviar a mensagem.<br><br>Clique em <a href="contato.html">AQUI</a> para tentar novamente</p>';
		exit;
	}

//CABE�ALHO - ONFIGURA��ES SOBRE SEUS DADOS E SEU WEBSITE
$nome_do_site="IBESVA";
$email_para_onde_vai_a_mensagem = "contato@ibesva.com";
$nome_de_quem_recebe_a_mensagem = "IBESVA";
$exibir_apos_enviar='enviado.html';

//MAIS - CONFIGURA�OES DA MENSAGEM ORIGINAL
$cabecalho_da_mensagem_original="From: $nome <$email>";
$assunto_da_mensagem_original="Contato do site IBESVA";

// FORMA COMO RECEBER� O E-MAIL (FORMUL�RIO)
// ******** OBS: SE FOR ADICIONAR NOVOS CAMPOS, ADICIONE OS CAMPOS NA VARI�VEL ABAIXO *************
$configuracao_da_mensagem_original="

ENVIADO POR:\n
Nome: $nome\n
Email: $email\n
Assunto: $assunto\n
Mensagem: $mensagem\n
ENVIADO EM: $date

";


$resposta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfZNiMUAAAAAJCFd7-TOiqkI88jZqt7SEchJCbz&response=".$captcha_data."&remoteip=".$_SERVER['REMOTE_ADDR']);
	if ($resposta.success) {
    echo "Obrigado por deixar sua mensagem!";
} else {
    echo "Usu�rio mal intencionado detectado. A mensagem n�o foi enviada.";
    exit;
}

//CONFIGURA��ES DA MENSAGEM DE RESPOSTA
// CASO $assunto_digitado_pelo_usuario="s" ESSA VARIAVEL RECEBERA AUTOMATICAMENTE A CONFIGURACAO
// "Re: $assunto"
$assunto_da_mensagem_de_resposta = "Confirma��o IBESVA";
$cabecalho_da_mensagem_de_resposta = "From: IBESVA< $contato@ibesva.com>\n";
$configuracao_da_mensagem_de_resposta="Obrigado por entrar em contato!\nResponderemos em breve.\nAtenciosamente,\nIBESVA\n\nN�o responda este e-mail.\n\nEnviado em: $date";

// ****** IMPORTANTE ********
// A PARTIR DE AGORA RECOMENDA-SE QUE N�O ALTERE O SCRIPT PARA QUE O SISTEMA FINCIONE CORRETAMENTE
// ****** IMPORTANTE ********

//ESSA VARIAVEL DEFINE SE � O USUARIO QUEM DIGITA O ASSUNTO OU SE DEVE ASSUMIR O ASSUNTO DEFINIDO
//POR VOC� CASO O USUARIO DEFINA O ASSUNTO PONHA "s" NO LUGAR DE "n" E CRIE O CAMPO DE NOME
//'assunto' NO FORMULARIO DE ENVIO
$assunto_digitado_pelo_usuario="n";

//ENVIO DA MENSAGEM ORIGINAL
$headers = "$cabecalho_da_mensagem_original";

if($assunto_digitado_pelo_usuario=="n"){
$assunto = "$assunto_da_mensagem_original";
}
$seuemail = "$email_para_onde_vai_a_mensagem";
$mensagem = "$configuracao_da_mensagem_original";
mail($seuemail,$assunto,$mensagem,$headers);

//ENVIO DE MENSAGEM DE RESPOSTA AUTOMATICA
$headers = "$cabecalho_da_mensagem_de_resposta";
if($assunto_digitado_pelo_usuario=="n"){
$assunto = "$assunto_da_mensagem_de_resposta";
}else{
$assunto = "Re: $assunto";
}

$mensagem = "$configuracao_da_mensagem_de_resposta";
mail($email,$assunto,$mensagem,$headers);
echo "<script>window.location='$exibir_apos_enviar'</script>";

?>