<?php
// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obter dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $assunto = $_POST['assunto'];
    $mensagem = $_POST['mensagem'];

    // Definir suas credenciais da conta Twilio
    $accountSid = '{TOKEN}'; // Substitua pelo seu SID da conta Twilio
    $authToken = '{AUTHTOKEN}';   // Substitua pelo seu token de autenticação Twilio
    $fromNumber = '{FROM}'; // Substitua pelo seu número Twilio (ex: +55XXYYYYYYYY)
    $toNumber = '{TONUMBER}'; // Substitua pelo número do destinatário

    // Montar a mensagem a ser enviada via SMS
    $messageBody = "Novo contato recebido:\n";
    $messageBody .= "Nome: $nome\n";
    $messageBody .= "E-mail: $email\n";
    $messageBody .= "Assunto: $assunto\n";
    $messageBody .= "Mensagem: $mensagem\n";

    // Iniciar a solicitação cURL para enviar SMS via Twilio
    $url = 'https://api.twilio.com/2010-04-01/Accounts/' . $accountSid . '/Messages.json';
    
    // Dados para enviar via cURL
    $data = array(
        'From' => $fromNumber,  // Número do Twilio
        'To' => $toNumber,      // Número do destinatário
        'Body' => $messageBody  // Corpo da mensagem
    );
    
    // Iniciar cURL
    $ch = curl_init();
    
    // Configurar cURL para enviar a solicitação POST
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_USERPWD, $accountSid . ':' . $authToken);
    
    // Executar a solicitação e capturar a resposta
    $response = curl_exec($ch);
    
    // Verificar erros
    if (curl_errno($ch)) {
        echo 'Erro cURL: ' . curl_error($ch);
    } else {
        echo '';
    }
    
    // Fechar a conexão cURL
    curl_close($ch);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="./img/img/logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <title>Contato FishWork</title>
</head>
<body>
    <header style="background-image: url('img/img/background-feio.png')">
        <nav>
            <a href="index.html">
                <img id="logonav" src="img/img/logo.png" alt="Logo">
            </a>
            <ul class="ul">
                <a href="index.html">Home</a>
                <a href="sobre.html">Sobre</a>
                <a href="servicos.html">Serviços</a>
                <a href="cards.php">Cards</a>
                <a href="cadastropeixes.php">Cadastro</a>
                <a class="btn" href="contato.php">Contato</a>
            </ul>
        </nav>
        <div class="container">
            <section class="banner">
                <div class="banner-text">
                    <h1>Contato</h1>
                    <p>Entre em contato caso tenha dúvidas ou queira relatar algum problema</p>
                </div>
            </section>
        </div>
    </header>   

    <section class="contato">
        <div class="container">
            <div class="contato-info">
                <div class="left-side">
                    <div>
                        <i class="fa fa-envelope"></i>
                        <p>anna.dalolio@gmail.com</p>
                    </div>
                    <div>
                        <i class="fa fa-phone"></i>
                        <p>+55 (16) 99203-3129</p>
                    </div>
                </div>
                <div class="right-side">
                    <!-- Formulário para envio -->
                    <form action="contato.php" method="POST">
                        <input type="text" name="nome" placeholder="Nome" required>
                        <input type="email" name="email" placeholder="E-mail" required>
                        <input type="text" name="assunto" placeholder="Assunto" required>
                        <textarea name="mensagem" cols="30" rows="10" placeholder="Sua Mensagem" required></textarea>
                        <input class="btn" type="submit" value="Enviar" style="color:#fff; font-weight:bold">
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
        <div class="links">
                <a href="https://www.facebook.com/profile.php?id=61569029617648"><i class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com/fish.work3b3/"><i class="fa fa-instagram"></i></a>
                <a href="https://github.com/anadalolio/FishWork"><i class="fa fa-github"></i></a>
            </div>
            <p>Desenvolvido por Ana</p>
        </div>
    </footer>
</body>
</html>

