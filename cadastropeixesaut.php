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
    <?php
        session_start();
        if (!isset($_SESSION['email'])) {
            header("location:cadastropeixes.php?msg=Você precisa estar logado para acessar esta página");
        }
    ?>
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
        <h3 id="titulocadastro">Cadastro de Peixes</h3>
        <?php
            if (isset($_GET['msg'])) {
                echo "<p>" . $_GET['msg'] . "</p>";
            }
        ?>
        <form method="post" action="cadastropeixesaut.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nome">Nome do peixe:</label>
                <input id="nome" name="nome" type="text" class="form-control" required="required">
            </div>
            <div class="form-group">
                <label for="alimentacao">Alimentação:</label>
                <input id="alimentacao" name="alimentacao" type="text" class="form-control" required="required">
            </div>
            <div class="form-group">
                <label for="tamanho_minimo">Tamanho Mínimo:</label>
                <input id="tamanho_minimo" name="tamanho_minimo" type="text" class="form-control" required="required">
            </div>
            <div class="form-group">
                <label for="localizacao">Localização:</label>
                <textarea id="localizacao" name="localizacao" cols="40" rows="5" class="form-control" required="required"></textarea>
            </div>
            <div class="form-group">
                <label for="informacoes">Informações:</label>
                <textarea id="informacoes" name="informacoes" cols="40" rows="5" class="form-control" required="required"></textarea>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo</label>
                <div>
                    <select id="tipo" name="tipo" class="custom-select" required="required">
                        <option value="Escama">Escama</option>
                        <option value="Couro">Couro</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="equipamento">Equipamento</label>
                <textarea id="equipamento" name="equipamento" cols="40" rows="5" class="form-control" required="required"></textarea>
            </div>
            <div>
                <label for="imagem">Foto do peixe:</label>
                <br>
                <input type="file" name="imagem">
            </div>
            <br>
            <div class="form-group">
                <button name="submit" type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>

    <?php
        $diretorio = 'img/';

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
            $nome = $_POST['nome'];
            $alimentacao = $_POST['alimentacao'];
            $tamanho_minimo = $_POST['tamanho_minimo'];
            $localizacao = $_POST['localizacao'];
            $informacoes = $_POST['informacoes'];
            $tipo = $_POST['tipo'];
            $equipamento = $_POST['equipamento'];
           
            $arquivoTemp = $_FILES['imagem']['tmp_name'];
            $nomeOriginal = $_FILES['imagem']['name'];
            $tipoArquivo = $_FILES['imagem']['type'];
            $tamanhoArquivo = $_FILES['imagem']['size'];
    
            $extensao = pathinfo($nomeOriginal, PATHINFO_EXTENSION);
            $nomeAleatorio = uniqid('', true) . '.' . $extensao;
    
            if (!is_dir($diretorio)) {
                mkdir($diretorio, 0777, true);
            }
    
            $caminhoDestino = $diretorio . $nomeAleatorio;
            $tiposPermitidos = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($tipoArquivo, $tiposPermitidos)) {
                echo "Erro: Somente imagens JPEG, PNG ou GIF são permitidas.";
                exit;
            }
    
            if ($tamanhoArquivo > 5 * 1024 * 1024) {
                echo "Erro: O arquivo é muito grande. O tamanho máximo permitido é 5MB.";
                exit;
            }
    
            if (move_uploaded_file($arquivoTemp, $caminhoDestino)) {
                $conexao = mysqli_connect('localhost', 'root', '', 'fishwork');
                $sql = "INSERT INTO peixes VALUES (NULL, '$nome', '$alimentacao', '$tamanho_minimo', '$localizacao', '$informacoes', '$tipo', '$equipamento', '$nomeAleatorio');";
                if (mysqli_query($conexao, $sql)) {
                    header("location:cadastropeixesaut.php?msg=Peixe Cadastrado");
                } else {
                    header("location:cadastropeixesaut.php?msg=Erro ao cadastrar Peixe");
                }
                mysqli_close($conexao);
            } else {
                echo "";
            }
        } else {
            echo "";
        }
    ?>
</body>
</html>
