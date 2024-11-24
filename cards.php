<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="./img/img/logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <title>Cards dos Peixes</title>
</head>
<body>
    <header style="background-image: url('img/img/background-.png')">
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
    <section class="lista">
        <div class="container">
            <!-- Filtro de Tipo -->
            <form class="filtro" method="GET" action="cards.php">
                <label for="tipo">Filtrar por Tipo:</label>
                <select id="tipo" name="tipo" class="custom-select">
                    <option value="">Todos</option>
                    <option value="Escama" <?php echo (isset($_GET['tipo']) && $_GET['tipo'] == 'Escama') ? 'selected' : ''; ?>>Escama</option>
                    <option value="Couro" <?php echo (isset($_GET['tipo']) && $_GET['tipo'] == 'Couro') ? 'selected' : ''; ?>>Couro</option>
                </select>
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </form>

            <!-- Cards -->
            <div class="cards">
                <?php
                    include_once('conexao.php');

                    // Definindo a quantidade de peixes por página
                    $itens_por_pagina = 5;

                    // Pegando o número da página
                    $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
                    $inicio = ($pagina - 1) * $itens_por_pagina;

                    // Filtro por tipo
                    $tipo_filtro = isset($_GET['tipo']) ? $_GET['tipo'] : '';
                    $sql = "SELECT * FROM peixes";
                    if ($tipo_filtro) {
                        $sql .= " WHERE tipo = '$tipo_filtro'";
                    }
                    $sql .= " LIMIT $inicio, $itens_por_pagina";

                    // Executando a consulta
                    $resultado = mysqli_query($conexao, $sql);

                    if (mysqli_num_rows($resultado) > 0) {
                        while ($peixe = mysqli_fetch_assoc($resultado)) {
                            echo '
                                <div class="card-peixe">
                                    <img src="img/' . $peixe['foto'] . '" alt="Peixe">
                                    <h3>' . $peixe['nome'] . '</h3>
                                    <p>Alimentação: ' . $peixe['alimentacao'] . '</p>
                                    <p>Tamanho Mínimo: ' . $peixe['tamanho_minimo'] . '</p>
                                    <p>Localização: ' . $peixe['localizacao'] . '</p>
                                    <p>Informações: ' . $peixe['informacoes'] . '</p>
                                    <p>Tipo: ' . $peixe['tipo'] . '</p>
                                    <p>Equipamento: ' . $peixe['equipamento'] . '</p>
                                </div>
                            ';
                        }
                    } else {
                        echo "<p>Nenhum peixe encontrado.</p>";
                    }
                        echo '</div>';
                        echo '<div class="paginacao">';
                    // Paginação
                    $sql_total = "SELECT COUNT(*) AS total FROM peixes";
                    if ($tipo_filtro) {
                        $sql_total .= " WHERE tipo = '$tipo_filtro'";
                    }
                    $resultado_total = mysqli_query($conexao, $sql_total);
                    $dados_total = mysqli_fetch_assoc($resultado_total);
                    $total_peixes = $dados_total['total'];
                    $total_paginas = ceil($total_peixes / $itens_por_pagina);

                    // Exibindo os links de paginação
                    echo '<div class="paginacao">';
                    if ($pagina > 1) {
                        echo '<a href="?pagina=' . ($pagina - 1) . '&tipo=' . $tipo_filtro . '">Anterior</a>';
                    }
                    for ($i = 1; $i <= $total_paginas; $i++) {
                        if ($i == $pagina) {
                            echo '<span>' . $i . '</span>';
                        } else {
                            echo '<a href="?pagina=' . $i . '&tipo=' . $tipo_filtro . '">' . $i . '</a>';
                        }
                    }
                    if ($pagina < $total_paginas) {
                        echo '<a href="?pagina=' . ($pagina + 1) . '&tipo=' . $tipo_filtro . '">Próxima</a>';
                    }
                    echo '</div>';

                    // Fechando a conexão
                    mysqli_close($conexao);
                ?>
            </div>
        </div>
    </section>
</body>
</html>
