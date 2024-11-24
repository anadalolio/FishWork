<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="./img/img/logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Peixe</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    
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
        </div>
    </header>
    <div class="container" id="cadastro">
    <section class="banner">
                <div id="bannerlogin" class="banner-text">
                    <h1>Login</h1>
                    
                </div>
            </section>
        <?php
            if (isset($_GET['msg'])) {
                echo "<p>" . $_GET['msg'] . "</p>";
            }
        ?>
        <form id="formlogin" method="post" action="validate.php" enctype="multipart/form-data">
                <label for="email">Email:</label>
                <input id="email" name="email" type="text" class="form-control" required="required">
                <label for="pass">Senha:</label>
                <input id="pass" name="pass" type="password" class="form-control" required="required">
                <br>
            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
    </div>
    <br>
    <style>
    body {
        background-image: url('img/img/background-feio.png');
        background-size: cover;
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>

</body>

</html>
