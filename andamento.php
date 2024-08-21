<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Andamento da obra</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: white;
    }

    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        background-color: #4abcdb;
    }

    .navbar .logo img {
        max-width: 100%;
        height: auto;
        margin-left: 35px;
    }

    nav {
        flex: 1;
        text-align: right;
    }

    nav ul {
        display: inline-block;
        list-style: none;
        margin-right: 20px;
    }

    nav ul li {
        display: inline-block;
        margin-right: 20px;
    }

    nav ul li a {
        color: white;
        text-decoration: none;
    }

    .menu-celular {
        width: 28px;
        margin-left: 20px;
        display: none;
    }


    .linha h1,
    .linha h2 {
        color: #333;
        text-align: center;
        margin-top: 20px;
    }

    @media screen and (max-width: 768px) {
        nav ul {
            position: absolute;
            top: 70px;
            left: 0;
            background: #333;
            width: 100%;
            overflow: hidden;
            transition: max-height 0.5s;
        }

        nav ul li {
            display: block;
            margin-top: 10px;
            margin-right: 50px;
            margin-bottom: 10px;
        }

        nav ul li a {
            color: white;
        }

        .menu-celular {
            display: block;
        }

        .navbar {
            flex-wrap: wrap;
        }
    }

    /* Linha de título e formulário */
    .linha h1,
    .linha h2 {
        color: #333;
        text-align: center;
    }

    form {
        margin-top: 35px;
        margin-bottom: 35px;
        text-align: center;
        justify-content: center;
        align-items: center;
        border-bottom: #4abcdb 2px solid;
    }

    form .nome {
        width: 50%;
        padding: 10px;
        margin-bottom: 10px;
    }

    form .envio {
        padding: 10px 20px;
        border: none;
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
        border-radius: 5px;
    }

    /* Galeria de arquivos */
    #gallery {
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
        margin: 20px;
    }

    #gallery div {
        position: relative;
        width: 100%;
        max-width: 200px;
    }

    #gallery img,
    #gallery video {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .delete-button {
        position: absolute;
        top: 5px;
        right: 5px;
        background-color: red;
        color: white;
        border: none;
        padding: 5px;
        cursor: pointer;
        border-radius: 3px;
    }

    /* Estilizar PDF e links */
    .pdf-container {
        position: relative;
        width: 100%;
        text-align: center;
        margin-bottom: 20px;
    }

    .pdf-link {
        display: none;
        text-decoration: none;
        color: #4CAF50;
        font-weight: bold;
        border-bottom: 1px solid #4CAF50;
        padding: 10px 0;
    }

    .pdf-frame {
        width: 100%;
        height: 200px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    /* Modo Mobile */
    @media screen and (max-width: 768px) {
        #gallery {
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .pdf-frame {
            display: none;
        }

        .pdf-link {
            display: block;
        }
    }

    /* Modo Desktop */
    @media screen and (min-width: 769px) {
        .pdf-link {
            display: none;
        }

        .pdf-frame {
            display: block;
        }
    }

    /* CSS para o balão de confirmação */
    .confirm-delete {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: rgba(0, 0, 0, 0.8);
        color: white;
        padding: 20px;
        border-radius: 8px;
        z-index: 1000;
        width: 300px;
        text-align: center;
    }

    .confirm-delete input[type="password"] {
        width: calc(100% - 20px);
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .confirm-delete button {
        padding: 10px 20px;
        border: none;
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
        border-radius: 5px;
        margin: 5px;
    }

    .confirm-delete .cancel {
        background-color: #f44336;
    }

    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 999;
    }
</style>

<body>
    <div class="navbar">
        <div class="logo">
            <img src="imagens/logo.png" width="100px">
        </div>
        <nav>
            <ul id="menuItens">
                <li><a href="index.html">Início</a></li>
                <li><a href="comprovante.php">Comprovante</a></li>
                <li><a href="andamento.php">Andamento</a></li>
                <li><a href="materiais.php">Materiais</a></li>
            </ul>
        </nav>
        <img src="imagens/menu.png" class="menu-celular" onclick="MenuCelular()">
    </div>
    <div class="linha">
        <h1>Andamento da obra</h1>
        <h2>Imagens e Vídeos</h2>
        <form action="andamento.php" method="POST" enctype="multipart/form-data">
            <input type="password" name="upload_password" placeholder="Digite a senha de upload" required class="nome">
            <input type="file" name="files[]" multiple class="nome">
            <input type="submit" value="Fazer Upload" class="envio">
        </form>
    </div>

    <?php
    $targetDir = "uploads/andamento/";
    $deletePassword = "YESHUA7*"; // Defina sua senha aqui
    $uploadPassword = "YESHUA7*"; // Defina sua senha aqui

    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['upload_password'])) {
            $password = $_POST['upload_password'];

            if ($password === $uploadPassword) {
                if (!empty($_FILES['files']['name'][0])) {
                    foreach ($_FILES['files']['name'] as $key => $val) {
                        $targetFile = $targetDir . basename($_FILES['files']['name'][$key]);
                        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                        $validTypes = array("jpg", "png", "jpeg", "gif", "mp4", "avi", "mkv", "pdf", "docx", "doc");
                        if (in_array($fileType, $validTypes)) {
                            if (move_uploaded_file($_FILES['files']['tmp_name'][$key], $targetFile)) {
                                echo "O arquivo " . basename($_FILES['files']['name'][$key]) . " foi enviado com sucesso.<br>";
                            } else {
                                echo "Desculpe, houve um erro ao enviar " . basename($_FILES['files']['name'][$key]) . ".<br>";
                            }
                        } else {
                            echo "<span style='color: red;'>Tipo de arquivo inválido para " . basename($_FILES['files']['name'][$key]) . ".</span><br>";
                        }
                    }
                }
            } else {
                echo "<span style='color: red;'>Senha de upload incorreta.</span><br>";
            }
        }

        if (isset($_POST['confirm_delete'])) {
            $fileToDelete = $_POST['file_path'];
            $password = $_POST['delete_password'];

            if ($password === $deletePassword) {
                if (file_exists($fileToDelete)) {
                    unlink($fileToDelete);
                    echo "O arquivo foi deletado.<br>";
                } else {
                    echo "Arquivo não encontrado.<br>";
                }
            } else {
                echo "Senha incorreta.<br>";
            }
        }
    }
    ?>


    <div id="gallery">
        <?php
        $files = scandir($targetDir);
        foreach ($files as $file) {
            if ($file != '.' && $file != '..' && !preg_match('/\.txt$/', $file)) {
                $filePath = $targetDir . $file;
                $fileType = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

                echo "<div>";
                if (in_array($fileType, array("jpg", "png", "jpeg", "gif"))) {
                    echo "<img src='$filePath' alt='$file'>";
                } elseif (in_array($fileType, array("mp4", "avi", "mkv"))) {
                    echo "<video controls>
                <source src='$filePath' type='video/$fileType'>
              Seu navegador não suporta a tag de vídeo.
              </video>";
                } elseif ($fileType == "pdf") {
                    echo "<div class='pdf-container'>";
                    echo "<iframe src='$filePath' class='pdf-frame'></iframe>";
                    echo "<a href='$filePath' class='pdf-link' target='_blank'>$file</a>";
                    echo "</div>";
                } elseif (in_array($fileType, array("docx", "doc"))) {
                    echo "<a href='$filePath' target='_blank'>Visualizar Documento</a>";
                }
                echo "<form method='POST' action='andamento.php' onsubmit='return confirmDelete(this);'>
            <input type='hidden' name='file_path' value='$filePath'>
            <input type='submit' value='Deletar' class='delete-button' data-file-path='$filePath'>
          </form>";
                echo "</div>";
            }
        }
        ?>
    </div>
    <!-- Balão de confirmação e sobreposição -->
    <div id="overlay" class="overlay"></div>
    <div id="confirmDelete" class="confirm-delete">
        <h3>Confirmar Exclusão</h3>
        <form id="confirmDeleteForm" method="POST" action="andamento.php">
            <input type="hidden" name="file_path" id="filePath">
            <input type="password" name="delete_password" placeholder="Digite a senha" required>
            <button type="submit" name="confirm_delete">Confirmar</button>
            <button type="button" class="cancel" onclick="closeConfirmDelete()">Cancelar</button>
        </form>
    </div>

    <script>
        function confirmDelete(form) {
            event.preventDefault();
            const filePath = form.querySelector('input[name="file_path"]').value;
            document.getElementById('filePath').value = filePath;
            document.getElementById('confirmDelete').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
            return false; // Prevents the form from being submitted immediately
        }

        function closeConfirmDelete() {
            document.getElementById('confirmDelete').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }
    </script>

    <script src="script.js"></script>
</body>

</html>